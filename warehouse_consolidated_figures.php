<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
   session_start();
   error_reporting(0);
   if ($_SESSION['Cluster_Registration_ID'] == '') {
       header("Location: cluster-login.php");
   }
       include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>View Consolidated Figure</title>
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
   <body style="background-image: url(images/cluster-bg1.jpg);background-repeat: repeat-y;background-position: center;">
      <?php include "cluster-menu.php";  ?>
      <main id="main">
         <section id="hero">
            <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
               <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
               <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active" style="background: url(assets/img/slide/slider5.jpg)">
                     <div class="carousel-container">
                        <div class="carousel-content">
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item" style="background:url(assets/img/slide/slider2.jpg)">
                     <div class="carousel-container">
                        <div class="carousel-content">
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item" style="background:url(assets/img/slide/slide-1.jpg)">
                     <div class="carousel-container">
                        <div class="carousel-content">
                        </div>
                     </div>
                  </div>
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
         <div class="container mt-5 mb-5">
            <div class="section-title">
               <h2>View Consolidated Figure Warehouse</h2>
            </div>
            <?php
               $msg = $_GET['msg'];
               if($msg == 'faild'){?>
            <center>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="bs-component">
                        <div class="alert alert-dismissible alert-danger" style="width: 50%;">
                           <button class="close" type="button" data-dismiss="alert" style="float: right;">×</button>Cluster Production not deleted.
                        </div>
                     </div>
                  </div>
               </div>
            </center>
            <?php } ?>
            <?php
               $msg = $_GET['msg'];
               if($msg == 'successd'){?>
            <center>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="bs-component">
                        <div class="alert alert-dismissible alert-success" style="width: 50%;">
                           <button class="close" type="button" data-dismiss="alert" style="float: right;">×</button>Cluster Production successfully deleted.
                        </div>
                     </div>
                  </div>
               </div>
            </center>
            <?php } ?>
            <div class="table-1">
               <div class="text-right">
               </div>
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>S.No.</th>
                        <th>Village Name</th>
                        <th>SQ FT</th>
                        <th>Capacity in MT</th>
                        <th>Accreditation status</th>
                        <th>Logistic facilities for Produce transport</th>
                        <th>Good Agricultural Practices Implementation</th>
                  </thead>
                  <tbody>
                     <?php
                        $select = "SELECT * FROM `village_info` WHERE Cluster_Registration_ID='$_SESSION[Cluster_Registration_ID]' AND DeletedStatus='0' ORDER BY VillageName DESC";
                        $execute = mysqli_query($db,$select);
                        $count =1;
                        while($read = mysqli_fetch_assoc($execute))
                        {
                        ?>
                     <tr>
                        <td><?php echo $count;  ?></td>
                        <td><?php echo $read['Sq_ft']; ?></td>
                        <td><?php echo $read['Capacity']; ?></td>
                        <td><?php echo $read['Accreditation_Status']; ?></td>
                        <td><?php echo $read['Logistic_facilities_for_Produce_transport']; ?></td>
                        <td><?php echo $read['CrAgricultaral_Practices_ImplimentationopName']; ?></td>
                     </tr>
                     <?php $count++; } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </main>
      <?php include "footer.php"; ?>
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