<?php $post = $homeObj->display_recent_post(); 
$db         =$homeObj->conn;
?>

<style>
    .banner-img {
        height: 400px;
        object-fit: cover;
    }
</style>


<div class="main-banner header-text">
    <div class="container-fluid">
        <div class="owl-banner owl-carousel">

            <?php 
            
            while ($row =mysqli_fetch_assoc($post) ) {
                $post_id                  = $row['post_id'];
                $post_title               = $row['post_title'];
                $post_img                 = $row['post_img'];
                $post_cat_id              = $row['post_cat'];
                $post_date                = $row['post_date'];

                ?>
            <div class="item">
                <img src="images/<?php echo $post_img?>"
                    alt="Baner-img" class="banner-img">
                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                            <span><?php 
                                    
                                    $sql              = "SELECT * FROM category WHERE cat_id=$post_cat_id ";
                                    $cat_name_with_id = mysqli_query($db,$sql);
                                     while ($row = mysqli_fetch_assoc($cat_name_with_id)) {
                                         $cat_name = $row['cat_name'];
                                     }
                                     echo $cat_name;
                                    
                                    ?>
                            </span>
                        </div>
                        <a
                            href="post-details.php?post_id=<?php echo $post_id;?>">
                            <h4><?php echo $post_title; ?>
                            </h4>
                        </a>
                        <ul class="post-info">
                            <li><a href="#">Admin</a></li>
                            <li><a href="#"><?php echo $post_date; ?></a></li>
                            <li><a href="#">12 Comments</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
            }

            ?>

        </div>
    </div>
</div>