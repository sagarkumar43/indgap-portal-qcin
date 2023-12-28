<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>FPO BUYER CLUSTER E-INTERFACE</title>
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
         .buyer-login .btn {
         height: auto !important;
         padding-left: 30px;
         padding-right: 30px;
         color: #fff !important;
         text-decoration: none !important;
         }
      </style>
   </head>
   <body>
    
      <div class="modal fade" id="buyer-popup" role="dialog">
         <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title">Buyer Login</h6>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body text-center">
                  <a href="buyer-login.php" class="btn btn-outline-info">Registered Buyer</a> - OR -
                  <a href="buyer-registration.php" class="btn btn-outline-success">New Buyer</a>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="cluster-popup" role="dialog">
         <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title">Cluster Login</h6>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body text-center">
                  <a href="cluster-login.php" class="btn btn-outline-info">Registered Cluster</a> - OR -
                  <a href="cluster-register.php" class="btn btn-outline-success">New Cluster</a>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <div class="d-lg-flex half buyer-login">
         <div class="bg order-1 order-md-2" style="background-image: url('assets/img/login-bg_1.jpg');"></div>
         <div class="contents order-2 order-md-1">
            <div class="container">
               <div class="row align-items-center justify-content-center">
                  <div class="col-md-8">
                     <div class="mb-4">
                        <h3>FPO BUYER CLUSTER E-INTERFACE</h3>
                        <p class="mb-4">Welcome back FPO Buyer Cluster E-Interface.</p>
                     </div>
                     <h3>Are You?</h3>
                     <a href="" class="btn btn-primary" data-toggle="modal" data-target="#buyer-popup">Buyer</a>
                     <a href="fpo-login.php" class="btn btn-info">FPO/Supplier</a>
                     <a href="" class="btn btn-danger" data-toggle="modal" data-target="#cluster-popup">Cluster</a>
                     
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