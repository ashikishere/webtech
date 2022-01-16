<?php 

/* 
#data base host, data base user, database pass, database name
*/

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
}




?>