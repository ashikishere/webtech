<?php 

$admin_name = $_SESSION['admin_name'];


?>
<style>
    .welcome-msg {
        position: relative;
    }

    .date {
        position: absolute;
        top: 0;
        right: 0;
    }
</style>
<h4 class="mt-2">Dashboard</h4>

<div class="row mt-3">
    <div class="col-md-12">
        <div class="welcome shadow p-3">
            <h4 class="text-center mt-2 pb-2 mb-3 welcome-msg" style="border-bottom: 2px solid #007BFF;">Welcome to
                Dashboard
                <?php echo $admin_name; ?>
                <span class="date">
                    <?php 
                    echo "Date:" . date("Y/m/d");
                    ?>
                </span>
            </h4>

            <div class="row">
                <div class="col-md-3">
                    <h5>Get Started</h5>

                    <a href="add_post.php" class="btn btn-primary mb-3 mt-3">Add New Post</a><br>
                    <a href="add_post.php" class="btn btn-success">Add New Category</a>
                </div>
                <div class="col-md-6">
                    <h5>Next Step</h5>

                    <a href="manage_post.php" class="btn btn-info  mb-3 mt-3"> <i class="fas fa-edit mr-1"> </i>Manage
                        Your
                        Post</a><br>
                    <a href="manage_category.php" class="btn btn-secondary "><i class="far fa-edit mr-1"></i>Manage Your
                        Category</a>
                </div>
            </div>


        </div>
    </div>
</div>