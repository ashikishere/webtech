<?php 
include("admin/inc/config.php");
$homeObj = new AdminBlog();


?>
<!-- Head -->
<?php include_once("inc/head.php");?>

<body>

  <!-- ***** Preloader Start ***** -->
  <?php include_once("inc/preloader.php"); ?>
  <!-- ***** Preloader End ***** -->

  <?php include_once("inc/navber.php"); ?>

  <!-- Page Content -->
  <!-- Banner Starts Here -->
  <?php include_once("inc/banner.php"); ?>
  <!-- Banner Ends Here -->

  <!-- <section class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="main-content">
            <div class="row">
              <div class="col-lg-8">
                <span>Stand Blog HTML5 Template</span>
                <h4>Creative HTML Template For Bloggers!</h4>
              </div>
              <div class="col-lg-4">
                <div class="main-button">
                  <a rel="nofollow" href="https://templatemo.com/tm-551-stand-blog" target="_parent">Download Now!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Blog section -->

  <?php include_once("inc/blog.php") ?>

  <!-- Footer Section -->
  <?php include_once("inc/footer.php");?>

  <!-- All js -->
  <?php include_once("inc/script.php");?>

</body>

</html>