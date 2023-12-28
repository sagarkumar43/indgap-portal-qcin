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

  //  $query1 = mysqli_query($db, "SELECT * , COUNT(NoofFarmersRegistered) as totalvillage FROM `fpo_registration` where FPO_Registration_ID  = '$_SESSION[FPO_Registration_ID]' AND DeletedStatus='0'");
  //  $read = mysqli_fetch_assoc($query1);

   $query2 = mysqli_query($db, "SELECT *  FROM `farmers` where FPO_Registration_ID  = '$_SESSION[FPO_Registration_ID]' AND DeletedStatus='0'");
   $read1 = mysqli_fetch_assoc($query2);


   $query = mysqli_query($db, "SELECT * from fpo_registration where FPO_Registration_ID  = '$_SESSION[FPO_Registration_ID]' AND DeletedStatus='0'");
   $row = mysqli_fetch_assoc($query);


   ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>FPO Profile</title>
   <meta content="" name="description">
   <meta content="" name="keywords">
   <link href="assets/img/favicon.png" rel="icon">
   <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
   <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet">
   <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
   <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
   <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
   <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
   <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
   <link href="assets/css/style.css" rel="stylesheet">
</head>
<style>
   .section-title h2::after {
      left: 0px;
   }

   .section-title {
      text-align: left;
   }

   .profile-status {
      position: absolute;
      right: 0px;
      left: 60%;
      top: 50%;
      margin-top: -50px;
   }

   .profile-status p {
      font-size: 12px;
      margin-bottom: 5px;
   }

   .progress-bar {
      background-color: #8bc34a;
   }

   .relative {
      position: relative;
   }
</style>

<body style="background-image: url('images/fpo-bg2.jpg');background-repeat: repeat-y;background-position: center;">
<?php include "fpo_header.php";  ?>
  <?php include "fpo-menu.php";  ?>
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
        <h2>FPO Summary</h2>
      </div>
      <div class="table-1">
        <table class="table table-bordered">
            <tr>
                <th class="col-md-2">FPO</th>
                <td><?php echo $row['FPOExporterName'] ?></td>
                <th class="col-md-2">Address</th>
                <td><?php echo $row['Address']; ?></td>
                <th class="col-md-2">Block</th>
                <td><?php echo $row['BlockMandalTaluk']; ?></td>
            </tr>
            <tr>
                <th class="col-md-2">District</th>
                <td><?php echo $row['District']; ?></td>
                <th class="col-md-2">State</th>
                <td><?php echo $row['State']; ?></td>
                <th class="col-md-2">Major Commodities</th>
                <td>
                  <!-- <?php $major = explode(",", $read['CropName']); foreach($major as $corpname){ echo "$corpname<br>"; }?> -->
                  <?php echo $read1['CropName']; ?>
                </td>
            </tr>

            <tr>
                <!-- <th class="col-md-2">No. of Villagers</th>
                <td><?php echo $read['totalvillage']; ?></td> -->
                <th class="col-md-2">No. of Farmers</th>
                <td><?php echo $row['NoofFarmersRegistered']; ?></td>
                <th class="col-md-3">Land Under Cultivation</th>
                <td><?php echo $read1['TotalIrrigatedArea']; ?></td>
                <th><td></td></th>
            </tr>
            </table>
            
            <div class="container" style="overflow: auto;height: 248px;">
            <table class="table table-bordered">
                <thead style="background-color: darkgreen;color: white;">
                    <tr>
                        <th>S.No.</th>
                        <th>Commodities</th>
                        <th>Variety</th>
                        <th>Grade</th>
                        <th>Expected Yield (in MT)</th>
                        <th>Month of Harvest</th>
                        <!-- <th>Food Safety Certification Status</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $village = mysqli_query($db, "SELECT F.*, SUM(F.ExpectedYeildinMT) as Expected,R.RegistrationCertificate FROM `farmers` F INNER JOIN fpo_registration R ON F.FPO_Registration_ID=R.FPO_Registration_ID WHERE R.FPO_Registration_ID  = '$_SESSION[FPO_Registration_ID]' GROUP BY Variety,Grade,CropName ORDER BY Grade");
                        $count = 1;
                        while($fetch = mysqli_fetch_assoc($village))
                        {
                          if($fetch['RegistrationCertificate'] == TRUE)
                          {
                            $status = "Yes";
                          }
                          else
                          {
                            $status = "No";
                          }
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $fetch['CropName']; ?></td>
                        <td><?php echo $fetch['Variety']; ?></td>
                        <td><?php echo $fetch['Grade']; ?></td>
                        <td><?php echo $fetch['Expected']; ?></td>
                        <td><?php echo $fetch['HarvestingMonth']; ?></td>
                        <!-- <td><?php echo $status;  ?></td> -->
                    </tr>
                    <?php $count++; } ?>
                </tbody>
            </table>
            </div>
      </div>
    </div>
  </main>
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
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
              industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
              scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
              electronic typesetting, remaining essentially unchanged.</p>
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
  </footer>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
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