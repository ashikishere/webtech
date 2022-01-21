<?php 

if (isset($_GET['post_id'])) {
    $post_id     = $_GET['post_id'];
    $single_post = $homeObj->display_single_post($post_id);
}
$db               =$homeObj->conn;

?>
<style>
    .Single-post {
        height: 350px;
        object-fit: cover;
    }
</style>

<section class="blog-posts grid-system">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                            
                            while ($row = mysqli_fetch_assoc($single_post)) {
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
                                    <img src="images/<?php echo $post_img; ?>"
                                        alt="Post Image" class="Single-post">
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
                                    <a
                                        href="post-details.php?post_id=<?php echo $post_id;?>">
                                        <h4><?php echo $post_title ?>
                                        </h4>
                                    </a>
                                    <ul class="post-info">
                                        <li><a href="#">Admin</a></li>
                                        <li><a href="#"><?php echo $post_date; ?></a>
                                        </li>
                                        <li><a href="#">10 Comments</a></li>
                                    </ul>
                                    <p><?php 
                                    
                                    echo $post_content;
                                    
                                    ?>
                                    </p>
                                    <div class="post-options">
                                        <div class="row">
                                            <div class="col-6">
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-tags"></i></li>
                                                    <li><a href="#"><?php echo $post_tags; ?></a>
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
                            <?php include_once("comment.php"); ?>
                            <?php
                            }
                            
                            ?>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <?php include_once("sideber.php"); ?>
            </div>
        </div>
    </div>
</section>