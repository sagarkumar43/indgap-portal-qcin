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
$query = mysqli_query($db, "SELECT * FROM `fpo_registration_details` WHERE FPO_Registration_ID  = '$_SESSION[FPO_Registration_ID]' AND DeletedStatus='0'");
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>View Registration Details</title>
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
      <link href="assets/css/fpo.css" rel="stylesheet">
   </head>
   <body style="background-image: url('images/fpo-bg2.jpg');background-repeat: repeat-y;background-position: center;">
      <?php include "fpo_header.php";?>
      <main id="main">
         <div class="slider img">
            <img src="assets/img/slide/slider.jpg">
         </div>
         <div class="container mt-5 mb-5">
            <div class="section-title">
               <h2>View Registration Details</h2>
            </div>
            <div class="text-right">
            </div>
            <div class="table-1" style=" overflow: auto;">
               <table class="table table-bordered">
                  <tr style="background-color: darkgreen;color: white;">
                     <th>S.No. </th>
                     <th>Commodity</th>
                     <th>Year </th>
                     <th>Variety </th>
                     <th>Quantity</th>
                     <th>Revenue (in Lakhs)</th>
                     <th>Market Place</th>
                     <th>Average Price Per MT</th>
                     <th>Year of Setup</th>
                     <th>Area(in Sqft)</th>
                     <th>Capacity(in mt)</th>
                     <th>Owned or Leased</th>
                     <th>Accreditation Status</th>
                     <th>Procesing Equipment Activity</th>
                     <th>Procesing Equipment Operational Status</th>
                     <th>Procesing Equipment Value Rs in Lakhs</th>
                     <th>Procesing Equipment Discription</th>
                     <th>Farm Equipment Activity</th>
                     <th>Farm Equipment Operational Status</th>
                     <th>Farm Equipment Value Rs in Lakhs</th>
                     <th>Farm Equipment Discription</th>
                     <th>Bank</th>
                     <th>Facility Type</th>
                     <th>Amount Released (Rs)</th>
                     <th>Amount Outstanding (Rs)</th>
                     <th>Operation Status (Regular/Irregular)</th>
                     <th>Season </th>
                     <th>Grade</th>
                     <th>Harvest Month</th>
                     <th>Quntaty Sold(in mt)  </th>
                     <th>Product Image </th>
                     <th>Product Delivery Location </th>
                     <th>Market Place</th>
                     <th>Food Safety Certification Status </th>
                     <th>Upload Certificate </th>
                     <th>Term and Conditions</th>
                     <th>Edit</th>
                  </tr>
                  <?php
                     if($query){
                       $count = 1;
                       while($row = mysqli_fetch_array($query)){
                         ?>
                  <tr>
                     <td><?php echo $count; ?></td>
                     <td><?php $GrossRevenue_CropName = explode(",",$row['GrossRevenue_CropName']);
                        foreach($GrossRevenue_CropName as $GrossRevenue_CropNames){
                            echo "$GrossRevenue_CropNames<br>";
                        }?></td>
                     <td><?php $GrossRevenue_Year = explode(",",$row['GrossRevenue_Year']);
                        foreach($GrossRevenue_Year as $GrossRevenue_Years){
                            echo "$GrossRevenue_Years<br>";
                        }?></td>
                     <td><?php $GrossRevenue_CropVariety = explode(",",$row['GrossRevenue_CropVariety']);
                        foreach($GrossRevenue_CropVariety as $GrossRevenue_CropVarietys){
                            echo "$GrossRevenue_CropVarietys<br>";
                        }?></td>
                     <td><?php $GrossRevenue_QuantityMT = explode(",",$row['GrossRevenue_QuantityMT']);
                        foreach($GrossRevenue_QuantityMT as $GrossRevenue_QuantityMTs){
                            echo "$GrossRevenue_QuantityMTs<br>";
                        }?></td>
                     <td><?php $GrossRevenue_RevenueinLakhs = explode(",",$row['GrossRevenue_RevenueinLakhs']);
                        foreach($GrossRevenue_RevenueinLakhs as $GrossRevenue_RevenueinLakhss){
                            echo "$GrossRevenue_RevenueinLakhss<br>";
                        }?></td>
                     <td><?php $GrossRevenue_MarketPlace = explode(",",$row['GrossRevenue_MarketPlace']);
                        foreach($GrossRevenue_MarketPlace as $GrossRevenue_MarketPlaces){
                            echo "$GrossRevenue_MarketPlaces<br>";
                        }?></td>
                     <td><?php $GrossRevenue_AveragePricePerMT = explode(",",$row['GrossRevenue_AveragePricePerMT']);
                        foreach($GrossRevenue_AveragePricePerMT as $GrossRevenue_AveragePricePerMTs){
                            echo "$GrossRevenue_AveragePricePerMTs<br>";
                        }?></td>
                     <td><?php $Warehouse_YearofSetup = explode(",",$row['Warehouse_YearofSetup']);
                        foreach($Warehouse_YearofSetup as $Warehouse_YearofSetups){
                            echo "$Warehouse_YearofSetups<br>";
                        }?></td>
                     <td><?php $Warehouse_AreainSqft = explode(",",$row['Warehouse_AreainSqft']);
                        foreach($Warehouse_AreainSqft as $Warehouse_AreainSqfts){
                            echo "$Warehouse_AreainSqfts<br>";
                        }?></td>
                     <td><?php $Warehouse_Capacityinmt = explode(",",$row['Warehouse_Capacityinmt']);
                        foreach($Warehouse_Capacityinmt as $Warehouse_Capacityinmts){
                            echo "$Warehouse_Capacityinmts<br>";
                        }?></td>
                     <td><?php $Warehouse_OwnedorLeased = explode(",",$row['Warehouse_OwnedorLeased']);
                        foreach($Warehouse_OwnedorLeased as $Warehouse_OwnedorLeaseds){
                            echo "$Warehouse_OwnedorLeaseds<br>";
                        }?></td>
                     <td><?php $Warehouse_AccredeationStatus = explode(",",$row['Warehouse_AccredeationStatus']);
                        foreach($Warehouse_AccredeationStatus as $Warehouse_AccredeationStatuss){
                            echo "$Warehouse_AccredeationStatuss<br>";
                        }?></td>
                     <td><?php $Procesing_Equipment_Activity = explode(",",$row['Procesing_Equipment_Activity']);
                        foreach($Procesing_Equipment_Activity as $Procesing_Equipment_Activitys){
                            echo "$Procesing_Equipment_Activitys<br>";
                        }?></td>
                     <td><?php $Procesing_Equipment_Operational_Status = explode(",",$row['Procesing_Equipment_Operational_Status']);
                        foreach($Procesing_Equipment_Operational_Status as $Procesing_Equipment_Operational_Statuss){
                            echo "$Procesing_Equipment_Operational_Statuss<br>";
                        }?></td>
                     <td><?php $Procesing_Equipment_ValueRsinLakhs = explode(",",$row['Procesing_Equipment_ValueRsinLakhs']);
                        foreach($Procesing_Equipment_ValueRsinLakhs as $Procesing_Equipment_ValueRsinLakhss){
                            echo "$Procesing_Equipment_ValueRsinLakhss<br>";
                        }?></td>
                     <td><?php $Procesing_Equipment_Discription = explode(",",$row['Procesing_Equipment_Discription']);
                        foreach($Procesing_Equipment_Discription as $Procesing_Equipment_Discriptions){
                            echo "$Procesing_Equipment_Discriptions<br>";
                        }?></td>
                     <td><?php $Farm_Equipment_Activity = explode(",",$row['Farm_Equipment_Activity']);
                        foreach($Farm_Equipment_Activity as $Farm_Equipment_Activitys){
                            echo "$Farm_Equipment_Activitys<br>";
                        }?></td>
                     <td><?php $Farm_Equipment_OperationalStatus = explode(",",$row['Farm_Equipment_OperationalStatus']);
                        foreach($Farm_Equipment_OperationalStatus as $Farm_Equipment_OperationalStatuss){
                            echo "$Farm_Equipment_OperationalStatuss<br>";
                        }?></td>
                     <td><?php $Farm_Equipment_ValueRsinLakhs = explode(",",$row['Farm_Equipment_ValueRsinLakhs']);
                        foreach($Farm_Equipment_ValueRsinLakhs as $Farm_Equipment_ValueRsinLakhss){
                            echo "$Farm_Equipment_ValueRsinLakhss<br>";
                        }?></td>
                     <td><?php $Farm_Equipment_Discription = explode(",",$row['Farm_Equipment_Discription']);
                        foreach($Farm_Equipment_Discription as $Farm_Equipment_Discriptions){
                            echo "$Farm_Equipment_Discriptions<br>";
                        }?></td>
                     <td><?php $Credit_Facilities_Availed_Bank = explode(",",$row['Credit_Facilities_Availed_Bank']);
                        foreach($Credit_Facilities_Availed_Bank as $Credit_Facilities_Availed_Banks){
                            echo "$Credit_Facilities_Availed_Banks<br>";
                        }?></td>
                     <td><?php $Credit_Facilities_Availed_FacilityType = explode(",",$row['Credit_Facilities_Availed_FacilityType']);
                        foreach($Credit_Facilities_Availed_FacilityType as $Credit_Facilities_Availed_FacilityTypes){
                            echo "$Credit_Facilities_Availed_FacilityTypes<br>";
                        }?></td>
                     <td><?php $Credit_Facilities_Availed_AmountReleasedRs = explode(",",$row['Credit_Facilities_Availed_AmountReleasedRs']);
                        foreach($Credit_Facilities_Availed_AmountReleasedRs as $Credit_Facilities_Availed_AmountReleasedRss){
                            echo "$Credit_Facilities_Availed_AmountReleasedRss<br>";
                        }?></td>
                     <td><?php $Credit_Facilities_Availed_AmountOutstandingRs = explode(",",$row['Credit_Facilities_Availed_AmountOutstandingRs']);
                        foreach($Credit_Facilities_Availed_AmountOutstandingRs as $Credit_Facilities_Availed_AmountOutstandingRss){
                            echo "$Credit_Facilities_Availed_AmountOutstandingRss<br>";
                        }?></td>
                     <td><?php $Credit_Facilities_Availed_OperationStatusRegularIrregular = explode(",",$row['Credit_Facilities_Availed_OperationStatusRegularIrregular']);
                        foreach($Credit_Facilities_Availed_OperationStatusRegularIrregular as $Credit_Facilities_Availed_OperationStatusRegularIrregulars){
                            echo "$Credit_Facilities_Availed_OperationStatusRegularIrregulars<br>";
                        }?></td>
                     <td><?php $Market_Linkage_Season = explode(",",$row['Market_Linkage_Season']);
                        foreach($Market_Linkage_Season as $Market_Linkage_Seasons){
                            echo "$Market_Linkage_Seasons<br>";
                        }?></td>
                     <td><?php $Market_Linkage_Grade = explode(",",$row['Market_Linkage_Grade']);
                        foreach($Market_Linkage_Grade as $Market_Linkage_Grades){
                            echo "$Market_Linkage_Grades<br>";
                        }?></td>
                     <td><?php $Market_Linkage_HarvestMonth = explode(",",$row['Market_Linkage_HarvestMonth']);
                        foreach($Market_Linkage_HarvestMonth as $Market_Linkage_HarvestMonths){
                            echo "$Market_Linkage_HarvestMonths<br>";
                        }?></td>
                     <td><?php $Market_Linkage_QuntatySoldinmt = explode(",",$row['Market_Linkage_QuntatySoldinmt']);
                        foreach($Market_Linkage_QuntatySoldinmt as $Market_Linkage_QuntatySoldinmts){
                            echo "$Market_Linkage_QuntatySoldinmts<br>";
                        }?></td>
                     <td><?php $Market_Linkage_ProductImage = explode(",",$row['Market_Linkage_ProductImage']);
                        foreach($Market_Linkage_ProductImage as $Market_Linkage_ProductImages){ ?>
                        <a href="FPORegistrationCertificates/<?php echo "$Market_Linkage_ProductImages";  ?>" target="_blank"><img style="width: 60px;" src="FPORegistrationCertificates/<?php echo "$Market_Linkage_ProductImages";  ?>"></a><br><br>
                        <?php  } ?>
                     </td>
                     <td><?php $Market_Linkage_ProductDeliveryLocation = explode(",",$row['Market_Linkage_ProductDeliveryLocation']);
                        foreach($Market_Linkage_ProductDeliveryLocation as $Market_Linkage_ProductDeliveryLocations){
                            echo "$Market_Linkage_ProductDeliveryLocations<br>";
                        }?></td>
                     <td><?php $Market_Linkage_MarketPlace = explode(",",$row['Market_Linkage_MarketPlace']);
                        foreach($Market_Linkage_MarketPlace as $Market_Linkage_MarketPlaces){
                            echo "$Market_Linkage_MarketPlaces<br>";
                        }?></td>
                     <td><?php $Market_Linkage_FoodSafetyCertificationStatus = explode(",",$row['Market_Linkage_FoodSafetyCertificationStatus']);
                        foreach($Market_Linkage_FoodSafetyCertificationStatus as $Market_Linkage_FoodSafetyCertificationStatuss){
                            echo "$Market_Linkage_FoodSafetyCertificationStatuss<br>";
                        }?></td>
                     <td><?php $Market_Linkage_UploadCertificate = explode(",",$row['Market_Linkage_UploadCertificate']);
                        foreach($Market_Linkage_UploadCertificate as $Market_Linkage_UploadCertificates){ ?>
                        <a href="FPORegistrationCertificates/<?php echo "$Market_Linkage_UploadCertificates";  ?>" target="_blank"><img src="images/download.png" style="width:40px; text-align: center;"></a><br><br>
                        <?php   }?>
                     </td>
                     <td><?php $Market_Linkage_TermandConditions = explode(",",$row['Market_Linkage_TermandConditions']);
                        foreach($Market_Linkage_TermandConditions as $Market_Linkage_TermandConditionss){
                            echo "$Market_Linkage_TermandConditionss<br>";
                        }?></td>
                     <td>
                     <a style="color:white;" onclick="return confirm('Are you sure want to edit?')" href="fpo-profile-done.php" class="btn btn-info mt-3"><i class="ti-pencil btn-icon-prepend"></i> Edit</a>
                     </td>
                  </tr>
                  <?php $count++; }} ?>
               </table>
            </div>
         </div>
      </main>
      <?php include "footer.php"; ?>
      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
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