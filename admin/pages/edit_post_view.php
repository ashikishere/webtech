<?php 
if (isset($_GET['edit_post_id'])) {
    $edit_id       = $_GET['edit_post_id'];
    $post_data     = $obj->edit_post($edit_id);
}

if (isset($_POST['update_post_btn'])) {
    $obj ->update_post($_POST);
}

?>
<style>
    .edit_post_img {
        width: 200px;
        height: 150px;
        object-fit: cover;
        margin-bottom: 10px;
    }
</style>


<h4 class="text-center mt-2 pb-2 mb-5" style="border-bottom: 2px solid #007BFF;">Edit Your Post</h4>

<!-- Edit post -->


<?php 

while ($row = mysqli_fetch_assoc($post_data)) {
    $post_id                 = $row['post_id'];
    $post_title              = $row['post_title'];
    $post_content            = $row['post_content'];
    $post_img                = $row['post_img'];
    $post_cat_id             = $row['post_cat'];
    $post_status             = $row['post_status'];
    $post_tag                = $row['post_tag'];

    ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group mt-2">
        <label class="small mb-1" for="post_title">
            Post Title*
        </label>
        <input class="form-control py-4" id="post_title" type="text" name="post_title" required
            value="<?php echo $post_title; ?>" />
    </div>
    <div class="form-group mt-3">
        <label class="small mb-1" for="post_content">
            Add your Content*
        </label>
        <textarea class="form-control" name="post_content" id="post_content"
            rows="5"><?php echo $post_content ?></textarea>
    </div>
    <div class="form-group mt-3">
        <label class="small mb-1" for="post_img">
            Update post thumnail *
        </label>
        <br>
        <img src="../images/<?php echo $post_img; ?>"
            class="edit_post_img" alt="">
        <br>
        <input id="post_img" type="file" name="post_img" />
    </div>

    <div class="form-group mt-2">
        <label class="small mb-1" for="post_tag">
            Post Tags*
        </label>
        <input class="form-control py-4" id="post_tag" type="text" name="post_tag" required
            value="<?php echo $post_tag;  ?>" />
    </div>
    <div class="form-group mt-3">
        <label class="small mb-1" for="post_status">
            Post Status*
        </label>
        <select name="post_status" id="post_status" class="form-control" required>
            <option value="1" <?php if($post_status == 1){ echo "selected";} ?>
                >Publish </option>
            <option value="0" <?php if($post_status == 0){ echo "selected";} ?>
                >Unpublish</option>
        </select>
    </div>
    <div class="form-group mt-4 mb-0">
        <input type="hidden" name="update_post_id"
            value="<?php echo $post_id ?>">
        <input type="submit" class="btn btn-success btn-block" name="update_post_btn" value="Update Your Post">
    </div>
</form>
<?php
}

