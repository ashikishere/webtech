<?php 


class AdminBlog{
    private $conn;

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
}




