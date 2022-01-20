<?php 

$post             = $obj ->display_post();
$db               =$obj->conn;
if (isset($_GET['delete_id'])) {
    $post_del_id = $_GET['delete_id'];
    $obj->delete_post($post_del_id);
    
}

?>
<style>
    .post_img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 50%;
    }

    .mange-table .title {
        margin-top: 16px;
        display: inline-block;
    }
</style>



<h4 class="text-center mt-2 pb-2 mb-5" style="border-bottom: 2px solid #007BFF;">Welcome to Manage Post</h4>
<div class="row align-items-center">
    <div class="col-md-12">
        <table class="table table-striped mt-4 mange-table">
            <thead>
                <tr>

                    <th scope="col">Sl.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Categoirs</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Date</th>
                    <th scope="col">Thummail</th>
                    <th scope="col">Post Status</th>
                    <th scope="col">Action</th>


                </tr>
            </thead>
            <tbody>
                <?php 
      $count =0;
      while($row =mysqli_fetch_assoc($post)){
        $post_id              = $row['post_id'];
        $post_title           = $row['post_title'];
        $post_content         = $row['post_content'];
        $post_img             = $row['post_img'];
        $post_author          = $row['post_author'];
        $post_date            = $row['post_date'];
        $post_comement_count  = $row['post_comement_count'];
        $post_cat             = $row['post_cat'];
        $post_tag             = $row['post_tag'];
        $post_status          = $row['post_status'];
        $count++;

        ?>
                <tr>
                    <th scope="row"><span class="title"><?php echo $count; ?></span>
                    </th>
                    <td><span class="title"><?php echo $post_title; ?></span>
                    </td>
                    <td>
                        <span class="title"><?php  if ( $post_author == 1) {
                        echo 'Admin';
                        } ?>
                        </span>
                    </td>
                    <td><span class="title"><?php 
                    
                    #show cat_name
                    $sql              = "SELECT * FROM category WHERE cat_id=$post_cat ";
                    $cat_name_with_id = mysqli_query($db,$sql);
                     while ($row = mysqli_fetch_assoc($cat_name_with_id)) {
                         $cat_name = $row['cat_name'];
                     }
                     echo $cat_name;
                    
                    ?>
                        </span>
                    </td>
                    <td><span class="title"><?php echo $post_tag; ?></span>
                    </td>
                    <td><span class="title"><?php echo $post_date ; ?></span>
                    </td>
                    <td><img class="post_img"
                            src="../images/<?php echo $post_img; ?>"
                            alt="Post Images" />
                    </td>
                    <td>
                        <span class="title">
                            <?php  if ( $post_status == 1) {
                            echo '<span class="badge badge-success">Publish</span>';
                          }else{
                          echo '<span class="badge badge-danger">Unpublish</span>';
                           }
                      ?>
                        </span>
                    <td>
                        <span class="title">
                            <a href="edit_post.php?status=edit&&edit_post_id=<?php echo $post_id; ?>"
                                class="btn btn-primary"><i class="bi bi-pen"></i></a>
                            <a href="manage_post.php?delete_id=<?php echo  $post_id ; ?>"
                                class="btn btn-danger"><i class="bi bi-archive"></i></a>
                        </span>
                    </td>
                </tr>
                <?php
      }

      ?>

            </tbody>
        </table>
    </div>
</div>