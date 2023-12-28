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
   $query = mysqli_query($db, "SELECT * from farmers where FPO_Registration_ID  = '$_SESSION[FPO_Registration_ID]' AND DeletedStatus='0' ORDER BY Grade");
   if (isset($_POST["Import"])) {
       if (strtolower(end(explode(".", $_FILES["file"]["name"]))) == "csv") {
           $fh = fopen($_FILES["file"]["tmp_name"], "r");
           $filename = $_FILES["file"]["name"];
           if ($fh === false) {
               header("Location:view-farmer.php?msg=fail");
           }
           $count = 0;
           while (($emapData = fgetcsv($fh)) !== false) {
               if ($count > 0) {
                   $query = mysqli_query($db, "INSERT INTO `farmers` (`Farmer_Id`, `FPO_Registration_ID`, `FPOSelfHelpGroup`, `FarmerName`, `PhoneNo`, `TotalIrrigatedArea`, `State`, `District`, `Block`, `SowingMonth`, `ExpectedYeildinMT`, `CurrentMarketPlace`, `FatherName`, `Village`, `HarvestingMonth`, `CropName`, `Grade`, `Variety`, `FileName`, `DeletedStatus`, `UpdatedDate`, `CreatedDate`) VALUES (NULL, '$_SESSION[FPO_Registration_ID]', '$emapData[5]', '$emapData[6]', '$emapData[8]', '$emapData[9]', '$emapData[4]', '$emapData[1]', '$emapData[2]', '$emapData[13]', '$emapData[15]', '$emapData[16]', '$emapData[7]', '$emapData[3]', '$emapData[14]', '$emapData[10]', '$emapData[11]', '$emapData[12]', '$filename', '0', NULL, CURRENT_TIMESTAMP)");
               }
               $count = $count + 1;
           }
           fclose($fh);
           move_uploaded_file($_FILES["file"]["tmp_name"], "assets/uploaded_csv_files/farmer/" . $_FILES["file"]["name"]);
           echo "<script type='text/javascript'>
                                    alert('CSV File has been successfully Imported.');
                                   window.location = 'view-farmer.php'
                             </script>";
       } else {
           echo "<script>alert('Document should be in CSV format')</script>";
       }
   }
   if (isset($_POST['but_delete'])) {
       if (isset($_POST['delete'])) {
           foreach ($_POST['delete'] as $deleteid) {
               $deleteUser = "DELETE from farmers WHERE Farmer_Id=" . $deleteid;
               $del_records = mysqli_query($db, $deleteUser);
               if ($del_records == TRUE) {
                   echo "<script type='text/javascript'>
                                    alert('Record Deleted Successfully.');
                                   window.location = 'view-farmer.php'
                             </script>";
               }
           }
       }
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Farmer's Details</title>
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
         background-color:darkgreen;
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
         <div class="section-title">
            <h2>View Farmer's Details</h2>
         </div>
         <div class="container mt-5 mb-5">
            <div class="text-right">
               <form method="post" name="upload_excel" enctype="multipart/form-data" class="form-horizontal well">
                  <a href="assets/FPO Farmer CSV Format File.csv" target="_blank">Click here to download csv format file</a>
                  <input type="file" name="file" id="file" class="border border-dark" accept=".csv" required="">
                  <button type="submit" id="submit" name="Import" class="btn btn-success mb-2"
                     data-loading-text="Loading...">Import</button>
                  <a href="add-farmer-details.php" class="btn btn-success mb-2">Add Farmer's Details</a>
               </form>
               <?php
                  $msg = $_GET['msg'];
                  if ($msg == 'fail') {
                  ?>
               <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                  <b>Invalid File: Please Upload Only CSV File.</b>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
               <?php
                  } ?>
            </div>
            <div class="table-1" style="overflow: auto;height: 455px;">
               <form method="post">
                  <table class="table table-bordered table-striped">
                     <tr>
                        <th><input type='submit' value='Delete' name='but_delete' class="btn btn-danger mb-2"></th>
                        <th>S.No. </th>
                        <th>District</th>
                        <th>Block </th>
                        <th>Village </th>
                        <th>State</th>
                        <th>FPO / Self help Group</th>
                        <th>Farmer Name </th>
                        <th>Father Name</th>
                        <th>Mobile</th>
                        <th>Total Irrigated Area (In HA)</th>
                        <th>Commodity Name</th>
                        <th>Grade</th>
                        <th>Variety</th>
                        <th>Sowing Month</th>
                        <th>Harvesting Month</th>
                        <th>Expected Yeild in MT</th>
                        <th>Current Market Place</th>
                        <th>Action</th>
                     </tr>
                     <?php
                        if ($query) {
                            $count = 1;
                            while ($row = mysqli_fetch_array($query)) {
                        ?>
                     <tr>
                        <td>
                           <input type='checkbox' name='delete[]' value='<?php echo $row['Farmer_Id'] ?>' >
                        </td>
                        <td>
                           <?php echo $count; ?>
                        </td>
                        <td>
                           <?php echo $row['District']; ?>
                        </td>
                        <td>
                           <?php echo $row['Block']; ?>
                        </td>
                        <td>
                           <?php echo $row['Village']; ?>
                        </td>
                        <td>
                           <?php echo $row['State']; ?>
                        </td>
                        <td>
                           <?php echo $row['FPOSelfHelpGroup']; ?>
                        </td>
                        <td>
                           <?php echo $row['FarmerName']; ?>
                        </td>
                        <td>
                           <?php echo $row['FatherName']; ?>
                        </td>
                        <td>
                           <?php echo $row['PhoneNo']; ?>
                        </td>
                        <td>
                           <?php echo $row['TotalIrrigatedArea']; ?>
                        </td>
                        <td>
                           <?php echo $row['CropName']; ?>
                        </td>
                        <td>
                           <?php echo $row['Grade']; ?>
                        </td>
                        <td>
                           <?php echo $row['Variety']; ?>
                        </td>
                        <td>
                           <?php echo $row['SowingMonth']; ?>
                        </td>
                        <td>
                           <?php echo $row['HarvestingMonth']; ?>
                        </td>
                        <td>
                           <?php echo $row['ExpectedYeildinMT']; ?>
                        </td>
                        <td>
                           <?php echo $row['CurrentMarketPlace']; ?>
                        </td>
                        <td align="center">
                           <a onclick="return confirm('Are you sure want to edit?')"
                              href="edit-farmer-details.php?farmer_id=<?php echo $row['Farmer_Id']; ?>"><i class="bi-pencil"></i></a>
                        </td>
                     </tr>
                     <?php $count = $count + 1;
                        }
                        } ?>
                  </table>
               </form>
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