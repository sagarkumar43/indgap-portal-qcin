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
if (isset($_GET['search'])) {

    $BuyerType = $_GET['BuyerType'];
    $CategoryName = $_GET['CategoryName'];
    $Crop = $_GET['CropName'];
    $Variety = $_GET['Variety'];
    $Grade = $_GET['Grade'];
    $state = $_GET['State'];
    $CollectionCenter = $_GET['CollectionCenter'];
    //  $Size = $_GET['Size'];

    $fetchData = "SELECT B.ContactPersonName, B.MobileNo, B.Email, B.CompanyName,B.CompanyAddress ,B.BuyerType,B.State,I.Category,I.Commodities FROM buyer_registration B CROSS JOIN buyer_interested_commodities I WHERE B.BuyerType='$BuyerType' AND B.State='$state' AND I.Category='$CategoryName'  ORDER BY B.BuyerType, B.State, I.Category, I.Commodities";
    
   //  $fetchData = "SELECT buyer_registration.BuyerType,production.CollectionCenter,production.CommodityName,production.CommodityCategory,production.VarietyName,production.Grade,production.Size FROM `buyer_registration` CROSS JOIN `production` WHERE buyer_registration.BuyerType='$BuyerType' AND production.CommodityName='$CategoryName' AND production.VarietyName='$Variety' AND production.Grade='$Grade' AND production.Size='$Size' AND production.CollectionCenter='$CollectionCenter'";

   // $fetchData = "SELECT buyer_registration.BuyerType, buyer_registration.ContactPersonName,buyer_registration.MobileNo,buyer_registration.Email,buyer_registration.CompanyName,buyer_registration.CompanyAddress,buyer_registration.State,production.CommodityName,production.CommodityCategory,production.VarietyName FROM `buyer_registration` CROSS JOIN `production` WHERE buyer_registration.BuyerType='$BuyerType' AND production.CommodityName='$Crop' AND production.CommodityCategory='$CategoryName' AND buyer_registration.State='$state'";

    $Execute = mysqli_query($db, $fetchData);
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>View Buyer Search</title>
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
               <h2>View Buyer Search</h2>
            </div>
            <div class="table-1">
               <table class="table table-bordered">
                  <thead style="background-color: darkgreen;color: white;">
                     <tr>
                        <th>S.No.</th>
                        <th>Buyer Type</th>
                        <th>Category </th>
                        <th>Commodity Name </th>
                        <!-- <th>Variety </th> -->
                        <th>Buyer Name</th>
                        <th>Mobile No.</th>
                        <th>Email</th>
                        <th>Company Name</th>
                        <th>Company Address</th>
                        <th>State</th>
                       
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                        if($Execute==TRUE)
                        {
                        $count = 1;
                        while($Read = mysqli_fetch_array($Execute)){
                        ?>
                     <tr>
                        <td><?php echo $count ?></td>
                        <td><strong><?php echo $Read['BuyerType']; ?></strong></td>
                        <td><?php echo $Read['Category']; ?></td>
                        <td>
                           <?php 
                              $commodity = explode(",",$Read['Commodities']);
                              foreach($commodity as $commo)
                              {
                                 echo "$commo<br>"; 
                              }
                           ?>
                        </td>
                        <!-- <td><?php echo $Read['VarietyName']; ?></td> -->
                        <td><?php echo $Read['ContactPersonName']; ?></td>
                        <td><?php echo $Read['MobileNo']; ?></td>
                        <td><?php echo $Read['Email']; ?></td>
                        <td><?php echo $Read['CompanyName']; ?></td>
                        <td><?php echo $Read['CompanyAddress']; ?></td>
                        <td><?php echo $Read['State']; ?></td>
                     </tr>
                     <?php $count++; }} ?>
                  </tbody>
               </table>
            </div>
         </div>
      </main>
      <?php include "footer.php";?>
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