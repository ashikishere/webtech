<?php 

$category_name     = $homeObj->display_category();
$post              = $homeObj->display_recent_post();

?>


<div class="sidebar">
    <div class="row">
        <div class="col-lg-12">
            <div class="sidebar-item search">
                <form id="search_form" name="gs" method="GET" action="#">
                    <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                </form>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="sidebar-item recent-posts">
                <div class="sidebar-heading">
                    <h2>Recent Posts</h2>
                </div>
                <div class="content">
                    <ul>
                        <?php 
                        
                        while ($row = mysqli_fetch_assoc($post)) {
                            $post_id                  = $row['post_id'];
                            $post_title               = $row['post_title'];
                            $post_date                = $row['post_date'];

                            ?>
                        <li>
                            <a
                                href="post-details.php?post_id=<?php echo $post_id; ?>">
                                <h5><?php echo $post_title ?>
                                </h5>
                                <span><?php echo $post_date; ?></span>
                            </a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="sidebar-item categories">
                <div class="sidebar-heading">
                    <h2>Categories</h2>
                </div>
                <div class="content">
                    <ul>
                        <?php 
                         while ($row=mysqli_fetch_assoc($category_name)) {
                            $cat_name = $row['cat_name'];
                        ?>
                        <li><a href="#">-<?php echo $cat_name; ?></a>
                        </li>
                        <?php
                         }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="sidebar-item tags">
                <div class="sidebar-heading">
                    <h2>Tag Clouds</h2>
                </div>
                <div class="content">
                    <ul>
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Creative</a></li>
                        <li><a href="#">HTML5</a></li>
                        <li><a href="#">Inspiration</a></li>
                        <li><a href="#">Motivation</a></li>
                        <li><a href="#">PSD</a></li>
                        <li><a href="#">Responsive</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>