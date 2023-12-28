<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}

session_start();
error_reporting(0);
if ($_SESSION['Cluster_Registration_ID'] != '' OR $_SESSION['Buyer_Registration_ID'] != '' OR $_SESSION['FPO_Registration_ID'] != '') {
if ($_SESSION['Cluster_Registration_ID'] != '') {
    header("Location: cluster-profile.php");
}
if ($_SESSION['Buyer_Registration_ID'] != '') {
    header("Location: buyer-profile.php");
}
if ($_SESSION['FPO_Registration_ID'] != '') {
    header("Location: profile2.php");
}

}
include "connection.php";
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = mysqli_real_escape_string($db, trim($_POST["username"]));
    $password1 = mysqli_real_escape_string($db, md5(trim($_POST["password"])));
    $query = mysqli_query($db, "SELECT * FROM fpo_registration WHERE Email = '$username' AND Password = '$password1' AND Account_Status='Active'");
    $row = mysqli_fetch_array($query);
    if ($row['Email'] != '') {
        $_SESSION["FPO_Registration_ID"] = $row['FPO_Registration_ID'];
        $_SESSION["Email"] = $row['Email'];
        if (isset($_SESSION["FPO_Registration_ID"])) {
            header("Location:profile2.php");
        }
    } else {
        header("Location:fpo-login.php?msg=fail");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>FPO Login</title>
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
      <?php include("main-header.php") ?>
      <div class="d-lg-flex half">
         <div class="bg order-1 order-md-2" style="background-image: url('assets/img/login-bg_1.jpg');"></div>
         <div class="contents order-2 order-md-1">
            <div class="container">
               <div class="row align-items-center justify-content-center">
                  <div class="col-md-7">
                     <div class="mb-4">
                        <a href="index.php" style="text-decoration: none;">
                           <h3>FPO LOGIN</h3>
                        </a>
                        <p class="mb-4">Welcome back FPO E-Interface.</p>
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
                     <form action="" method="POST">
                        <div class="form-group first">
                           <label for="username">Username</label>
                           <input type="email" class="form-control" name="username" required="">
                        </div>
                        <div class="form-group last mb-3">
                           <label for="password">Password</label>
                           <input type="password" class="form-control" name="password" required="">
                        </div>
                        <div class="d-flex mb-5 align-items-center">
                           <span class=""><a href="fpo-register.php" class="forgot-pass" style="text-decoration: none;">New FPO Registration</a></span> 
                           <span class="ml-auto"><a href="#" class="forgot-pass" style="text-decoration: none;">Forgot Password</a></span> 
                        </div>
                        <input type="submit" value="Sign In" class="btn btn-block btn-primary">
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php include "footer.php";?>
      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
      <script src="assets/css/login-js/jquery-3.3.1.min.js"></script>
      <script src="assets/css/login-js/popper.min.js"></script>
      <script src="assets/css/login-js/bootstrap.min.js"></script>
      <script src="assets/css/login-js/main.js"></script>
   </body>
</html>