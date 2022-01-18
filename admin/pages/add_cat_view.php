<?php 
if (isset($_POST['add_cat_btn'])) {
   $return_msg = $obj ->add_category($_POST);
}
?>
<?php 
if (isset($return_msg)) {
    echo $return_msg;
}
?>
<form action="" method="post">
    <div class="form-group mt-2">
        <label class="small mb-1" for="add_cat">
            Add New category
        </label>
        <input class="form-control py-4" id="add_cat" type="text" name="cat_name" required />
    </div>
    <div class="form-group mt-3">
        <label class="small mb-1" for="cat_des">
            category Description
        </label>
        <input class="form-control py-4" id="cat_des" type="text" name="cat_des" required />
    </div>
    <div class="form-group mt-4 mb-0">
        <input type="submit" class="btn btn-success btn-block" name="add_cat_btn" value="Add new category">
    </div>
</form>