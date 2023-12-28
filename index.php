<?php

if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {

       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

       header("Location: $redirect_url");

       exit();

}



session_start();

error_reporting(0);

if ($_SESSION['Cluster_Registration_ID'] != '' OR $_SESSION['Buyer_Registration_ID'] != '' OR $_SESSION['FPO_Registration_ID'] != '' OR $_SESSION['cb_user_id'] != '') {

    if ($_SESSION['Cluster_Registration_ID'] != '') {

        header("Location: cluster-profile.php");

    }

    if ($_SESSION['Buyer_Registration_ID'] != '') {

        header("Location: buyer-profile.php");

    }

    if ($_SESSION['FPO_Registration_ID'] != '') {

        header("Location: profile2.php");

    }

    if ($_SESSION['cb_user_id'] != '') {

        header("Location: cb_boxstatus.php");

    }

    if ($_SESSION['QCI_ID'] != '') {

      header("Location: qci_profile.php");

    }

}

include "connection.php";

if (isset($_POST["Cb_username"]) && isset($_POST["Cb_password"])) {

    $username = mysqli_real_escape_string($db, trim($_POST["Cb_username"]));

    $password1 = mysqli_real_escape_string($db, md5(trim($_POST["Cb_password"])));

   $query = mysqli_query($db, "SELECT * FROM cb_users WHERE Email = '$username' AND Password = '$password1' AND DeletedStatus='0'");

    $row = mysqli_fetch_array($query);

    if ($row['Email'] != '') {

        session_start();

        $_SESSION["cb_user_id"] = $row['cb_user_id'];

        $_SESSION["cb_Name"] = $row['Name'];

        $_SESSION["cb_Email"] = $row['Email'];

        $_SESSION["cb_Mobile"] = $row['Mobile'];

        if (isset($_SESSION["cb_user_id"])) {

            header("Location: cb_profile_summary.php");

        }

    } else {

        header("Location:index.php?msg=fail");

    }

}

?>

<!DOCTYPE html>

<html lang="en">

   <head>

      <meta charset="utf-8">

      <meta content="width=device-width, initial-scale=1.0" name="viewport">

      <title>CB Login</title>

      <meta content="" name="description">

      <meta content="" name="keywords">

      <link href="assets/img/favicon.png" rel="icon">

      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

      <link rel="stylesheet" href="assets/css/login-css/font/icomoon/style.css">

      <link rel="stylesheet" href="assets/css/login-css/bootstrap.min.css">

      <link rel="stylesheet" href="assets/css/login-css/style.css">

      <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">

      <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

      <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

      <link href="assets/css/style.css" rel="stylesheet">

      <style>

         .btn-primary {

         color: #fff;

         background-color: #3ba901;

         border-color: #3ba901;

         }

      </style>

   </head>

   <body>

      <?php #include("main-header.php") ?>

      <div class="d-lg-flex half m-full">

      

      <div class="qci-logo">

         <img src="https://premiummarket.krishigap.com/assets/img/All_LOGO_WITH_R-01-removebg-preview.png" alt="">

      </div>

      <div class="padd-logo">

         <img src="https://premiummarket.krishigap.com/assets/img/padd logoo.png" alt="">

      </div>

      <!-- <div class="indgap-logo">

         INDG.A.P.

      </div> -->

      <!-- <div class="krishi-logo">

         <img src="https://premiummarket.krishigap.com/assets/img/krishi-gap-logo.png" alt="">

      </div> -->



      <div class="head-bar">

         QCI-IndG.A.P. Portal

      </div>



      <div id="myVideo">

         <video autoplay muted loop>

         <source src="https://premiummarket.krishigap.com/assets/video/login-page-video.mp4" type="video/mp4">

            Your browser does not support HTML5 video.

         </video>

      </div>



         <div class="contents order-2 order-md-1">

            <div class="container">

               <div class="row align-items-center justify-content-center">

                  <div class="col-md-4">

                     <div class="mb-4">

                        <!-- <a href="index.php" style="text-decoration: none;">

                           <h3>CB LOGIN</h3>

                        </a>

                        <p class="mb-4">Welcome back CB E-Interface.</p> -->



                        <div class="login-logo">

                           <img src="https://premiummarket.krishigap.com/assets/img/IndGAP Logo-03.png" alt="">

                        </div>



                     </div>

                     <?php $msg = $_GET['msg']; if($msg == 'fail'){?>

                     <center>

                        <div class="row">

                           <div class="col-lg-12">

                              <div class="bs-component">

                                 <div class="alert alert-dismissible alert-danger">

                                    <button class="close" type="button" data-dismiss="alert" style="float: right;">×</button>Username or Password are wrong.

                                 </div>

                              </div>

                           </div>

                        </div>

                     </center>

                     <?php } ?>

                     <form action="" method="POST" autocomplete="off">

                        <div class="login-box">

                           <div class="form-group first">

                              <label for="username">Username</label>

                              <input type="email" class="form-control" name="Cb_username" required="">

                           </div>

                           <div class="form-group last mb-3">

                              <label for="password">Password</label>

                              <input type="password" class="form-control" name="Cb_password" required="">

                           </div>

                           <input type="submit" value="Log In" class="btn btn-block btn-primary">

                        </div>

                     </form>



                     <div class="row a-link mt-2">

                        <div class="col-md-6">

                           <a href="#">Create Account</a>

                        </div>

                        <div class="col-md-6 text-right">

                           <a href="#">Forgot Password</a>

                        </div>

                     </div>



                  </div>



                 <div class="copy-right">

                  <!--© All Right Reserved. Design & Developed by <a href="https://www.aretesoftwares.com/" target="_blank">www.aretesoftwares.com</a> part of ACPL-->

                  With design inputs by Krishigap Digital Solutions Pvt Ltd

                  </div> 



               </div>

            </div>

         </div>

      </div>

      <!-- < ?php include "footer.php";?> -->

      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

      <script src="assets/css/login-js/jquery-3.3.1.min.js"></script>

      <script src="assets/css/login-js/popper.min.js"></script>

      <script src="assets/css/login-js/bootstrap.min.js"></script>

      <script src="assets/css/login-js/main.js"></script>

   </body>

</html>