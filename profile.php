<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
   session_start();
   error_reporting(0);
   $fpo_registration_id = $_SESSION['FPO_Registration_ID'];
   if ($fpo_registration_id == '') {
       header("Location: fpo-login.php");
   }
   include "connection.php";
   $query = mysqli_query($db, "SELECT * from fpo_registration where FPO_Registration_ID  = '$_SESSION[FPO_Registration_ID]' AND DeletedStatus='0'");
   $row = mysqli_fetch_assoc($query);
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
      $total_count = $count+$count1+$count2+$count3+$count4;
      $percentage = round(100-($total_count*100)/68);
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
   </head>
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
   <body style="background-image: url('images/fpo-bg2.jpg');background-repeat: repeat-y;background-position: center;">
      <?php include "fpo_header.php";  ?>
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
            <div class="section-title relative">
               <h2>FPO Registration Details</h2>
               <!-- <a href="profile_document.php"><button type="submit" id="submit" name="Import" class="btn btn-success mb-2" data-loading-text="Loading...">Upload Document Here</button></a> -->
               <div class="profile-status">
                  <p>Your Profile <?php echo $percentage+1;?>% Done<?php if($percentage != '99'){?>
                     Please Complete it 100% <span><a href="fpo-profile-done.php">Click Here</a></span>
                     <?php } else { ?>
                     <a href="view_registration_details.php">View Details</a> <a style="color:black; margin-left: 120px;" onclick="return confirm('Are you sure want to edit?')" href="fpo-profile-done.php" class="btn btn-link"> Edit</a> <?php } ?>
                  </p>
                  <div class="progress">
                     
                     <div class="progress-bar" role="progressbar" style="width: <?php echo $percentage+1;?>%;"
                        aria-valuenow="<?php echo $percentage;?>" aria-valuemin="0" aria-valuemax="100">
                        <?php echo $percentage+1;?>%
                     </div>
                  </div>
               </div>
            </div>
            <div class="table-1">
               <table class="table table-bordered">
                  <tr>
                     <th>FPO/Exporter Name</th>
                     <td><?php echo $row['FPOExporterName']; ?></td>
                     <th>Address</th>
                     <td><?php echo $row['Address']; ?></td>
                  </tr>
                  <tr>
                     <th>Block/Mandal/Taluk</th>
                     <td><?php echo $row['BlockMandalTaluk']; ?></td>
                     <th>District</th>
                     <td><?php echo $row['District']; ?></td>
                  </tr>
                  <tr>
                     <th>State</th>
                     <td><?php echo $row['State']; ?></td>
                     <th>Contact Person</th>
                     <td><?php echo $row['ContactPerson']; ?></td>
                  </tr>
                  <tr>
                     <th>Mobile No.</th>
                     <td>
                        <?php 
                           $query2 = mysqli_query($db, "SELECT * from fpo_registration_mobileno where FPO_Registration_ID  = '$row[FPO_Registration_ID]' AND DeletedStatus='0'");
                           while($row2 = mysqli_fetch_assoc($query2)){
                           echo $row2['MobileNo'];
                           echo "<br>";
                           }
                           ?>
                     </td>
                     <th>Land line</th>
                     <td><?php echo $row['Landline']; ?></td>
                  </tr>
                  <tr>
                     <th>Email</th>
                     <td><?php echo $row['Email']; ?></td>
                     <th>Year of Formation</th>
                     <td><?php echo $row['YearofFormatation']; ?></td>
                  </tr>
                  <tr>
                     <th>Registration Certificate</th>
                     <td class="img"><a href="FPORegistrationCertificates/<?php echo $row['RegistrationCertificate']; ?>"
                        target="_blank"><img src="images/download.png" style="width:40px; text-align: center;"></a></td>
                     <th>No of Farmers Registered</th>
                     <td><?php echo $row['NoofFarmersRegistered']; ?></td>
                  </tr>
                  <tr>
                     <th>Active</th>
                     <td><?php echo $row['Active']; ?></td>
                     <th>Inactive</th>
                     <td><?php echo $row['Inactive']; ?></td>
                  </tr>
                  <tr>
                     <th>Equity Share capital Paidup</th>
                     <td><?php echo $row['EquitySharecapitalPaidup']; ?></td>
                     <th>Year</th>
                     <td><?php echo $row['Year']; ?></td>
                  </tr>
                  <tr>
                     <th>Rs in Lakhs</th>
                     <td><?php echo $row['RsinLakhs']; ?></td>
                     <th>Promoting Agency Name</th>
                     <td><?php echo $row['PromotingAgencyName']; ?></td>
                  </tr>
                  <tr>
                     <th>Contact Person Name</th>
                     <td><?php echo $row['ContactPersonName']; ?></td>
                     <th>Mobile No.</th>
                     <td>
                        <?php 
                           $query3 = mysqli_query($db, "SELECT * from fpo_registration_mobilenumber where FPO_Registration_ID  = '$row[FPO_Registration_ID]' AND DeletedStatus='0'");
                           while($row3 = mysqli_fetch_assoc($query3)){
                           echo $row3['MobileNo'];
                           echo "<br>";
                           }
                        ?>
                     </td>
                  </tr>
                  <tr>
                     <th>Email Id</th>
                     <td><?php echo $row['EmailId']; ?></td>
                     <th>Business Activity</th>
                     <td><?php echo $row['BusinessActivity']; ?></td>
                  </tr>
                  <?php
                     $query1 = mysqli_query($db, "SELECT * from fpo_registration_crops_cultivated where FPO_Registration_ID  = '$row[FPO_Registration_ID]' AND DeletedStatus='0'");
                     $row1 = mysqli_fetch_assoc($query1)
                     ?>
                  <tr>
                     <th>Commodity Cultivated</th>
                     <td><?php echo $row1['CropsCultivated']; ?></td>
                     <th>Year</th>
                     <td><?php echo $row1['Year']; ?></td>
                  </tr>
                  <tr>
                     <th>Season</th>
                     <td><?php echo $row1['Season']; ?></td>
                     <th>Project Farm Output (MT)</th>
                     <td>
                        <?php echo $row1['ProjectFarmOutputMT']; ?>
                     </td>
                  </tr>
                  <tr>
                     <th>Commodity Name</th>
                     <td><?php echo $row1['CropName']; ?></td>
                     <th>Area in Ha</th>
                     <td><?php echo $row1['AreainHa']; ?></td>
                  </tr>
                  <tr>
                     <th>Variety</th>
                     <td><?php echo $row1['Variety']; ?></td>
                     <th>Irrigation Source</th>
                     <td><?php echo $row1['IrrigationSource']; ?></td>
                  </tr>        
               </table>
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
   </body>
</html>