<?php 

$catotgoy_name = $obj ->display_category();
if (isset($_POST['add_post_btn'])) {
    $return_msg = $obj ->add_post($_POST);
}
?>

<h4 class="text-center mt-2 pb-2 mb-5" style="border-bottom: 2px solid #007BFF;">Welcome to Add Post</h4>
<?php if (isset($return_msg)) {
   echo $return_msg;
} ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group mt-2">
        <label class="small mb-1" for="post_title">
            Post Title*
        </label>
        <input class="form-control py-4" id="post_title" type="text" name="post_title" required />
    </div>
    <div class="form-group mt-3">
        <label class="small mb-1" for="post_content">
            Add your Content*
        </label>
        <textarea class="form-control" name="post_content" id="post_content" rows="5"></textarea>
    </div>
    <div class="form-group mt-3">
        <label class="small mb-1" for="post_img">
            Add post thumnail *
        </label>
        <br>
        <input id="post_img" type="file" name="post_img" required />
    </div>
    <div class="form-group mt-3">
        <label class="small mb-1" for="post_img">
            Select Category*
        </label>
        <select name="post_cat" id="post_cat" class="form-control" required>
            <!-- <option disabled selected>Select post Category*</option> -->
            <?php 
            while ($row = mysqli_fetch_assoc($catotgoy_name)) {
                $cat_id    = $row['cat_id'];
                $cat_name  = $row['cat_name'];
                ?>
            <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?>
            </option>
            <?php
            }
            ?>


        </select>
    </div>
    <div class="form-group mt-2">
        <label class="small mb-1" for="post_tag">
            Post Tags*
        </label>
        <input class="form-control py-4" id="post_tag" type="text" name="post_tag" required />
    </div>
    <div class="form-group mt-3">
        <label class="small mb-1" for="post_status">
            Post Status*
        </label>
        <select name="post_status" id="post_status" class="form-control" required>
            <!-- <option disabled selected>Select post Status</option> -->
            <option value="1">Approved </option>
            <option value="0">Draft</option>
        </select>
    </div>
    <div class="form-group mt-4 mb-0">
        <input type="submit" class="btn btn-success btn-block" name="add_post_btn" value="Add new Post">
    </div>
</form>