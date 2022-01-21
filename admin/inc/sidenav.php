<?php 
$admin_name = $_SESSION['admin_name'];
?>

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="dashboard.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <!-- 1 -->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#category"
                    aria-expanded="false" aria-controls="category">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Category
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="category" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="add_category.php">Add Category</a>
                        <a class="nav-link" href="manage_category.php">Manage Category</a>
                    </nav>
                </div>
                <!-- 2 -->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Post" aria-expanded="false"
                    aria-controls="Post">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Post
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="Post" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="add_post.php">Add Post</a>
                        <a class="nav-link" href="manage_post.php">Manage Post</a>
                    </nav>
                </div>
                <!-- 3 -->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#comment"
                    aria-expanded="false" aria-controls="comment">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Comments
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="comment" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="manage_comments.php">Manage Comments</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as: <?php echo $admin_name; ?>
            </div>
            Webtech
        </div>
    </nav>
</div>