<?php 

include("admin/inc/config.php");
$homeObj = new AdminBlog();



?>

<!DOCTYPE html>
<html lang="en">

<?php include_once("inc/head.php");?>

<body>

  <!-- ***** Preloader Start ***** -->
  <?php include_once("inc/preloader.php"); ?>
  <!-- ***** Preloader End ***** -->

  <!-- Header -->
  <?php include_once("inc/navber.php"); ?>

  <!-- Page Content -->
  <!-- Banner Starts Here -->
  <div class="heading-page header-text">
    <section class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-content">
              <h4>Post Details</h4>
              <h2>Single blog post</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

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


  <!-- Single blog -->

  <?php include_once("inc/single-post.php") ?>


  <?php include_once("inc/footer.php");?>


  <!-- Bootstrap core JavaScript -->
  <?php include_once("inc/script.php");?>


</body>

</html>