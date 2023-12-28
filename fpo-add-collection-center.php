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
   $query1 = mysqli_query($db, "SELECT * from collection_center where FPO_Registration_ID  = '$_SESSION[FPO_Registration_ID]' AND DeletedStatus='0' ORDER BY CollectionCenter");
   if (isset($_POST["CollectionCenter"])) {
     $CollectionCenter = mysqli_real_escape_string($db, $_POST["CollectionCenter"]);
     $NearestTwonForTransport = mysqli_real_escape_string($db, $_POST["NearestTwonForTransport"]);
     $DistanceByRoadToTheCollectionCanter = mysqli_real_escape_string($db, $_POST["DistanceByRoadToTheCollectionCanter"]);
     $GovermentMandiProductAuctionLocation = mysqli_real_escape_string($db, $_POST["GovermentMandiProductAuctionLocation"]);
     $query = mysqli_query($db, "INSERT INTO `collection_center` (`Collection_Center_ID`, `FPO_Registration_ID`, `State`, `District`, `CollectionCenter`, `NearestTwonForTransport`, `DistanceByRoadToTheCollectionCanter`, `GovermentMandiProductAuctionLocation`, `DeletedStatus`, `UpdatedDate`, `CreatedDate`) VALUES (NULL, '$_SESSION[FPO_Registration_ID]', '$row[State]', '$row[District]', '$CollectionCenter', '$NearestTwonForTransport', '$DistanceByRoadToTheCollectionCanter', '$GovermentMandiProductAuctionLocation', '0', '', current_timestamp());");
     if ($query) {
       header("Location:collection-center.php?msg=success");
     } else {
       header("Location:collection-center.php?msg=fail");
     }
   } 
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Collection Center</title>
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
   <body style="background-image: url('images/fpo-bg2.jpg');background-repeat: repeat-y;background-position: center;">
      <?php include "fpo_header.php";?>
      <main id="main">
         <section id="hero">
            <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade"
               data-bs-ride="carousel">
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
               <h2>Collection Center</h2>
            </div>
            <?php
               $msg = $_GET['msg'];
               if($msg == 'fail'){?>
            <center>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="bs-component">
                        <div class="alert alert-dismissible alert-danger" style="width: 50%;">
                           <button class="close" type="button" data-dismiss="alert"
                              style="float: right;">×</button>Collection Center not saved.
                        </div>
                     </div>
                  </div>
               </div>
            </center>
            <?php } ?>
            <?php
               $msg = $_GET['msg'];
               if($msg == 'success'){?>
            <center>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="bs-component">
                        <div class="alert alert-dismissible alert-success" style="width: 50%;">
                           <button class="close" type="button" data-dismiss="alert"
                              style="float: right;">×</button>Collection Center successfully saved.
                        </div>
                     </div>
                  </div>
               </div>
            </center>
            <?php } ?>
            <?php
               $msg = $_GET['msg'];
               if($msg == 'faild'){?>
            <center>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="bs-component">
                        <div class="alert alert-dismissible alert-danger" style="width: 50%;">
                           <button class="close" type="button" data-dismiss="alert"
                              style="float: right;">×</button>Collection Center not deleted.
                        </div>
                     </div>
                  </div>
               </div>
            </center>
            <?php } 
               $msg = $_GET['msg'];
               if($msg == 'successd'){
               ?>
            <center>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="bs-component">
                        <div class="alert alert-dismissible alert-success" style="width: 50%;">
                           <button class="close" type="button" data-dismiss="alert"
                              style="float: right;">×</button>Collection Center successfully deleted.
                        </div>
                     </div>
                  </div>
               </div>
            </center>
            <?php } ?>
            <div class="table-1">
               <table class="table table-bordered">
                  <tr>
                     <td><strong>State</strong></td>
                     <td>
                        <?php echo $row['State']; ?>
                     </td>
                  </tr>
                  <tr>
                     <td><strong>District</strong></td>
                     <td>
                        <?php echo $row['District']; ?>
                     </td>
                  </tr>
                  <form action="" method="POST">
                     <tr>
                        <td width="50%"><strong>Collection Center</strong></td>
                        <td><input type="text" name="CollectionCenter" class="form-control" placeholder="">
                        </td>
                     </tr>
                     <tr>
                        <td><strong>Nearest Town For Transport</strong></td>
                        <td><input type="text" name="NearestTwonForTransport" class="form-control" placeholder=""></td>
                     </tr>
                     <tr>
                        <td><strong>Distance By Road To The Collection Center</strong></td>
                        <td><input type="text" name="DistanceByRoadToTheCollectionCanter" class="form-control"
                           placeholder=""></td>
                     </tr>
                     <tr>
                        <td><strong>Goverment Mandi / Product Auction Location</strong></td>
                        <td><input type="text" name="GovermentMandiProductAuctionLocation" class="form-control"
                           placeholder=""></td>
                     </tr>
                     <tr>
                        <td colspan="2" align="right">
                           <button type="submit" class="btn btn-success">Submit</button>
                           <button type="reset" class="btn btn-danger">Cancel</button>
                        </td>
                     </tr>
                  </form>
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