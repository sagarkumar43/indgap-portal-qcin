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
 $Production_ID = $_GET['id'];
  $query_edit = mysqli_query($db, "SELECT * from other_purchase where Production_ID = '$Production_ID' AND  FPO_Registration_ID = '$_SESSION[FPO_Registration_ID]' AND DeletedStatus='0'");
  $row_edit = mysqli_fetch_assoc($query_edit);
  if (isset($_POST["CollectionCenter"])) {
    $CollectionCenter = mysqli_real_escape_string($db, $_POST["CollectionCenter"]);
    $SeasonName = mysqli_real_escape_string($db, $_POST["SeasonName"]);
    $CommodityName = mysqli_real_escape_string($db, $_POST["CommodityName"]);
    $CommodityCategory = mysqli_real_escape_string($db, $_POST["CommodityCategory"]);
    $VarietyName = mysqli_real_escape_string($db, $_POST["VarietyName"]);
    $Grade = mysqli_real_escape_string($db, $_POST["Grade"]);
    $Size = mysqli_real_escape_string($db, $_POST["Size"]);
    $TotalQtyInMT = mysqli_real_escape_string($db, $_POST["TotalQtyInMT"]);
    $QtySoldInMT = mysqli_real_escape_string($db, $_POST["QtySoldInMT"]);
    $QtyBalanceInMT = mysqli_real_escape_string($db, $_POST["QtyBalanceInMT"]);
    $CropSpecification = mysqli_real_escape_string($db, $_POST["CropSpecification"]);
    $FoodSaftyCertification = mysqli_real_escape_string($db, $_POST["FoodSaftyCertification"]);
    $date = date("Y-m-d H:i:s"); 

    $query = mysqli_query($db, "UPDATE `other_purchase` SET  `CollectionCenter`='$CollectionCenter',`SeasonName`='$SeasonName',`CommodityName`='$CommodityName',`CommodityCategory`='$CommodityCategory',`VarietyName`='$VarietyName',`Grade`='$Grade',`Size`='$Size',`TotalQtyInMT`='$TotalQtyInMT',`QtySoldInMT`='$QtySoldInMT',`QtyBalanceInMT`='$QtyBalanceInMT',`CropSpecification`='$CropSpecification',`FoodSaftyCertification`='$FoodSaftyCertification',CreatedDate='$date' WHERE `Production_ID`='$Production_ID' AND  FPO_Registration_ID = '$_SESSION[FPO_Registration_ID]'");

        for ($i = 0;$i < count($_FILES["CropImage"]["name"]);$i++) {
            $CropImage = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["CropImage"]["name"][$i];
            if ($_FILES["CropImage"]["name"][$i] != '') {
                if(strtolower(end(explode(".",$CropImage))) =="jpg" OR strtolower(end(explode(".",$CropImage))) =="jpeg" OR strtolower(end(explode(".",$CropImage))) =="png") {
                move_uploaded_file($_FILES["CropImage"]["tmp_name"][$i], "CropImage/" . $CropImage);
                $query1 = mysqli_query($db, "INSERT INTO `production_images` (`production_image_id`, `Production_ID`, `image_name`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$Production_ID', '$CropImage', '0', current_timestamp());");
            }}
        }

        for ($j = 0;$j < count($_FILES["CertificationUpload"]["name"]);$j++) {
            $CertificationUpload = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["CertificationUpload"]["name"][$j];
            if ($_FILES["CertificationUpload"]["name"][$j] != '') {
                if(strtolower(end(explode(".",$CertificationUpload))) =="pdf") {
                move_uploaded_file($_FILES["CertificationUpload"]["tmp_name"][$j], "CertificationUpload/" . $CertificationUpload);
                $query2 = mysqli_query($db, "INSERT INTO `production_certifications` (`production_certification_id`, `Production_ID`, `certification_name`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$Production_ID', '$CertificationUpload', '0', current_timestamp());");
            }}
        }
    if ($query) {
      header("Location:own-production-edit.php?id=$Production_ID&msg=success");
    } else {
      header("Location:own-production-edit.php?id=$Production_ID&msg=fail");
    }
  } 
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Production (In metric ton)</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />





</head>

<body style="background-image: url('images/fpo-bg2.jpg');background-repeat: repeat-y;background-position: center;">
  <?php include "fpo_header.php";?>
  <main id="main">


    <!-- ======= Hero Section ======= -->

    <section id="hero">
      <div class="hero-container">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
          <div class="carousel-inner" role="listbox">
            <!-- Slide 1 -->
            <div class="carousel-item active" style="background: url(assets/img/slide/slider5.jpg)">
              <div class="carousel-container">
                <div class="carousel-content">
                </div>
              </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item" style="background:url(assets/img/slide/slider2.jpg)">
              <div class="carousel-container">
                <div class="carousel-content">
                </div>
              </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item" style="background:url(assets/img/slide/slide-1.jpg)">
              <div class="carousel-container">
                <div class="carousel-content">
                </div>
              </div>
            </div>

            <!-- Slide 3 -->
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
    <!-- End Hero -->

    <div class="container mt-5 mb-5">

      

      <div class="section-title">
        <h2>Edit Production (In metric ton)</h2>
      </div>

    <div class="form-1">
<?php
        $msg = $_GET['msg'];
        if($msg == 'fail'){?>
          <center><div class="row">
           <div class="col-lg-12">
            <div class="bs-component">
             <div class="alert alert-dismissible alert-danger" style="width: 50%;">
              <button class="close" type="button" data-dismiss="alert" style="float: right;">×</button>Production not edited.
            </div>
          </div>
        </div>
      </div></center>
    <?php } ?>
    <?php
    $msg = $_GET['msg'];
    if($msg == 'success'){?>
      <center><div class="row">
       <div class="col-lg-12">
        <div class="bs-component">
         <div class="alert alert-dismissible alert-success" style="width: 50%;">
          <button class="close" type="button" data-dismiss="alert" style="float: right;">×</button>Production successfully edited.
        </div>
      </div>
    </div>
  </div></center>
<?php } ?>

      <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">

          <div class="col-md-6 form-group mt-3">
            <label class="mb-2">Collection Center</label>
            <select class="form-control" name="CollectionCenter" required="">
              <option value="">Select Collection Center</option>
<?php
$query = mysqli_query($db, "SELECT * from collection_center where FPO_Registration_ID  = '$_SESSION[FPO_Registration_ID]' AND DeletedStatus='0' ORDER BY CollectionCenter");
while($row = mysqli_fetch_array($query)){
?>              
              <option <?php if($row_edit['CollectionCenter'] == $row['CollectionCenter']){echo "selected";} ?> value="<?php echo $row['CollectionCenter']; ?>"><?php echo $row['CollectionCenter']; ?></option>
<?php
}
              ?>
            </select>
          </div>
          <div class="col-md-6 form-group mt-3">
            <label class="mb-2">Season Name</label>
            <input type="text" class="form-control" name="SeasonName" value="<?php echo $row_edit['SeasonName']; ?>" placeholder="Season Name">
          </div>

          <div class="col-md-4 form-group mt-3">
              <label class="mb-2">Commodity Name</label>
              <input type="text" class="form-control" name="CommodityName" value="<?php echo $row_edit['CommodityName']; ?>" placeholder="Commodity Name">
            </div>

            <div class="col-md-4 form-group mt-3">
              <label class="mb-2">Commodity Category</label>
              <input type="text" class="form-control" name="CommodityCategory" value="<?php echo $row_edit['CommodityCategory']; ?>" placeholder="Commodity Category">
            </div>



          <div class="col-md-4 form-group mt-3">
            <label class="mb-2">Variety Name</label>
            <input type="text" class="form-control" name="VarietyName" value="<?php echo $row_edit['VarietyName']; ?>" placeholder="Variety Name">
          </div>

          <div class="col-md-4 form-group mt-3">
            <label class="mb-2">Grade</label>
            <input type="text" class="form-control" name="Grade" value="<?php echo $row_edit['Grade']; ?>" placeholder="Grade">
          </div>

          <!-- <div class="col-md-4 form-group mt-3">
            <label class="mb-2">Size</label>
            <input type="text" class="form-control" name="Size" value="<?php echo $row_edit['Size']; ?>" placeholder="Size">
          </div> -->


          <div class="col-md-4 form-group mt-3">
            <label class="mb-2">Total Qty (In MT)</label>
            <input type="number" class="form-control" name="TotalQtyInMT" value="<?php echo $row_edit['TotalQtyInMT']; ?>" placeholder="Total Qty (In MT)">
          </div>

          <div class="col-md-4 form-group mt-3">
            <label class="mb-2">Qty Sold (In MT)</label>
            <input type="number" class="form-control" name="QtySoldInMT" value="<?php echo $row_edit['QtySoldInMT']; ?>" placeholder="Qty Sold (In MT)">
          </div>

          <div class="col-md-4 form-group mt-3">
            <label class="mb-2">Qty Balance (In MT)</label>
            <input type="number" class="form-control" name="QtyBalanceInMT" value="<?php echo $row_edit['QtyBalanceInMT']; ?>" placeholder="Qty Balance (In MT)">
          </div>

          <div class="col-md-4 form-group mt-3">
            <label class="mb-2">Crop Image</label>
            <input type="file" class="form-control" name="CropImage[]" multiple="">
          </div>

          <div class="col-md-4 form-group mt-3">
            <label class="mb-2">Crop Specification</label>
            <input type="text" class="form-control" name="CropSpecification" value="<?php echo $row_edit['CropSpecification']; ?>" placeholder="Crop Specification">
          </div>

          <div class="col-md-4 form-group mt-3">
            <label class="mb-2">Food Safty Certification</label>
            <select class="form-control" name="FoodSaftyCertification">
              <option value="">Select Food Safty Certification</option>
              <option <?php if($row_edit['FoodSaftyCertification'] == 'N/A'){echo "selected";} ?> value="N/A">N/A</option>
              <option <?php if($row_edit['FoodSaftyCertification'] == 'IndGAP'){echo "selected";} ?> value="IndGAP">IndGAP</option>
              <option <?php if($row_edit['FoodSaftyCertification'] == 'Global GAP'){echo "selected";} ?> value="Global GAP">Global GAP</option>
              <option <?php if($row_edit['FoodSaftyCertification'] == 'NPOP Organic'){echo "selected";} ?> value="NPOP Organic">NPOP Organic</option>
              <option <?php if($row_edit['FoodSaftyCertification'] == 'NOP Organic'){echo "selected";} ?> value="NOP Organic">NOP Organic</option>
              <option <?php if($row_edit['FoodSaftyCertification'] == 'Fair Trade International'){echo "selected";} ?> value="Fair Trade International">Fair Trade International</option>
              <option <?php if($row_edit['FoodSaftyCertification'] == 'Rain Forest Alliance'){echo "selected";} ?> value="Rain Forest Alliance">Rain Forest Alliance</option>
            </select>
          </div>

          <div class="col-md-4 form-group mt-3">
            <label class="mb-2">Certification Upload</label>
            <input type="file" class="form-control" name="CertificationUpload[]" multiple="">
          </div>
        </div>

        <div class="text-right pt-4">
          <button type="submit" class="btn btn-success">Update</button>
        </div>
      </form>


<script type="text/javascript">
  $(document).ready(function() {
      $('#example-includeSelectAllOption').multiselect({
          includeSelectAllOption: true
      });
  });
</script>






    </div>
    </div>



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Link-1</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Link-2</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Link-3</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Link-4</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Link-5</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              XYZ <br>
              New Delhi, 110055<br>
              India <br><br>
              <strong>Phone:</strong> +91-9898989898<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

          </div>

          <div class="col-lg-6 col-md-6 footer-info">
            <h3>About</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        Copyright 2022. All rights reserved.
      </div>
      <div class="credits">
        Design & Developed by <a href="https://aretesoftwares.com/">Aretesoftwares.com</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



  <!--- multipicker js ---->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <!--- multipicker js end //-->



</body>

</html>