<?php
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   session_start();
   error_reporting(0);
   if ($_SESSION['cb_user_id'] == '') {
      header("Location: index.php");
  }
   include "connection.php";
   if (isset($_POST['Submit'])) {
       $FPO_UniqueCode = mysqli_real_escape_string($db, filter_var(trim($_POST["FPO_UniqueCode"]), FILTER_SANITIZE_EMAIL));
       $FPOExporterName = mysqli_real_escape_string($db, filter_var(trim($_POST["FPOExporterName"]), FILTER_SANITIZE_EMAIL));
       $Address = mysqli_real_escape_string($db, filter_var(trim($_POST["Address"]), FILTER_SANITIZE_EMAIL));
       $State = mysqli_real_escape_string($db, filter_var(trim($_POST["State"]), FILTER_SANITIZE_EMAIL));
       $ContactPerson = mysqli_real_escape_string($db, filter_var(trim($_POST["ContactPerson"]), FILTER_SANITIZE_EMAIL));
       $Landline = mysqli_real_escape_string($db, filter_var(trim($_POST["Landline"]), FILTER_SANITIZE_EMAIL));
       $Email = mysqli_real_escape_string($db, filter_var(trim($_POST["Email"]), FILTER_SANITIZE_EMAIL));

       $query_insert = mysqli_query($db, "INSERT INTO `fpo_registration` (`FPO_Registration_ID`, `FPO_UniqueCode`, `FPOExporterName`, `Address`, `BlockMandalTaluk`, `District`, `State`, `ContactPerson`, `Landline`, `Email`, `YearofFormatation`, `RegistrationCertificate`, `NoofFarmersRegistered`, `Active`, `Inactive`, `EquitySharecapitalPaidup`, `Year`, `RsinLakhs`, `PromotingAgencyName`, `ContactPersonName`, `EmailId`, `BusinessActivity`, `Password`, `DeletedStatus`, `Account_Status`, `document_standard`, `document_name`, `document_desc`, `Profile_document`, `Profile_Img`, `CreatedDate`) VALUES (NULL, '$FPO_UniqueCode', '$FPOExporterName', '$Address', '', '', '$State', '$ContactPerson', '$Landline', '$Email', '', '', '0', '', '', '', '', '', '', '', '', '', '', '0', 'Active', '', '', '', '', '', current_timestamp());");
       $FPO_Registration_ID = $db->insert_id;
       
       if ($query_insert) {
        $query = mysqli_query($db, "SELECT FPO_User_ID from `fpo_user_to_assign_cb` where `DeletedStatus` ='0' AND User_Assing_ID = '$_SESSION[cb_user_id]'");
       $row = mysqli_fetch_assoc($query);
       $FPO_User_ID = $row['FPO_User_ID'].','.$FPO_Registration_ID;
       $query = mysqli_query($db, "UPDATE fpo_user_to_assign_cb SET FPO_User_ID = '$FPO_User_ID' where `DeletedStatus` ='0' AND User_Assing_ID = '$_SESSION[cb_user_id]'");
           echo "<script>alert('Client Record Successfully Saved.')</script>";
       } else {
           echo "<script>alert('Client Record Not Saved.')</script>";
       }
   }
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Add Client</title>
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
   <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
</head>
<body style="background-image: url('images/fpo-bg2.jpg');background-repeat: repeat-y;background-position: center;">
   <?php include "cb_header.php"; ?>
   <main id="main">
      <div class="slider img">
         <img src="assets/img/slide/slider.jpg">
      </div>
      <div class="container mt-5 mb-5">
         <div class="section-title">
            <h2>
               Add Client
            </h2>
            <a style="float: right;margin-top: -60px;" href="cb_profile_summary.php" class="btn-get-started animate__animated animate__fadeInUp logout-btn">View Client List</a>
         </div>
         <div class="form-1">
            <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
               <div class="row">

                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">UAN No.</label>
                     <input type="text" name="FPO_UniqueCode" class="form-control" required="">
                  </div>
                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">Client Name</label>
                     <input type="text" name="FPOExporterName" class="form-control" required="">
                  </div>
                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">Registered Address</label>
                     <input type="text" name="Address" class="form-control" required="">
                  </div>
                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">State</label>
                     <input type="text" name="State" class="form-control" required="">
                  </div>
                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">Contact Person</label>
                     <input type="text" name="ContactPerson" class="form-control" required="">
                  </div>
                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">Contact No.</label>
                     <input type="number" onkeypress="if(this.value.length==10) return false;" name="Landline" class="form-control" required="">
                  </div>
                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">Email ID</label>
                     <input type="email" name="Email" class="form-control" required="">
                  </div>
                  <div class="col-md-3 form-group mt-3">
                     <input style="margin-top: 31px;" type="submit" value="Submit" name="Submit" class="btn btn-success" />
                  </div>
               </div>
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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
   
</body>
</html>