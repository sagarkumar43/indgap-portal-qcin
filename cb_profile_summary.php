<?php
   session_start();
   error_reporting(0);
   include ('connection.php');
   if ($_SESSION['cb_user_id'] == '') {
      header("Location: index.php");
  }
   if (isset($_POST['Remarkbtn']) AND isset($_POST['FPO_Registration_ID']) AND isset($_POST['Remark'])) {
       $FPO_Registration_ID = mysqli_real_escape_string($db, $_POST["FPO_Registration_ID"]);
       $CB_User = mysqli_real_escape_string($db, $_SESSION["cb_Name"]);
       $CB_User_Email = mysqli_real_escape_string($db, $_SESSION["cb_Email"]);
       $CB_User_Phone = mysqli_real_escape_string($db, $_SESSION["cb_Mobile"]);
       $Remark = mysqli_real_escape_string($db, $_POST['Remark']);
       $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Remark` = '$Remark' WHERE FPO_Registration_ID = '$FPO_Registration_ID' AND CB_User = '$CB_User' AND CB_User_Email = '$CB_User_Email' AND CB_User_Phone = '$CB_User_Phone' AND Deleted_Status = '0'");
       if ($query_insert) {
           echo "<script>alert('Remark Successfully Saved.')</script>";
           echo "<script>window.location.href = 'cb_profile_summary.php'</script>";
       } else {
           echo "<script>alert('Remark Not Saved.')</script>";
           echo "<script>window.location.href = 'cb_profile_summary.php'</script>";
       }
   }
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
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
         rel="stylesheet">
      <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
      <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
      <link href="assets/css/style.css" rel="stylesheet">
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
   </head>
   <body style="background-image: url('images/fpo-bg2.jpg');background-repeat: repeat-y;background-position: center;">
      <?php include "cb_header.php"; ?>
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
               <h2><?php echo $_SESSION["cb_Name"] ; ?> Account</h2>
               <?php if($_SESSION['cb_Name'] == 'DPS') {?>
               <a style="float: right;margin-top: -60px;" href="Add-Client.php" class="btn-get-started animate__animated animate__fadeInUp logout-btn">Add Client</a>
               <?php } ?>
            </div>
            <div class="table-1">
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>S.No.</th>
                        <th>UAN No.</th>
                        <th>Client Name</th>
                        <th>Registered Address</th>
                        <th>State</th>
                        <th>Crop</th>
                        <th>Contact Person</th>
                        <th>Contact No.</th>
                        <th>Email ID</th>
                        <?php if($_SESSION["cb_Name"] == "Director") {} else {?>
                        <th>Scope Granted</th>
                        <th>Remark</th>
                        <?php } ?>
                        <th>Feedback</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $query = mysqli_query($db, "SELECT * from `fpo_user_to_assign_cb` where `DeletedStatus` ='0' AND CB_User LIKE '%$_SESSION[cb_user_id]%' ORDER BY User_Assing_ID DESC");
                        while ($FpoUser1 = mysqli_fetch_array($query)) {
                            $FpoUser2.= $FpoUser1['FPO_User_ID'] . ',';
                        }
                        $FpoUser2 = rtrim($FpoUser2, ',');
                        $FPO_IDs = explode(",", $FpoUser2);
                        $count = 0;
                        foreach ($FPO_IDs as $value) {
                            $query1 = mysqli_query($db, "SELECT * from `fpo_registration` where `DeletedStatus` ='0' AND FPO_Registration_ID ='$value'");
                            $count++;
                            $row1 = mysqli_fetch_assoc($query1);
                            $query_r = mysqli_query($db, "SELECT Remark from `cb_user_edit_fpo_profile` WHERE FPO_Registration_ID = '$row1[FPO_Registration_ID]' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0' LIMIT 1");
                            $row_r = mysqli_fetch_assoc($query_r);
                        ?>
                     <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row1['FPO_UniqueCode']; ?></td>
                        <td><?php echo $row1['FPOExporterName']; ?> -  (<?php if(empty($row1['FPO_UniqueCode'])){ echo "NILL"; } else { echo $row1['FPO_UniqueCode']; } ?>)</td>
                        <td><?php echo $row1['Address']; ?></td>
                        <td><?php echo $row1['State']; ?></td>
                        <td>123123</td>
                        <td><?php echo $row1['ContactPerson']; ?></td>
                        <td><?php echo $row1['Landline']; ?></td>
                        <td><?php echo $row1['Email']; ?></td>
                        <td>123123</td>
                        <?php if($_SESSION["cb_Name"] == "Director") {} else {?>
                        <td class='col-md-10'>
                           <form action="" method="post">
                              <input type="hidden" value="<?php echo $row1['FPO_Registration_ID']; ?>" name="FPO_Registration_ID" required="">
                              <input type="text" name="Remark" value="<?php echo $row_r['Remark']; ?>" class="form-control" placeholder="Enter Remark Here" required="">
                              <input type="submit" name="Remarkbtn" value="Save" class="btn btn-success">
                           </form>
                        </td>
                        <?php } ?>
                        <td></td>
                        <td class='col-md-2'> 
                           <!-- <a href="cb_view_fpo.php?id=<?php echo $row1['FPO_Registration_ID']; ?>" class='btn btn-success' target="_blank">View Director</a> -->
                           <?php # if($_SESSION['cb_Name'] == "Reviewer") {?>
                           <a href="cb_reviewer_fpo.php?id=<?php echo $row1['FPO_Registration_ID']; ?>" class='btn btn-success' target="_blank">View</a>
                           <?php # } ?> <?php if($_SESSION['cb_Name'] == "Qualilty Manager") {?>
                           <!-- <a href="cb_qm_fpo.php?id=<?php echo $row1['FPO_Registration_ID']; ?>" class='btn btn-success' target="_blank">View Quality Manager</a> -->
                           <?php } if($_SESSION['cb_Name'] == "Inspector") {?>
                           <!-- <a href="cb_inspector_fpo.php?id=<?php echo $row1['FPO_Registration_ID']; ?>" class='btn btn-success' target="_blank">View Inspector</a> -->
                           <?php } ?>
                           
                           <?php if($_SESSION['cb_Name'] == 'DPS') {?>
                            <a href="edit_cb_profile_summary.php?id=<?php echo $row1['FPO_Registration_ID']; ?>" class='btn btn-info' target="_blank">Edit</a> 

                           <?php } if($_SESSION['cb_Name'] == "Reviewer") {?>
                           <a href="edit_reviewer_profile_summary.php?id=<?php echo $row1['FPO_Registration_ID']; ?>" class='btn btn-info' target="_blank">Edit</a>
                           <?php } if($_SESSION['cb_Name'] == "Quality Manager") {?>
                           <a href="edit_qm_profile_summary.php?id=<?php echo $row1['FPO_Registration_ID']; ?>" class='btn btn-info' target="_blank">Edit</a>
                           <?php } if($_SESSION['cb_Name'] == "Inspector") {?>
                           <a href="edit_inspect_profile_summary.php?id=<?php echo $row1['FPO_Registration_ID']; ?>" class='btn btn-info' target="_blank">Edit</a>
                           <?php } ?>
                        </td>
                     </tr>
                     <?php
                        }
                        ?>
                  </tbody>
               </table>
            </div>
         </div>
      </main>
      <footer id="footer">
         <!--<div class="footer-top">-->
         <!--   <div class="container">-->
         <!--      <div class="row">-->
         <!--         <div class="col-lg-3 col-md-6 footer-links">-->
         <!--            <h4>Useful Links</h4>-->
         <!--            <ul>-->
         <!--               <li><i class="bx bx-chevron-right"></i> <a href="#">Link-1</a></li>-->
         <!--               <li><i class="bx bx-chevron-right"></i> <a href="#">Link-2</a></li>-->
         <!--               <li><i class="bx bx-chevron-right"></i> <a href="#">Link-3</a></li>-->
         <!--               <li><i class="bx bx-chevron-right"></i> <a href="#">Link-4</a></li>-->
         <!--               <li><i class="bx bx-chevron-right"></i> <a href="#">Link-5</a></li>-->
         <!--            </ul>-->
         <!--         </div>-->
         <!--         <div class="col-lg-3 col-md-6 footer-contact">-->
         <!--            <h4>Contact Us</h4>-->
         <!--            <p>-->
         <!--               XYZ <br>-->
         <!--               New Delhi, 110055<br>-->
         <!--               India <br><br>-->
         <!--               <strong>Phone:</strong> +91-9898989898<br>-->
         <!--               <strong>Email:</strong> info@example.com<br>-->
         <!--            </p>-->
         <!--         </div>-->
         <!--         <div class="col-lg-6 col-md-6 footer-info">-->
         <!--            <h3>About</h3>-->
         <!--            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum-->
         <!--               has been the-->
         <!--               industry's standard dummy text ever since the 1500s, when an unknown printer took a-->
         <!--               galley of type and-->
         <!--               scrambled it to make a type specimen book. It has survived not only five centuries, but-->
         <!--               also the leap into-->
         <!--               electronic typesetting, remaining essentially unchanged.-->
         <!--            </p>-->
         <!--            <div class="social-links mt-3">-->
         <!--               <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>-->
         <!--               <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>-->
         <!--               <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>-->
         <!--               <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>-->
         <!--               <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>-->
         <!--            </div>-->
         <!--         </div>-->
         <!--      </div>-->
         <!--   </div>-->
         <!--</div>-->
         <div class="container">
            <div class="copyright">
               Copyright 2022. All rights reserved.
            </div>
           <div class="credits">
          <!--Designed, developed &amp; maintained by <a href="https://www.aretesoftwares.com/" target="_blank">Arete Software</a> (A division of <a href="https://www.aretecon.com/" target="_blank">Arete Consultants Pvt Ltd</a>)-->
          With design inputs by Krishigap Digital Solutions Pvt Ltd

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