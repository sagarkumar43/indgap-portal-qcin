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
   // $query = mysqli_query($db, "SELECT * from `production` where FPO_Registration_ID = '$_SESSION[FPO_Registration_ID]' AND DeletedStatus='0' ORDER BY Production_ID DESC");
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
            <h2>View Consolidated Figure</h2>
         </div>
         <?php
               $msg = $_GET['msg'];
               if($msg == 'faild'){?>
         <center>
            <div class="row">
               <div class="col-lg-12">
                  <div class="bs-component">
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Production not deleted.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Production successfully deleted.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                  </div>
               </div>
            </div>
         </center>
         <?php } ?>

         <div class="container mt-5 mb-5">
            <div class="table-1 table-responsive" style="overflow: auto;height: 445px;">
               <div class="text-right">
                  <!-- <a href="add-production.php" class="btn btn-success mb-2">Add New Production</a> -->
               </div>
               <table class="table table-bordered">
                  <tr style="background-color: darkgreen;color: white;">
                     <th>S.No.</th>
                     <th>Commodity</th>
                     <th>Category </th>
                     <!-- <th>Variety</th> -->
                     <th>Grade</th>
                     <th>Total Quantity (In MT)</th>
                     <th>Quantity Sold (In MT)</th>
                     <th>Qty Balance (In MT)</th>
                     <th>Food Safty Certification</th>
                     <th>Qty Balance as on</th>
                     
                     <!-- <th>Edit</th>
                     <th>Delete</th> -->
                  </tr>
                  <?php
                      $select = "SELECT FPO_Registration_ID,CommodityName,Category,Variety,Grade,SUM(TotalQuantity) as TotalQuantity,QtySoldInMT,FoodSaftyCertification,QtyBalanceason FROM other_production WHERE FPO_Registration_ID = '$_SESSION[FPO_Registration_ID]' GROUP BY Id UNION ALL SELECT FPO_Registration_ID,CommodityName,Category,Variety,Grade,SUM(TotalQuantity) as TotalQuantity,QtySoldInMT,FoodSaftyCertification,QtyBalanceason FROM own_production WHERE FPO_Registration_ID = '$_SESSION[FPO_Registration_ID]' GROUP BY Id
                      ";
                      $execute = mysqli_query($db,$select);
                      $num = 1;
                      while($read = mysqli_fetch_assoc($execute))
                      {
                        $total = $read['TotalQuantity'];
                        $sold = $read['QtySoldInMT'];
                        $balance = $total - $sold;

                        $StartDate_csv = date_create($csv['QtyBalanceason']);
                        $CreatedDate = date_format($StartDate_csv,"d-M-Y");
                  ?>
                  <tr>
                     <td><?php echo $num; ?></td>
                     <td><?php echo $read['CommodityName']; ?></td>
                     <td><?php echo $read['Category']; ?></td>
                     <!-- <td><?php echo $read['Variety']; ?></td> -->
                     <td><?php echo $read['Grade']; ?></td>
                     <td><?php echo $read['TotalQuantity']; ?></td>
                     <td><?php echo $read['QtySoldInMT']; ?></td>
                     <td><?php echo $balance; ?></td>
                     <td><?php echo $read['FoodSaftyCertification']; ?></td>
                     <td><?php echo $CreatedDate; ?></td>
                     

                     <!-- <td align="center"><a onclick="return confirm('Are you sure want to edit?')"
                           href="production-edit.php?id=<?php echo $row['Production_ID']; ?>"><i
                              class="bi-pencil"></i></a>
                     </td>
                     <td align="center"><a onclick="return confirm('Are you sure want to delete?')"
                           href="production-delete.php?id=<?php echo $row['Production_ID']; ?>"><i
                              class="bi-trash"></i></a></td> -->
                  </tr>
                  <?php $num++; } //$count = $count+1;}} ?>
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
   <style>
      .table-striped tr th {
         color: #fff !important;
      }
   </style>
</body>

</html>