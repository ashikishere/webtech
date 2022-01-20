<?php 

$cat_data=$obj->display_category();

if (isset($_GET['delete_id'])) {
    $cat_id     = $_GET['delete_id'];
    $obj->delete_category($cat_id);
}

if (isset($_GET['edit_id'])) {
    $edit_id       = $_GET['edit_id'];
    $category_data = $obj->edit_category($edit_id);
}
if (isset($_POST['update_cat_btn'])) {
    $obj ->update_category($_POST);
}
?>



<h4 class="text-center mt-2 pb-2 mb-5" style="border-bottom: 2px solid #007BFF;">Welcome to Manage category</h4>



<table class="table table-striped mt-4">
    <thead>
        <tr>
            <th scope="col">SL.</th>
            <th scope="col">Category Name</th>
            <th scope="col">Category Description</th>
            <th scope="col">Action</th>


        </tr>
    </thead>
    <tbody>
        <?php 
      $count =0;
      while($row =mysqli_fetch_assoc($cat_data)){
        $cat_name = $row['cat_name'];
        $cat_des  = $row['cat_des'];
        $cat_id   = $row['cat_id'];
        $count++;

        ?>
        <tr>
            <th scope="row"><?php echo $count; ?>
            </th>
            <td><?php echo $cat_name; ?>
            </td>
            <td><?php  echo $cat_des; ?>
            </td>
            <td>
                <a href="manage_category.php?edit_id=<?php echo $cat_id; ?>"
                    class="btn btn-primary"><i class="bi bi-pen"></i></a>
                <a href="manage_category.php?delete_id=<?php echo $cat_id; ?>"
                    class="btn btn-danger"><i class="bi bi-archive"></i></a>
            </td>
        </tr>
        <?php
      }

      ?>

    </tbody>
</table>
<?php 
if (isset($category_data)) {
    
 while($row =mysqli_fetch_assoc($category_data)){
    $cat_name = $row['cat_name'];
    $cat_des  = $row['cat_des'];
    $cat_id   = $row['cat_id'];

    ?>
<h3 class="mb-2">Update Your Category</h3>
<form action="" method="post">
    <div class="form-group mt-2">
        <label class="small mb-1" for="add_cat">
            Update category
        </label>
        <input class="form-control py-4" id="add_cat" type="text" name="update_cat_name" required
            value="<?php echo $cat_name; ?>" />
    </div>
    <div class="form-group mt-3">
        <label class="small mb-1" for="cat_des">
            Update Description
        </label>
        <input class="form-control py-4" id="cat_des" type="text" name="update_cat_des" required
            value="<?php echo $cat_des; ?>" />
    </div>
    <div class="form-group mt-4 mb-0">
        <input type="hidden" name="cat_id"
            value="<?php echo $cat_id; ?>">
        <input type="submit" class="btn btn-success btn-block" name="update_cat_btn" value="Update Category">
    </div>
</form>
<?php
 }
}

