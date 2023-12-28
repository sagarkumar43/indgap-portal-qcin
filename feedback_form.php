<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
   session_start();
   error_reporting(0);
   if ($_SESSION['Cluster_Registration_ID'] == '') {
       header("Location: cluster-login.php");
   }
     include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Feedback Form</title>
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
      <link rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
   </head>
   <body  style="background-image: url(images/cluster-bg1.jpg);background-repeat: repeat-y;background-position: center;">
      <?php include "cluster-menu.php";  ?>
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
               <h2>Feedback Form</h2>
            </div>
            <div class="form-1">
               <?php
                  $msg = $_GET['msg'];
                  if($msg == 'fail'){?>
               <center>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="bs-component">
                           <div class="alert alert-dismissible alert-danger" style="width: 50%;">
                              <button class="close" type="button" data-dismiss="alert" style="float: right;">×</button>Feedback Details not saved.
                           </div>
                        </div>
                     </div>
                  </div>
               </center>
               <?php } ?>
               <?php
                  $msg = $_GET['msg'];
                  if($msg == 'success'){?>
               <center>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="bs-component">
                           <div class="alert alert-dismissible alert-success" style="width: 50%;">
                              <button class="close" type="button" data-dismiss="alert" style="float: right;">×</button>Feedback Details saved.
                           </div>
                        </div>
                     </div>
                  </div>
               </center>
               <?php } ?>
               <form action="" method="POST" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Your Name</label>
                        <input type="text" class="form-control" name="YourName" placeholder="Your Name">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Email Id</label>
                        <input type="text" class="form-control" name="Email" placeholder="Email ID">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Phone</label>
                        <input type="text" class="form-control" name="Phone" placeholder="Phone">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Season Name</label>
                        <input type="text" class="form-control" name="SeasonName" placeholder="Season Name">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Variety Name</label>
                        <input type="text" class="form-control" name="VarietyName" placeholder="Variety Name">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Food Safty Certification</label>
                        <select class="form-control" name="FoodSaftyCertification">
                           <option value="">Select Food Safty Certification</option>
                           <option value="IndGAP">IndGAP</option>
                           <option value="Global GAP">Global GAP</option>
                           <option value="NPOP Organic">NPOP Organic</option>
                           <option value="NOP Organic">NOP Organic</option>
                           <option value="Fair Trade International">Fair Trade International</option>
                           <option value="Rain Forest Alliance">Rain Forest Alliance</option>
                        </select>
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">How much land do you farm?</label>
                        <textarea name="" class="form-control" id="" cols="50" rows="5"></textarea>
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Problems Faced</label>
                        <textarea name="" class="form-control" id="" cols="50" rows="5"></textarea>
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Do you have any other comments, questions?</label>
                        <textarea name="" class="form-control" id="" cols="50" rows="5"></textarea>
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">The land you farm?</label>
                        <div class="form-check">
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Own">
                              <label class="form-check-label" for="inlineCheckbox1">Own</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Lease">
                              <label class="form-check-label" for="inlineCheckbox2">Lease</label>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Do you live on the land you farm?</label>
                        <div class="form-check">
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="farm_land" value="Yes">
                              <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="farm_land" value="No">
                              <label class="form-check-label" for="inlineCheckbox2">No</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="text-right pt-4">
                     <button type="submit" class="btn btn-success">Submit</button>
                  </div>
               </form>
               <script type="text/javascript">
                  $(document).ready(function () {
                    $('#example-includeSelectAllOption').multiselect({
                      includeSelectAllOption: true
                    });
                  });
               </script>
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