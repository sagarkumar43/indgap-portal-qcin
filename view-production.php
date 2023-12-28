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
   $query = mysqli_query($db, "SELECT * FROM `own_production` WHERE FPO_Registration_ID = '$_SESSION[FPO_Registration_ID]'");
   if (isset($_POST["Import"])) {
       if (strtolower(end(explode(".", $_FILES['file']['name']))) == "csv") {
           $fh = fopen($_FILES["file"]["tmp_name"], "r");
           $rowmaxnum = $_FILES["file"]["name"];
           if ($fh === false) {
               header("Location:view-production.php?msg=fail");
           }
           $count = 0;
           while (($emapData = fgetcsv($fh)) !== false) {
               if ($count > 0) {
                   $query = mysqli_query($db, "INSERT INTO `own_production` (`Id`, `FPO_Registration_ID`, `CommodityName`, `Category`, `Variety`, `Grade`, `ExpectedYeild`, `ActualYield`, `DifferenceQty`, `PercentageOfVariation`, `FileName`, `FarmerName`, `FatherName`, `Mobile`, `District`, `Block`, `Village`, `State`, `FPO_SelfHelpGroup`, `CollectionCenter`, `Season`, `TotalQuantity`, `QtySoldInMt`, `QuantityBalanceInMT`, `QtyBalanceason`, `Specifications`, `FoodSaftyCertification`, `Imgae`, `CreatedDate`) VALUES (NULL,'$_SESSION[FPO_Registration_ID]','$emapData[9]','$emapData[10]','$emapData[11]','$emapData[12]','$emapData[13]','$emapData[14]','$emapData[15]','$emapData[16]','$rowmaxnum','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]','','$emapData[18]','$emapData[23]','$emapData[24]','$emapData[25]','$emapData[26]','$emapData[27]' , '', '', CURRENT_TIMESTAMP);");
               }
               $count = $count + 1;
           }
           fclose($fh);
           if (strtolower(end(explode(".", $_FILES["file"]["name"]))) == "csv") {
               move_uploaded_file($_FILES["file"]["tmp_name"], "assets/uploaded_csv_files/" . $_FILES["file"]["name"]);
           }
           echo "<script type='text/javascript'>
                                 alert('CSV File has been successfully Imported.');
                                 window.location = 'view-production.php'
                             </script>";
       } else {
           echo "<script>alert('Document should be in CSV format')</script>";
       }
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Own Production</title>
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
      <style>
         .table-striped tr th {
         color: #fff !important;
         }
      </style>
   </head>
   <body style="background-image: url('images/fpo-bg2.jpg');background-repeat: repeat-y;background-position: center;">
      <?php include "fpo_header.php"; ?>
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
               <h2>View CSV File</h2>
            </div>
            <?php
               if ($_GET['msg'] == 'faild') { ?>
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
            <?php
               }
               if ($_GET['msg'] == 'successd') { ?>
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
            <?php
               } ?>
            <div class="container mt-5 mb-5">
               <div class="text-right">
                  <form method="post" name="upload_excel" enctype="multipart/form-data" class="form-horizontal well">
                     <a href="assets/csv_file/Farmer CSV -for Own Production Format File.csv" target="_blank">Click here to
                     download csv format file</a>
                     <input type="file" name="file" id="file" class="border border-dark" accept=".csv" required="">
                     <button type="submit" id="submit" name="Import" class="btn btn-success mb-2"
                        data-loading-text="Loading...">Import</button>
                  </form>
                  <?php
                     if ($_GET['msg'] == 'fail') {
                     ?>
                  <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                     <b>Invalid File: Please Upload Only CSV File.</b>
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php
                     } ?>
               </div>
               <div class="table-1" style="overflow: auto;height: 315px;">
                  <table class="table table-bordered table-striped">
                     <tbody>
                        <tr style="background-color: darkgreen;color: white;">
                           <th>S.No. </th>
                           <th>Commodity Name</th>
                           <th>Category</th>
                           <th>Variety</th>
                           <th>Grade</th>
                           <th>Expected Yield in MT</th>
                           <th>Actual Yield in MT </th>
                           <th>Difference Qty In MT </th>
                           <th>% of Variation </th>
                           <!-- <th>Action</th> -->
                        </tr>
                     </tbody>
                     <?php
                        $select = "SELECT *,Variety, SUM(ExpectedYeild) as Expected,SUM(ActualYield) as Actual, SUM(DifferenceQty) as Difference, SUM(PercentageOfVariation) as percentage FROM `own_production` WHERE FPO_Registration_ID = '$_SESSION[FPO_Registration_ID]' GROUP BY Id";
                        $fetch = mysqli_query($db, $select);
                        $count = 1;
                        while ($read = mysqli_fetch_assoc($fetch)) {
                            $expected = $read['Expected'];
                            $actual = $read['Actual'];
                            $difference = $expected - $actual;
                            $percentage = $difference / $expected * 100;
                            $percentages = round($percentage, 2);
                        ?>
                     <tr>
                        <td>
                           <?php echo $count; ?>
                        </td>
                        <td>
                           <?php echo $read['CommodityName']; ?> 
                        </td>
                        <td>
                           <?php echo $read['Category']; ?>
                        </td>
                        <td>
                           <?php echo $read['Variety']; ?>
                        </td>
                        <td>
                           <?php echo $read['Grade']; ?>
                        </td>
                        <td>
                           <?php echo $read['Expected']; ?>
                        </td>
                        <td>
                           <?php echo $read['Actual']; ?>
                        </td>
                        <td>
                           <?php echo $difference; ?>
                        </td>
                        <td>
                           <?php echo $percentages; ?> %
                        </td>
                     </tr>
                     <?php
                        $count++;
                        }
                        ?>
                  </table>
               </div>
            </div>
            <hr class="mt-5">
            <div class="section-title">
               <h2>View Own Production</h2>
            </div>
            <div class="text-right">
               <a href="add-own-production.php" class="btn btn-success mb-2">Add Own Production</a>
            </div>
            <div class="table-1 table-responsive" style="overflow: auto;height: 445px;">
               <table class="table table-bordered">
                  <tr style="background-color: darkgreen;color: white;">
                     <th>S.No.</th>
                     <th>Collection Center</th>
                     <th>Commodity Name</th>
                     <th>Category</th>
                     <th>Variety</th>
                     <th>Grade</th>
                     <th>Season</th>
                     <th>Total Quantity </th>
                     <th>Qty Sold  In Mt</th>
                     <th>Quantity Balance In MT</th>
                     <th>Qty Balance as on </th>
                     <th>Specifications </th>
                     <th>Image</th>
                     <th>Edit</th>
                  </tr>
                  <?php
                     if ($query) {
                         $count = 1;
                         while ($row = mysqli_fetch_array($query)) {
                             $StartDate_csv = date_create($row['CreatedDate']);
                             $CreatedDate = date_format($StartDate_csv, "d M Y");
                             $total = $row['TotalQuantity'];
                             $sold = $row['QtySoldInMt'];
                             $balanceqty = $total - $sold;
                     ?>
                  <tr>
                     <td><?php echo $count; ?></td>
                     <td><?php echo $row['CollectionCenter']; ?></td>
                     <td><?php echo $row['CommodityName']; ?></td>
                     <td><?php echo $row['Category']; ?></td>
                     <td><?php echo $row['Variety']; ?></td>
                     <td><?php echo $row['Grade']; ?></td>
                     <td><?php echo $row['Season']; ?></td>
                     <td><?php echo $row['TotalQuantity']; ?></td>
                     <td><?php echo $row['QtySoldInMt']; ?></td>
                     <td><?php echo $balanceqty; ?></td>
                     <td><?php echo $CreatedDate; ?></td>
                     <td><?php echo $row['Specifications']; ?></td>
                     <td>
                        <a href="assets/img/cropimages/<?php echo $row['Imgae']; ?>"><img
                           src="assets/img/cropimages/<?php echo $row['Imgae']; ?>" style="height: 50px;width: 50px;"></a>
                     </td>
                     <!-- <td>
                        <?php
                           $query2 = mysqli_query($db, "SELECT * FROM `production_certifications` WHERE Production_ID = '$row[Production_ID]' AND DeletedStatus='0' ORDER BY production_certification_id DESC LIMIT 1");
                           while ($row2 = mysqli_fetch_assoc($query2)) {
                               if (!empty($row2['certification_name'])) {
                                   $status = "Yes";
                               } else {
                                   $status = "No";
                               }
                               echo $status;
                           }
                           ?>
                        </td> -->
                     <td align="center"><a onclick="return confirm('Are you sure want to edit?')"
                        href="edit-own-production.php?id=<?php echo $row['Id']; ?>"><i class="bi-pencil"></i></a>
                  </tr>
                  <?php $count = $count + 1;
                     }
                     } ?>
               </table>
            </div>
            <hr class="mt-5">
            <div class="section-title">
               <h2>View Other Purchase</h2>
            </div>
            <div class="table-1 table-responsive" style="overflow: auto;height: 445px;">
               <div class="text-right">
                  <a href="add-other-production.php" class="btn btn-success mb-2">Add Other Purchase</a>
               </div>
               <table class="table table-bordered">
                  <tbody>
                     <tr style="background-color: darkgreen;color: white;">
                        <th>S.No.</th>
                        <th>Collection Center</th>
                        <th>Commodity Name</th>
                        <th>Category</th>
                        <th>Variety</th>
                        <th>Grade</th>
                        <th>Season</th>
                        <th>Total Quantity </th>
                        <th>Qty Sold  In Mt</th>
                        <th>Quantity Balance In MT</th>
                        <th>Qty Balance as on </th>
                        <th>Specifications </th>
                        <th>Imgae</th>
                     </tr>
                     <?php
                        $csvfile = "SELECT * FROM `other_production` WHERE FPO_Registration_ID = '$_SESSION[FPO_Registration_ID]'";
                        $executecsv = mysqli_query($db, $csvfile);
                        $count = 1;
                        while ($csv = mysqli_fetch_assoc($executecsv)) {
                            $StartDate_csv = date_create($csv['CreatedDate']);
                            $CreatedDate = date_format($StartDate_csv, "d M Y");
                            $totalqty = $csv['TotalQuantity'];
                            $soldqty = $csv['QtySoldInMt'];
                            $balanceqty = $totalqty - $soldqty;
                        ?>
                     <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $csv['CollectionCenter']; ?></td>
                        <td><?php echo $csv['CommodityName']; ?></td>
                        <td><?php echo $csv['Category']; ?></td>
                        <td><?php echo $csv['Variety']; ?></td>
                        <td><?php echo $csv['Grade']; ?></td>
                        <td><?php echo $csv['Season']; ?></td>
                        <td><?php echo $csv['TotalQuantity']; ?></td>
                        <td><?php echo $csv['QtySoldInMt']; ?></td>
                        <td><?php echo $balanceqty; ?></td>
                        <td><?php echo $CreatedDate; ?></td>
                        <td><?php echo $csv['Specifications']; ?></td>
                        <td>
                           <a href="assets/img/cropimages/<?php echo $csv['Imgae']; ?>" target="_blank"><img
                              src="assets/img/cropimages/<?php echo $csv['Imgae']; ?>" style="height: 50px;width: 50px;"></a>
                        </td>
                     </tr>
                     <?php $count++;
                        } ?>
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