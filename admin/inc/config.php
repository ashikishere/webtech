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
}




