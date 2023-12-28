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
$querynum = mysqli_query($db, "SELECT IF (FPOExporterName = '', 1, 0) + IF (Address = '', 1, 0) + IF (BlockMandalTaluk = '', 1, 0) + IF (District = '', 1, 0) + IF (State = '', 1, 0) + IF (ContactPerson = '', 1, 0) + IF (Landline = '', 1, 0) + IF (Email = '', 1, 0) + IF (YearofFormatation = '', 1, 0) + IF (RegistrationCertificate = '', 1, 0) + IF (NoofFarmersRegistered = '', 1, 0) + IF (Active = '', 1, 0) + IF (Inactive = '', 1, 0) + IF (EquitySharecapitalPaidup = '', 1, 0) + IF (Year = '', 1, 0) + IF (RsinLakhs = '', 1, 0) + IF (PromotingAgencyName = '', 1, 0) + IF (ContactPersonName = '', 1, 0) + IF (EmailId = '', 1, 0) + IF (BusinessActivity = '', 1, 0) as empty_field_count from fpo_registration where FPO_Registration_ID  = '$_SESSION[FPO_Registration_ID]' AND DeletedStatus='0'");
$rownum = mysqli_fetch_assoc($querynum);
$count = $rownum['empty_field_count'];
$querynum1 = mysqli_query($db, "SELECT IF (MobileNo = '', 1, 0) as empty_field_count1 from fpo_registration_mobileno where FPO_Registration_ID  = '$_SESSION[FPO_Registration_ID]' AND DeletedStatus='0' LIMIT 1");
$rownum1 = mysqli_fetch_assoc($querynum1);
$count1 = $rownum1['empty_field_count1'];
$querynum2 = mysqli_query($db, "SELECT IF (MobileNo = '', 1, 0) as empty_field_count2 from fpo_registration_mobilenumber where FPO_Registration_ID  = '$_SESSION[FPO_Registration_ID]' AND DeletedStatus='0' LIMIT 1");
$rownum2 = mysqli_fetch_assoc($querynum2);
$count2 = $rownum2['empty_field_count2'];
$querynum3 = mysqli_query($db, "SELECT IF (CropsCultivated = '', 1, 0) + IF (Year = '', 1, 0) + IF (Season = '', 1, 0) + IF (ProjectFarmOutputMT = '', 1, 0) + IF (CropName = '', 1, 0) + IF (AreainHa = '', 1, 0) + IF (Variety = '', 1, 0) + IF (IrrigationSource = '', 1, 0) as empty_field_count3 from fpo_registration_crops_cultivated where FPO_Registration_ID  = '$_SESSION[FPO_Registration_ID]' AND DeletedStatus='0' LIMIT 1");
$rownum3 = mysqli_fetch_assoc($querynum3);
$count3 = $rownum3['empty_field_count3'];
$querynum4 = mysqli_query($db, "SELECT IF (GrossRevenue_Year = '', 1, 0) + IF (GrossRevenue_CropName = '', 1, 0) + IF (GrossRevenue_CropVariety = '', 1, 0) + IF (GrossRevenue_QuantityMT = '', 1, 0) + IF (GrossRevenue_RevenueinLakhs = '', 1, 0) + IF (GrossRevenue_MarketPlace = '', 1, 0) + IF (GrossRevenue_AveragePricePerMT = '', 1, 0) + IF (Warehouse_YearofSetup = '', 1, 0) + IF (Warehouse_AreainSqft = '', 1, 0) + IF (Warehouse_Capacityinmt = '', 1, 0) + IF (Warehouse_OwnedorLeased = '', 1, 0) + IF (Warehouse_AccredeationStatus = '', 1, 0) + IF (Procesing_Equipment_Activity = '', 1, 0) + IF (Procesing_Equipment_Operational_Status = '', 1, 0) + IF (Procesing_Equipment_ValueRsinLakhs = '', 1, 0) + IF (Procesing_Equipment_Discription = '', 1, 0) + IF (Farm_Equipment_Activity = '', 1, 0) + IF (Farm_Equipment_OperationalStatus = '', 1, 0) + IF (Farm_Equipment_Discription = '', 1, 0) + IF (Credit_Facilities_Availed_FacilityType = '', 1, 0) + IF (Farm_Equipment_ValueRsinLakhs = '', 1, 0) + IF (Credit_Facilities_Availed_Bank = '', 1, 0) + IF (Credit_Facilities_Availed_AmountReleasedRs = '', 1, 0) + IF (Credit_Facilities_Availed_AmountOutstandingRs = '', 1, 0) + IF (Credit_Facilities_Availed_OperationStatusRegularIrregular = '', 1, 0) + IF (Market_Linkage_Season = '', 1, 0) + IF (Market_Linkage_CropName = '', 1, 0) + IF (Market_Linkage_Variety = '', 1, 0) + IF (Market_Linkage_Grade = '', 1, 0) + IF (Market_Linkage_HarvestMonth = '', 1, 0) + IF (Market_Linkage_QuntatySoldinmt = '', 1, 0) + IF (Market_Linkage_ProductImage = '', 1, 0) + IF (Market_Linkage_ProductDeliveryLocation = '', 1, 0) + IF (Market_Linkage_MarketPlace = '', 1, 0) + IF (Market_Linkage_FoodSafetyCertificationStatus = '', 1, 0) + IF (Market_Linkage_UploadCertificate = '', 1, 0) + IF (Market_Linkage_TermandConditions = '', 1, 0) as empty_field_count4 from fpo_registration_details where FPO_Registration_ID  = '$_SESSION[FPO_Registration_ID]' AND DeletedStatus='0'");
$rownum4 = mysqli_fetch_assoc($querynum4);
$count4 = $rownum4['empty_field_count4'];
$total_count = $count + $count1 + $count2 + $count3 + $count4;
$percentage = round(100 - ($total_count * 100) / 68);
if ($percentage == '100') {
    //header("Location:profile.php");
}
$query = mysqli_query($db, "SELECT * from fpo_registration_details where FPO_Registration_ID  = '$_SESSION[FPO_Registration_ID]' AND DeletedStatus='0'");
$row = mysqli_fetch_assoc($query);
if (isset($_POST["Submit"])) {
    $Farm_Equipment_Activity = implode(",", $_POST["Farm_Equipment_Activity"]);
    $Farm_Equipment_OperationalStatus = implode(",", $_POST["Farm_Equipment_OperationalStatus"]);
    $Farm_Equipment_ValueRsinLakhs = implode(",", $_POST["Farm_Equipment_ValueRsinLakhs"]);
    $Farm_Equipment_Discription = implode(",", $_POST["Farm_Equipment_Discription"]);
    $query1 = "UPDATE `fpo_registration_details` SET `Farm_Equipment_Activity`='$Farm_Equipment_Activity', `Farm_Equipment_OperationalStatus`='$Farm_Equipment_OperationalStatus', `Farm_Equipment_ValueRsinLakhs`='$Farm_Equipment_ValueRsinLakhs', `Farm_Equipment_Discription`='$Farm_Equipment_Discription' WHERE FPO_Registration_ID  = '$_SESSION[FPO_Registration_ID]'";
    $exe_q = mysqli_query($db, $query1);
    if ($exe_q == TRUE) {
        header("Location:fpo-profile-done4.php");
    } else {
        header("Location:fpo-profile-done3.php?msg=fail");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>FPO Registration Details</title>
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
      <link href="assets/css/fpo.css" rel="stylesheet">
   </head>
   <body style="background-image: url('images/fpo-bg2.jpg');background-repeat: repeat-y;background-position: center;">
      <?php include "fpo_header.php";?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <style>
         @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Roboto+Slab:wght@400;700&display=swap');
         html {
         height: 100%;
         min-height: 800px;
         }
         body {
         background: url('https://acpldemo.co.in/fpo/assets/img/login-bg_1.jpg1');
         background-size: cover;
         background-repeat: no-repeat;
         text-align: center;
         font-family: 'Noto Sans', sans-serif;
         -webkit-touch-callout: none;
         -webkit-user-select: none;
         -khtml-user-select: none;
         -moz-user-select: none;
         -ms-user-select: none;
         user-select: none;
         }
         h1 {
         font-weight: 400;
         padding-top: 0;
         margin-top: 0;
         font-family: 'Roboto Slab', serif;
         }
         #svg_form_time {
         height: 15px;
         max-width: 80%;
         margin: 40px auto 20px;
         display: block;
         }
         #svg_form_time circle,
         #svg_form_time rect {
         fill: white;
         }
         .button {
         background: rgb(237, 40, 70);
         border-radius: 5px;
         padding: 15px 25px;
         display: inline-block;
         margin: 10px;
         font-weight: bold;
         color: white;
         cursor: pointer;
         box-shadow: 0px 2px 5px rgb(0, 0, 0, 0.5);
         }
         .disabled {
         display: none;
         }
         section {
         padding: 50px;
         max-width: 900px;
         margin: 30px auto;
         background: white;
         background: rgba(255, 255, 255, 0.9);
         backdrop-filter: blur(10px);
         box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.3);
         border-radius: 5px;
         transition: transform 0.2s ease-in-out;
         }
         input,
         select {
         width: 100%;
         margin: 7px 0px;
         display: inline-block;
         padding: 12px 25px;
         box-sizing: border-box;
         border-radius: 5px;
         border: 1px solid lightgrey;
         font-size: 1em;
         font-family: inherit;
         background: white;
         }
         p {
         text-align: justify;
         margin-top: 0;
         }
      </style>
      
         <main id="main">
            <div class="slider img">
               <img src="assets/img/slide/slider.jpg">
            </div>
            <div id="svg_wrap"></div>
            <h1 style="margin-top: -30px;">Registration Details</h1>
            <section>
               <h3>Farm Equipment</h3>
               <form method="POST" action="">

                <?php
                $query2 = mysqli_query($db, "SELECT * from fpo_registration_details where FPO_Registration_ID  = '$_SESSION[FPO_Registration_ID]' AND Farm_Equipment_Activity != '' AND DeletedStatus='0'");
                $row2 = mysqli_num_rows($query2);
                if($row2 == '1'){
                $rows2 = mysqli_fetch_assoc($query2);
                $rows2_Farm_Equipment_Activity = $rows2['Farm_Equipment_Activity'];
                $array2 = explode(',', $rows2_Farm_Equipment_Activity);
                $array3 = explode(',', $rows2['Farm_Equipment_OperationalStatus']);
                $array4 = explode(',', $rows2['Farm_Equipment_ValueRsinLakhs']);
                $array5 = explode(',', $rows2['Farm_Equipment_Discription']);
                $count = 1;
                foreach($array2 as $value2){
                ?>
                <div class="container" id="farm_euipment">
                  <div class="row" id="<?php if($count > 1){echo 'farm_euipment2';}else{echo 'farm_euipment1';}?>">
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2" style="float: left;">Activity</label>
                        <input value="<?php echo $array2[$count-1];?>" name="Farm_Equipment_Activity[]"
                           type="text" placeholder="Activity" />
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2" style="float: left;">Operational Status</label>
                        <input value="<?php echo $array3[$count-1];?>"
                           name="Farm_Equipment_OperationalStatus[]" type="text" placeholder="Operational Status" />
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2" style="float: left;">Value Rs in Lakhs</label>
                        <input value="<?php echo $array4[$count-1];?>"
                           name="Farm_Equipment_ValueRsinLakhs[]" type="text" placeholder="Value Rs in Lakhs" />
                     </div>
                     <div class="col-md-6 form-group mt-3">
                        <label class="mb-2" style="float: left;">Discription</label>
                        <input value="<?php echo $array5[$count-1];?>"
                           name="Farm_Equipment_Discription[]" type="text" placeholder="Discription" />
                     </div>
                     <?php if($count == 1){?>
                     <div class="col-md-4 form-group mt-5">
                        <input type="button" class="btn btn-success" onclick="add_farm_equipment();" value="+" style="width: 25%;">
                     </div>
                     <?php }?>
                     <?php if($count > 1){?>
                     <div class="col-md-4 form-group mt-5">
                        <input type="button" class="btn btn-danger mt-3" value="-" onclick="delete_equipment('farm_euipment2')" style="width: 25%;">
                     </div>
                     <?php }?>
                  </div>
               </div>
                <?php $count = $count+1;}}else{ ?>
                <div class="container" id="farm_euipment">
                  <div class="row" id="farm_euipment1">
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2" style="float: left;">Activity</label>
                        <input value="" name="Farm_Equipment_Activity[]"
                           type="text" placeholder="Activity" />
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2" style="float: left;">Operational Status</label>
                        <input value=""
                           name="Farm_Equipment_OperationalStatus[]" type="text" placeholder="Operational Status" />
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2" style="float: left;">Value Rs in Lakhs</label>
                        <input value=""
                           name="Farm_Equipment_ValueRsinLakhs[]" type="text" placeholder="Value Rs in Lakhs" />
                     </div>
                     <div class="col-md-6 form-group mt-3">
                        <label class="mb-2" style="float: left;">Discription</label>
                        <input value=""
                           name="Farm_Equipment_Discription[]" type="text" placeholder="Discription" />
                     </div>
                     <div class="col-md-6 form-group mt-5">
                        <input type="button" class="btn btn-success" onclick="add_farm_equipment();" value="+"
                           style="width: 25%;">
                     </div>
                  </div>
               </div>
                <?php } ?>
            </section>
            <a href="fpo-profile-done2.php"><button type="button" class="button" style="border: none;">Previous</button></a>
            <button type="submit" name="Submit" class="button" style="border: none;">Next</button>
            </form>
            <br><br>
         </main>
      
      <?php include "footer.php"; ?>
      <script src="assets/vendor/purecounter/purecounter.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
      <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
      <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
      <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
      <script src="assets/vendor/php-email-form/validate.js"></script>
      <script type="text/javascript" src="js/jquery.js"></script>
      <script src="assets/js/main.js"></script>
      <script src="assets/js/fpo.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
   </body>
</html>