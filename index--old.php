<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Efresh FPO</title>
      <meta content="" name="description">
      <meta content="" name="keywords">
      <link href="assets/img/favicon.png" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
      <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
      <link href="assets/css/style.css" rel="stylesheet">
   </head>
   <body>
      <?php include("main-header.php") ?>
      <section id="hero">
         <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
               <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
               <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active" style="background: url(assets/img/slide/slide-1.jpg)">
                     <div class="carousel-container">
                        <div class="carousel-content">
                           <!-- <h2 class="animate__animated animate__fadeInDown" style="color:#fff !important;">Welcome to <span>Market Linkages Platform</span></h2> -->
                           <!--<a href="homepage_details.php" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>-->
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item" style="background: url(assets/img/slide/slide4.jpg)">
                     <div class="carousel-container">
                        <div class="carousel-content">
                           <!-- <h2 class="animate__animated fanimate__adeInDown" style="color:#fff !important;">Welcome to <span>Market Linkages Platform</span></h2> -->
                           <!--<a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>-->
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
               <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
               </a>
               <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
               <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
               </a>
            </div>
         </div>
      </section>
      <main id="main">
         <section id="featured" class="featured">
            <div class="container">
               <div class="row">
                  <div class="col-lg-4">
                     <div class="icon-box">
                        <i class="bi bi-card-checklist"></i>
                        <h3><a href="about_buyer_interface.php">Buyer Interface</a></h3>
                        <a href="about_buyer_interface.php" class="btn btn-success animate__animated animate__fadeInUp">Read More</a>
                     </div>
                  </div>
                  <div class="col-lg-4 mt-4 mt-lg-0">
                     <div class="icon-box">
                        <i class="bi bi-bar-chart"></i>
                        <h3><a href="about_fpo.php">FPO/Supplier</a></h3>
                        <a href="about_fpo.php" class="btn btn-success animate__animated animate__fadeInUp">Read More</a>
                     </div>
                  </div>
                  <div class="col-lg-4 mt-4 mt-lg-0">
                     <div class="icon-box">
                        <i class="bi bi-binoculars"></i>
                        <h3><a href="about_cluster.php">Cluster</a></h3>
                        <a href="about_cluster.php" class="btn btn-success animate__animated animate__fadeInUp">Read More</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </main>
      <?php include "footer.php";?>
      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
      <script src="assets/vendor/purecounter/purecounter.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
      <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
      <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
      <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
      <script src="assets/vendor/php-email-form/validate.js"></script>
      <script src="assets/js/main.js"></script>
   </body>
</html>