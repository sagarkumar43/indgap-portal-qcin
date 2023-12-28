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
        header("Location: cbprofile.php");
    }
    if ($_SESSION['QCI_ID'] != '') {
        header("Location: qci_profile.php");
    }
}
include "connection.php";
if (isset($_POST["QCI_username"]) && isset($_POST["QCI_password"])) {
    $username = mysqli_real_escape_string($db, trim($_POST["QCI_username"]));
    $password1 = mysqli_real_escape_string($db, md5(trim($_POST["QCI_password"])));
   $query = mysqli_query($db, "SELECT * FROM qci_users WHERE Email = '$username' AND Password = '$password1' AND DeletedStatus='0'");
    $row = mysqli_fetch_array($query);
    if ($row['Email'] != '') {
        session_start();
        $_SESSION["QCI_ID"] = $row['QCI_ID'];
        $_SESSION["qci_Name"] = $row['Name'];
        $_SESSION["qci_Email"] = $row['Email'];
        $_SESSION["qci_Mobile"] = $row['Mobile'];
        if (isset($_SESSION["QCI_ID"])) {
            header("Location: cb_list.php");
        }
    } else {
        header("Location:qci-login.php?msg=fail");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>QCI Login</title>
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
      <div class="d-lg-flex half">
         <div class="bg order-1 order-md-2" style="background-image: url('assets/img/login-bg_1.jpg');"></div>
         <div class="contents order-2 order-md-1">
            <div class="container">
               <div class="row align-items-center justify-content-center">
                  <div class="col-md-7">
                     <div class="mb-4">
                        <a href="index.php" style="text-decoration: none;">
                           <h3>QCI LOGIN</h3>
                        </a>
                        <p class="mb-4">Welcome back QCI E-Interface.</p>
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
                        <div class="form-group first">
                           <label for="username">Username</label>
                           <input type="email" class="form-control" name="QCI_username" required="">
                        </div>
                        <div class="form-group last mb-3">
                           <label for="password">Password</label>
                           <input type="password" class="form-control" name="QCI_password" required="">
                        </div>
                        <input type="submit" value="Log In" class="btn btn-block btn-primary">
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