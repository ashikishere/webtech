<?php 

$all_post         = $homeObj->display_post_publish();
$db               =$homeObj->conn;

?>

<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                            while ( $row = mysqli_fetch_assoc($all_post) ) {
                                $post_id                  = $row['post_id'];
                                $post_title               = $row['post_title'];
                                $post_content             = $row['post_content'];
                                $post_img                 = $row['post_img'];
                                $post_cat_id              = $row['post_cat'];
                                $post_status              = $row['post_status'];
                                $post_tags                = $row['post_tag'];
                                $post_date                = $row['post_date'];
                                ?>
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="assets/images/blog-post-01.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <span><?php 
                                    
                                    $sql              = "SELECT * FROM category WHERE cat_id=$post_cat_id ";
                                    $cat_name_with_id = mysqli_query($db,$sql);
                                     while ($row = mysqli_fetch_assoc($cat_name_with_id)) {
                                         $cat_name = $row['cat_name'];
                                     }
                                     echo $cat_name;
                                    
                                    ?>
                                    </span>
                                    <a href="post-details.html">
                                        <h4><?php echo $post_title;  ?>
                                        </h4>
                                    </a>
                                    <ul class="post-info">
                                        <li><a href="#">Admin</a></li>
                                        <li><a href="#"><?php echo $post_date; ?></a>
                                        </li>
                                        <li><a href="#">12 Comments</a></li>
                                    </ul>
                                    <p>Stand Blog is a free HTML CSS template for your CMS theme. You can easily adapt
                                        or customize it
                                        for any kind of CMS or website builder. You are allowed to use it for your
                                        business. You are NOT
                                        allowed to re-distribute the template ZIP file on any template collection site
                                        for the download
                                        purpose. <a rel="nofollow" href="https://templatemo.com/contact"
                                            target="_parent">Contact
                                            TemplateMo</a> for more info. Thank you.</p>
                                    <div class="post-options">
                                        <div class="row">
                                            <div class="col-6">
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-tags"></i></li>
                                                    <li><a href="#"><?php echo $post_tags; ?></a>,
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-6">
                                                <ul class="post-share">
                                                    <li><i class="fa fa-share-alt"></i></li>
                                                    <li><a href="#">Facebook</a>,</li>
                                                    <li><a href="#"> Twitter</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-lg-12">
                            <div class="main-button">
                                <a href="blog.html">View All Posts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Sideber Section -->
                <?php include_once("sideber.php") ?>
            </div>
        </div>
    </div>
</section>