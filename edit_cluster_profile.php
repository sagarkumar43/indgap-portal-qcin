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
   $ClusterID = $_GET['ClusterID'];

$editprofile = "SELECT * FROM `cluster_registration` WHERE Cluster_Registration_ID='$ClusterID'";
$exe = mysqli_query($db,$editprofile);
$read = mysqli_fetch_assoc($exe);
 
   
                 
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Add Village Information</title>
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
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" rel="stylesheet" >

   </head>
   <body>
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
         <div class="container register-box mt-5 mb-5">
         <div class="section-title">
            <h2>Edit Cluster Profile</h2>
         </div>
         <div class="form-1">
         <form action="" method="POST" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Cluster Name </label>
                        <input type="text" class="form-control" name="ClusterName" value="<?php echo $read['ClusterName']; ?>" placeholder="Cluster Name" required="">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Cluster Address</label>
                        <input type="text" class="form-control" name="ClusterAddress" value="<?php echo $read['ClusterAddress']; ?>" placeholder="Cluster Address">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Block/Taluk/Mandal</label>
                        <input type="text" class="form-control" name="block_taluka_mandal" value="<?php echo $read['block_taluka_mandal']; ?>" id="subject" placeholder="Block/Taluk/Mandal" required="">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">State</label>
                        <select class="form-control" id="inputState" name="State" required="">
                           <option value="<?php echo $read['State']; ?>" selected><?php echo $read['State']; ?></option>
                           <option value="Andhra Pradesh">Andhra Pradesh</option>
                           <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                           <option value="Assam">Assam</option>
                           <option value="Bihar">Bihar</option>
                           <option value="Chhattisgarh">Chhattisgarh</option>
                           <option value="Goa">Goa</option>
                           <option value="Gujarat">Gujarat</option>
                           <option value="Haryana">Haryana</option>
                           <option value="Himachal Pradesh">Himachal Pradesh</option>
                           <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                           <option value="Jharkhand">Jharkhand</option>
                           <option value="Karnataka">Karnataka</option>
                           <option value="Kerala">Kerala</option>
                           <option value="Madya Pradesh">Madya Pradesh</option>
                           <option value="Maharashtra">Maharashtra</option>
                           <option value="Manipur">Manipur</option>
                           <option value="Meghalaya">Meghalaya</option>
                           <option value="Mizoram">Mizoram</option>
                           <option value="Nagaland">Nagaland</option>
                           <option value="Orissa">Orissa</option>
                           <option value="Punjab">Punjab</option>
                           <option value="Rajasthan">Rajasthan</option>
                           <option value="Sikkim">Sikkim</option>
                           <option value="Tamil Nadu">Tamil Nadu</option>
                           <option value="Telangana">Telangana</option>
                           <option value="Tripura">Tripura</option>
                           <option value="Uttaranchal">Uttaranchal</option>
                           <option value="Uttar Pradesh">Uttar Pradesh</option>
                           <option value="West Bengal">West Bengal</option>
                           <option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
                           <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                           <option value="Chandigarh">Chandigarh</option>
                           <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                           <option value="Daman and Diu">Daman and Diu</option>
                           <option value="Delhi">Delhi</option>
                           <option value="Lakshadeep">Lakshadeep</option>
                           <option value="Pondicherry">Pondicherry</option>
                        </select>
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">District</label>
                        <select name="District" class="form-control" id="inputDistrict">
                           <option value="<?php echo $read['District'] ?>" selected><?php echo $read['District'] ?></option>
                        </select>
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Contact Person</label>
                        <input type="text" class="form-control" value="<?php echo $read['ContactPerson']; ?>" name="ContactPerson" placeholder="Contact Person" >
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Contact No. </label>
                        <input type="number" class="form-control" value="<?php echo $read['ContactNo']; ?>" name="ContactNo" placeholder="Contact No." readonly="">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Email</label>
                        <input type="email" class="form-control" value="<?php echo $read['Email']; ?>" name="Email" placeholder="Email" readonly="">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Registration Certificates</label>
                        <input type="file" class="form-control" name="RegistrationCertificates" placeholder="Registration Certificates" value="" >
                        <a href="ClusterRegistrationCertificates/<?php echo $read['RegistrationCertificates']; ?>"><img src="images/download.png" class="mt-2" style="width: 40px;"></a>
                     </div>
                     <div class="clearfix"></div>
                  </div>
                  <div class="text-right pt-4">
                     <button type="reset" class="btn btn-danger">Cancel</button>
                     <!-- <button type="submit" class="btn btn-success" name="submit">Submit</button> -->
                     <input type="submit" name="submit" value="Submit" class="btn btn-success">
                  </div>
               </form>
               <?php
                    if(isset($_POST['submit']))
                    {
                        $ClusterName = $_POST['ClusterName'];
                        $ClusterAddress = $_POST['ClusterAddress'];
                        $block_taluka_mandal = $_POST['block_taluka_mandal'];
                        $State = $_POST['State'];
                        $District = $_POST['District'];
                        $ContactPerson = $_POST['ContactPerson'];
                        $RegistrationCertificates = $_FILES['RegistrationCertificates']['name'];
                        $RegistrationCertificates_tmp = $_FILES['RegistrationCertificates']['tmp_name'];
                        if(strtolower(end(explode(".",$RegistrationCertificates))) =="pdf") {
                        move_uploaded_file($RegistrationCertificates_tmp,"ClusterRegistrationCertificates/".$RegistrationCertificates);
                        }
                        if($RegistrationCertificates == "")
                        {
                          $event = $read['RegistrationCertificates'];
                        }
                        else{
                          $event = $RegistrationCertificates;
                        }

                        $update = "UPDATE `cluster_registration` SET ClusterName='$ClusterName',ClusterAddress='$ClusterAddress',block_taluka_mandal='$block_taluka_mandal',State='$State',District='$District',ContactPerson='$ContactPerson',RegistrationCertificates='$event' WHERE Cluster_Registration_ID='$ClusterID'";
                        $execute = mysqli_query($db,$update);
                        if($execute == TRUE)
                        {
                            echo "<script>alert('Your Profile Successfully Update')</script>";
                            echo "<script> window.location.href='cluster-profile.php'</script>";
                        }
                    }
               ?>
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
      <script src="assets/js/main.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
      <script src="assets/js/buyer.js"></script>
      <script>
         $(document).ready(function () {
            $('#FoodSafety1').hide();
      //listen for the dropdown change
      $('#CertificationStatus').change(function () {
        if ($(this).val() == 'Yes') {
          //remove the element from dom
         

          $('#FoodSafety').show();
          $('#FoodSafety1').hide();
        }
        else {
         $('#FoodSafety').hide();
          $('#FoodSafety1').show();
        }
      });

    })
      </script>
   </body>
</html>