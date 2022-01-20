<?php 
include("inc/config.php");
ob_start();
$obj = new AdminBlog();
session_start();
$id = $_SESSION['adminID'];

if ($id == null) {
  header("location: index.php");
}
?>


<?php 

include_once("inc/header.php");

?>

<body class="sb-nav-fixed">
  <?php include_once("inc/topnav.php"); ?>
  <div id="layoutSidenav">
    <?php include_once("inc/sidenav.php"); ?>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">

          <?php
                   #adding pages to template
                   
                   if (isset($view)) {
                      if ($view == "dashboard") {
                        include("pages/dash_view.php"); 
                      }elseif ($view == "add_category") {
                        include("pages/add_cat_view.php");
                      }
                      elseif ($view == "manage_category") {
                        include("pages/manage_cat_view.php");
                      }
                      elseif ($view == "add_post") {
                        include("pages/add_post_view.php");
                      }
                      elseif ($view == "manage_post") {
                        include("pages/manage_post_view.php");
                      }elseif ($view == "edit_post"){
                        include("pages/edit_post_view.php");
                      }
                   }
                   ?>
        </div>
      </main>
      <?php include_once("inc/footer.php") ?>
    </div>
  </div>
  <?php include_once("inc/script.php") ?>
  <?php ob_end_flush();?>
</body>

</html>