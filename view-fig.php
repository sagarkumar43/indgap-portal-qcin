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
$query = mysqli_query($db, "SELECT State,District from fpo_registration where FPO_Registration_ID  = '$_SESSION[FPO_Registration_ID]' AND DeletedStatus='0'");
$row = mysqli_fetch_assoc($query);
$query1 = mysqli_query($db, "SELECT * from cluster_registration where State  = '$row[State]' AND District  = '$row[District]' AND DeletedStatus='0' ORDER BY Cluster_Registration_ID ASC");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View FIG Details</title>
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

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+91-9898989898</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="profile.php">Logo Here</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="collection-center.php">Collection Center</a></li>
          <li><a href="view-production.php">Production</a></li>
          <li><a href="crop-calender.php">Crop Calender</a></li>
          <li><a href="view-revenue.php">Revenue </a></li>
          <li><a href="view-farmer.php">Farmers</a></li>
          <li><a class="active" href="view-fig.php">FIGs</a></li>
          <li><a href="buyer-search.php">Buyer Search</a></li>
          <li class="dropdown">
            <a href="#"><span>Useful links</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a href="buyer-interface.php" class="btn-get-started animate__animated animate__fadeInUp logout-btn">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->



  <main id="main">


    <div class="slider img">
      <img src="assets/img/slide/slider.jpg">
    </div>

    <div class="container mt-5 mb-5">

      

      <div class="section-title">
        <h2>View FIG Details</h2>
      </div>

    <div class="table-1">

<table class="table table-bordered">

        <tr>
          <th>S.No.	</th>
          <th>District</th>
          <th>Block	</th>
          <th>FIG Name</th>
          <th>No. of Farmers Mobilized</th>
        </tr>
<?php
  if($query1){
    $count = 1;
    while($row1 = mysqli_fetch_array($query1)){
      ?>
        <tr>
          <td><?php echo $count; ?></td>
          <td><?php echo $row['District']; ?></td>
          <td><?php echo $row1['Block']; ?></td>
          <td><?php echo $row1['NameoftheContactPerson']; ?></td>
          <td><?php echo $row1['NoofFarmers']; ?></td>
        </tr>
<?php $count = $count+1;}} ?>
     

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