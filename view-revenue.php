<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
session_start();
error_reporting(0);
if ($_SESSION['FPO_Registration_ID'] == '') {
    header("Location: fpo-login.php");
}
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Year Wise FPO Revenue</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>
  <?php include "fpo-menu.php";?>
  <main id="main">


    <!-- ======= Hero Section ======= -->

    <section id="hero">
      <div class="hero-container">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
          <div class="carousel-inner" role="listbox">
            <!-- Slide 1 -->
            <div class="carousel-item active" style="background: url(assets/img/slide/slider5.jpg)">
              <div class="carousel-container">
                <div class="carousel-content">
                </div>
              </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item" style="background:url(assets/img/slide/slider2.jpg)">
              <div class="carousel-container">
                <div class="carousel-content">
                </div>
              </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item" style="background:url(assets/img/slide/slide-1.jpg)">
              <div class="carousel-container">
                <div class="carousel-content">
                </div>
              </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item" style="background:url(assets/img/slide/slide4.jpg)">
              <div class="carousel-container">
                <div class="carousel-content">
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
    <!-- End Hero -->

    <div class="container mt-5 mb-5">

      

      <div class="section-title">
        <h2>Year Wise FPO Revenue</h2>
      </div>

    <div class="table-1">

<table class="table table-bordered">
  <tr>
    <th colspan="3"></th>
    <th colspan="3">Business Activities</th>
    <th colspan="3">Business Turnover(In Rs)</th>
    <th></th>
    </tr>

        <tr>
          <th>Year</th>
          <th>Major Commodity (Production In MT)</th>
          <th>Input	</th>
          <th>Output	</th>
          <th>Custom Hiring Centre	</th>
          <th>Input	</th>
          <th>Output</th>
          <th>Custom Hiring Centre</th>
          <th>Net Profit (In Rs)</th>
          <th>Remark</th>
        </tr>

        <tr>
          <td>2017-2018</td>
          <td>Bitter Gourd(0), Bottle Gourd (Lauki)(0), Cabbage(0), Capsicum(0), Cucumber(0), Okra/Ladyfinger(0), Tomato(0)</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>This Project is closed now , so they don't have any turnover details.</td>
        </tr>

        <tr>
          <td>2016-2017</td>
          <td>Bitter Gourd(1), Bottle Gourd (Lauki)(2), Cabbage(1), Capsicum(1), Cucumber(1), Okra/Ladyfinger(3), Tomato(3)</td>
          <td>Seed and Fertilizer</td>
          <td>Sale of Products</td>
          <td></td>
          <td>500,000</td>
          <td>560,000</td>
          <td></td>
          <td>60,000</td>
          <td></td>
        </tr>

        

        

      </table>
    </div>
    </div>



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Link-1</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Link-2</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Link-3</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Link-4</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Link-5</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              XYZ <br>
              New Delhi, 110055<br>
              India <br><br>
              <strong>Phone:</strong> +91-9898989898<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

          </div>

          <div class="col-lg-6 col-md-6 footer-info">
            <h3>About</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        Copyright 2022. All rights reserved.
      </div>
      <div class="credits">
        Design & Developed by <a href="https://aretesoftwares.com/">Aretesoftwares.com</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>