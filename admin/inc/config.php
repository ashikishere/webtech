<?php 


class AdminBlog{
    public $conn;

    public function __construct()
    {
        define("DB_HOST", "localhost");
        define("DB_USER", "root");
        define("DB_PASS" , "");
        define("DB_NAME", "webtech");

        $this->conn =mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        if(!$this->conn){
            die("Database Conection Error");
        }else{
            //  echo "data base conected";
        }
    }

    // login code here

    public function admin_login($data){
        $admin_email = $data['admin_email'];
        $admin_pass  = md5($data['admin_password']);

        $query       = "SELECT * FROM admin_info";
        $the_user    =  mysqli_query($this->conn, $query);
        while($row =mysqli_fetch_assoc($the_user)){
            $user_email = $row['admin_email'];
            $user_pass  = $row['admin_pass'];
            $user_id    = $row['id'];
            $user_name  = $row['admin_name'];
        }

        if ($admin_email == $user_email && $admin_pass == $user_pass) {
           header("Location: dashboard.php");
           session_start();
           $_SESSION['adminID']    = $user_id;
           $_SESSION['admin_name'] =  $user_name;
        }else{
            echo '<div class="alert alert-danger" role="alert">LOGIN ERROR....</div>';
        }

    }

    // Add Category

    public function add_category($data){
        $cat_name = $data['cat_name'];
        $cat_des  = $data['cat_des'];
        $sql      = "INSERT INTO category(cat_name,cat_des) VALUES('$cat_name',' $cat_des')";
        if (mysqli_query($this->conn, $sql)) {
            return '<div class="alert alert-success mt-3" role="alert">Category Addded Successfull</div>';
        }
    }
    // Manage Category

    public function display_category(){
        $select_query = "SELECT * FROM category";
        if (mysqli_query($this->conn,$select_query)) {
            $category = mysqli_query($this->conn,$select_query);
            return  $category;
        }
    }
    // Edit category 

    public function edit_category($edit_id){
        $edit_quray  = "SELECT * FROM category WHERE cat_id ='$edit_id'";
        if (mysqli_query($this->conn,$edit_quray)) {
            $return_data = mysqli_query($this->conn,$edit_quray);
            return  $return_data;
        }
    }
    //update category 
    public function update_category($update_id){
        $cat_name        = $update_id['update_cat_name'];
        $cat_des         = $update_id['update_cat_des'];
        $cat_id          = $update_id['cat_id'];
        $update_query    = "UPDATE category SET cat_name ='$cat_name',cat_des='$cat_des' WHERE cat_id ='$cat_id' ";
        $update          = mysqli_query($this->conn, $update_query);
        if ($update ) {
            header('Location: manage_category.php');
        } else {
            die("category Update Error!!" . mysqli_error($this->conn));
        }
    }
    // Deleted category

    public function delete_category($id){
        $delete_query = "DELETE FROM category WHERE cat_id = $id";
        $res          = mysqli_query($this->conn, $delete_query);

        if ($res) {
            header('Location: manage_category.php');
        } else {
            die("category Delete Error!!" . mysqli_error($this->conn));
        }
    }


    // Add post
    public function add_post($post){
        $post_title              = $post['post_title'];
        $post_content            = $post['post_content'];
        $post_img                = $_FILES['post_img']['name'];
        $post_img_tmp            = $_FILES['post_img']['tmp_name'];
        $post_cat_id             = $post['post_cat'];
        $post_status             = $post['post_status'];
        $post_tag                = $post['post_tag'];
        $sql                     = "INSERT INTO post(post_title,post_content,post_img,post_author,post_date,post_comement_count,post_cat,post_tag,post_status) VALUES ('$post_title','$post_content','$post_img','1',now(),'10',$post_cat_id,'$post_tag',$post_status)";
        if (mysqli_query($this->conn, $sql)) {
            move_uploaded_file($post_img_tmp, "../images/$post_img");
            return '<div class="alert alert-success mt-3" role="alert">Post Addded Successfull</div>';
        }

    }
    // Dsiplay post
    public function display_post(){
        $select_query = "SELECT * FROM post ORDER BY post_Id DESC";
        if (mysqli_query($this->conn,$select_query)) {
            $post = mysqli_query($this->conn,$select_query);
            return  $post;
        }
    }

    // Display post if publish

    public function display_post_publish(){
        $select_query = "SELECT * FROM post WHERE post_status=1  ORDER BY post_Id DESC";
        if (mysqli_query($this->conn,$select_query)) {
            $post = mysqli_query($this->conn,$select_query);
            return  $post;
        }
    }

    // Display RECENT POST

    public function display_recent_post(){
        $select_query = "SELECT * FROM post WHERE post_status=1  ORDER BY post_Id DESC LIMIT 3";
        if (mysqli_query($this->conn,$select_query)) {
            $post = mysqli_query($this->conn,$select_query);
            return  $post;
        }
    }

    // Display single post
    public function display_single_post($id){
        $select_query = "SELECT * FROM post WHERE post_id=$id";
        if (mysqli_query($this->conn,$select_query)) {
            $post = mysqli_query($this->conn,$select_query);
            return  $post;
        }
    }

    // Edit post

    public function edit_post($edit_id){
        $edit_quray  = "SELECT * FROM post WHERE post_id=$edit_id";
        if (mysqli_query($this->conn,$edit_quray)) {
            $return_data = mysqli_query($this->conn,$edit_quray);
            return  $return_data;
        }
    }

    // Update Post
    public function update_post($post){
        $update_id               = $post['update_post_id'];
        $post_title              = $post['post_title'];
        $post_content            = $post['post_content'];
        $post_img                = $_FILES['post_img']['name'];
        $post_img_tmp            = $_FILES['post_img']['tmp_name'];
        $post_status             = $post['post_status'];
        $post_tag                = $post['post_tag'];
       
       if (!empty($post_img)) {
        $update_query            = "UPDATE post SET post_title='$post_title',post_content='$post_content',post_img='$post_img',post_status=' $post_status',post_tag='$post_tag' WHERE post_id=$update_id";
        $update                  = mysqli_query($this->conn, $update_query);
        if ($update ) {
            move_uploaded_file($post_img_tmp, "../images/$post_img");
            header('Location: manage_post.php');
        } else {
            die("Post Update Error!!" . mysqli_error($this->conn));
        }
       }else{
        $update_query            = "UPDATE post SET post_title='$post_title',post_content='$post_content',post_status=' $post_status',post_tag='$post_tag' WHERE post_id=$update_id";
        $update                  = mysqli_query($this->conn, $update_query);
        if ($update ) {
            header('Location: manage_post.php');
        } else {
            die("Post Update Error!!" . mysqli_error($this->conn));
        }
       }
    }


    //Delete post 

    public function delete_post($id){
        $delete_query = "DELETE FROM post WHERE post_id= $id";
        $res          = mysqli_query($this->conn, $delete_query);

        if ($res) {
            header('Location: manage_post.php');
        } else {
            die("Post Delete Error!!" . mysqli_error($this->conn));
        }
    }
    

    
}




