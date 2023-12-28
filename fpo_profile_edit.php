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
   $total_count = $count + $count1 + $count2 + $count3 + $count4;
   $percentage = round(100 - ($total_count * 100) / 68);
   if ($_POST['update']) {
       $exportername = $_POST['exportername'];
       $address = $_POST['address'];
       $BlockMandalTaluk = $_POST['BlockMandalTaluk'];
       $State = $_POST['State'];
       $District = $_POST['District'];
       $ContactPerson = $_POST['ContactPerson'];
       $YearofFormatation = $_POST['YearofFormatation'];
       $RegistrationCertificate = $_FILES['RegistrationCertificate']['name'];
       $RegistrationCertificate_temp = $_FILES['RegistrationCertificate']['tmp_name'];
       if (strtolower(end(explode(".", $RegistrationCertificate))) == "pdf") {
           move_uploaded_file($RegistrationCertificate_temp, "FPORegistrationCertificates/" . $RegistrationCertificate);
       }
       if ($RegistrationCertificate == "") {
           $Certificate = $row['RegistrationCertificate'];
       } else {
           $Certificate = $RegistrationCertificate;
       }
       $NoofFarmersRegistered = $_POST['NoofFarmersRegistered'];
       $Active = $_POST['Active'];
       $EquitySharecapitalPaidup = $_POST['EquitySharecapitalPaidup'];
       $Year = $_POST['Year'];
       $RsinLakhs = $_POST['RsinLakhs'];
       $PromotingAgencyName = $_POST['PromotingAgencyName'];
       $ContactPersonName = $_POST['ContactPersonName'];
       $BusinessActivity = $_POST['BusinessActivity'];
       $CropsCultivated_fpo = implode(",", $_POST['CropsCultivated']);
       $Year1_fpo = implode(",", $_POST['Year1']);
       $Season_fpo = implode(",", $_POST['Season']);
       $ProjectFarmOutputMT_fpo = implode(",", $_POST['ProjectFarmOutputMT']);
       $CommodityTypes_fpo = implode(",", $_POST['CommodityTypes']);
       $CropName_fpo = implode(",", $_POST['CropName']);
       $AreainHa_fpo = implode(",", $_POST['AreainHa']);
       $Variety_fpo = implode(",", $_POST['Variety']);
       $IrrigationSource_fpo = implode(",", $_POST['IrrigationSource']);
       // Update `fpo_registeration` table
       $update = "UPDATE `fpo_registration` SET FPOExporterName='$exportername',Address='$address',BlockMandalTaluk='$BlockMandalTaluk',State='$State',District='$District',ContactPerson='$ContactPerson',YearofFormatation='$YearofFormatation',RegistrationCertificate='$Certificate',NoofFarmersRegistered='$NoofFarmersRegistered',Active='$active',EquitySharecapitalPaidup='$EquitySharecapitalPaidup',Year='$Year',RsinLakhs='$RsinLakhs',PromotingAgencyName='$PromotingAgencyName',ContactPersonName='$ContactPersonName',BusinessActivity='$BusinessActivity' WHERE FPO_Registration_ID ='$fpo_registration_id'";
       $execute = mysqli_query($db, $update);
       // Update `fpo_registration_crops_cultivated` table
       $cropedit = "UPDATE `fpo_registration_crops_cultivated`SET CropsCultivated='$CropsCultivated_fpo',Year='$Year1_fpo',Season='$Season_fpo',ProjectFarmOutputMT='$ProjectFarmOutputMT_fpo',CommodityTypes='$CommodityTypes_fpo',CropName='$CropName_fpo',AreainHa='$AreainHa_fpo',Variety='$Variety_fpo',IrrigationSource='$IrrigationSource_fpo' WHERE FPO_Registration_ID ='$fpo_registration_id'";
       $execute1 = mysqli_query($db, $cropedit);
       // Both variables are ture then execute if condition
       if ($execute == TRUE && $execute1 == TRUE) {
           echo "<script>alert('Data Update Successfully')</script>";
           echo "<script>window.location.hrf = 'profile.php'</script>";
       } else {
           echo "<script>alert('Oops Data Not Update')</script>";
       }
   }
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
      <?php include "fpo_header.php"; ?>
      <main id="main">
         <section id="hero">
            <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade"
               data-bs-ride="carousel">
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
         <form method="POST" enctype="multipart/form-data">
            <div class="container mt-5 mb-5">
               <div class="section-title relative">
                  <h2>Edit FPO Registration</h2>
               </div>
               <div class="table-1">
                  <table class="table table-bordered">
                     <tr>
                        <th>FPO/Exporter Name</th>
                        <td>
                           <input type="text" name="exportername" class="form-control"
                              value="<?php echo $row['FPOExporterName']; ?>">
                        </td>
                        <th>Address</th>
                        <td>
                           <input type="text" name="address" value="<?php echo $row['Address']; ?>"
                              class="form-control">
                        </td>
                     </tr>
                     <tr>
                        <th>Block/Mandal/Taluk</th>
                        <td>
                           <input type="text" name="BlockMandalTaluk"
                              value="<?php echo $row['BlockMandalTaluk']; ?>" class="form-control">
                        </td>
                        <th>State</th>
                        <td>
                           <select class="form-control" id="inputState" name="State" required="">
                              <option value="<?php echo $row['State']; ?>" selected>
                                 <?php echo $row['State']; ?>
                              </option>
                              <option value="">Select State</option>
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
                              <option disabled style="background-color:#aaa; color:#fff">UNION Territories
                              </option>
                              <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                              <option value="Chandigarh">Chandigarh</option>
                              <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                              <option value="Daman and Diu">Daman and Diu</option>
                              <option value="Delhi">Delhi</option>
                              <option value="Lakshadeep">Lakshadeep</option>
                              <option value="Pondicherry">Pondicherry</option>
                           </select>
                        </td>
                     </tr>
                     <tr>
                        <th>District</th>
                        <td>
                           <select name="District" class="form-control" id="inputDistrict">
                              <option value="<?php echo $row['District']; ?>" selected>
                                 <?php echo $row['District']; ?>
                              </option>
                           </select>
                        </td>
                        <th>Contact Person</th>
                        <td>
                           <input type="text" name="ContactPerson" value="<?php echo $row['ContactPerson']; ?>"
                              class="form-control">
                        </td>
                     </tr>
                     <tr>
                        <th>Mobile No.</th>
                        <td>
                           <?php
                              $query2 = mysqli_query($db, "SELECT * from fpo_registration_mobileno where FPO_Registration_ID  = '$row[FPO_Registration_ID]' AND DeletedStatus='0'");
                              while ($row2 = mysqli_fetch_assoc($query2)) { ?>
                           <input type="text" name="MobileNo" value="<?php echo $row2['MobileNo']; ?>" class="form-control" readonly>
                           <?php
                              echo "<br>";
                              }
                              ?>
                        </td>
                        <th>Land line</th>
                        <td>
                           <input type="text" name="landline" value="<?php echo $row['Landline']; ?>" readonly class="form-control">
                        </td>
                     </tr>
                     <tr>
                        <th>Email</th>
                        <td>
                           <input type="text" name="Email" value="<?php echo $row['Email']; ?>" class="form-control" readonly>
                        </td>
                        <th>Year of Formation</th>
                        <td>
                           <select class="form-control" name="YearofFormatation">
                              <option value="<?php echo $row['YearofFormatation']; ?>" selected>
                                 <?php echo $row['YearofFormatation']; ?>
                              </option>
                              <option value="">Select</option>
                              <option value="2015">2015</option>
                              <option value="2016">2016</option>
                              <option value="2017">2017</option>
                              <option value="2018">2018</option>
                              <option value="2019">2019</option>
                              <option value="2020">2020</option>
                              <option value="2021">2021</option>
                              <option value="2022">2022</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                              <option value="2026">2026</option>
                              <option value="2027">2027</option>
                              <option value="2028">2028</option>
                              <option value="2029">2029</option>
                              <option value="2030">2030</option>
                           </select>
                        </td>
                     </tr>
                     <tr>
                        <th>Registration Certificate</th>
                        <td class="img">
                           <input type="file" class="form-control mb-3" name="RegistrationCertificate"
                              placeholder="Registration Certificate">
                           <a href="FPORegistrationCertificates/<?php echo $row['RegistrationCertificate']; ?>"
                              target="_blank"><img src="images/download.png"
                              style="width:40px; text-align: center;"></a>
                        </td>
                        <th>No of Farmers Registered</th>
                        <td>
                           <input type="text" name="NoofFarmersRegistered"
                              value="<?php echo $row['NoofFarmersRegistered']; ?>" class="form-control">
                        </td>
                     </tr>
                     <tr>
                        <th>Active</th>
                        <td>
                           <input type="text" name="Active" value="<?php echo $row['Active']; ?>"
                              class="form-control">
                        </td>
                        <th>Inactive</th>
                        <td>
                           <?php
                              $total = $row['NoofFarmersRegistered'];
                              $active = $row['Active'];
                              $inactive = $total - $active;
                              ?>
                           <?php echo $inactive; ?>
                        </td>
                     </tr>
                     <tr>
                        <th>Equity Share capital Paidup</th>
                        <td>
                           <input type="text" name="EquitySharecapitalPaidup"
                              value="<?php echo $row['EquitySharecapitalPaidup']; ?>" class="form-control">
                        </td>
                        <th>Year</th>
                        <td>
                           <select class="form-control" name="Year">
                              <option value="<?php echo $row['Year']; ?>" selected>
                                 <?php echo $row['Year']; ?>
                              </option>
                              <option value="">Select</option>
                              <option value="2015">2015</option>
                              <option value="2016">2016</option>
                              <option value="2017">2017</option>
                              <option value="2018">2018</option>
                              <option value="2019">2019</option>
                              <option value="2020">2020</option>
                              <option value="2021">2021</option>
                              <option value="2022">2022</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                              <option value="2026">2026</option>
                              <option value="2027">2027</option>
                              <option value="2028">2028</option>
                              <option value="2029">2029</option>
                              <option value="2030">2030</option>
                           </select>
                        </td>
                     </tr>
                     <tr>
                        <th>Rs in Lakhs</th>
                        <td>
                           <input type="text" name="RsinLakhs" value="<?php echo $row['RsinLakhs']; ?>"
                              class="form-control">
                        </td>
                        <th>Promoting Agency Name</th>
                        <td>
                           <input type="text" name="PromotingAgencyName"
                              value="<?php echo $row['PromotingAgencyName']; ?>" class="form-control">
                        </td>
                     </tr>
                     <tr>
                        <th>Contact Person Name</th>
                        <td>
                           <input type="text" name="ContactPersonName"
                              value="<?php echo $row['ContactPersonName']; ?>" class="form-control">
                        </td>
                        <th>Mobile No.</th>
                        <td>
                           <?php
                              $query3 = mysqli_query($db, "SELECT * from fpo_registration_mobilenumber where FPO_Registration_ID  = '$row[FPO_Registration_ID]' AND DeletedStatus='0'");
                              while ($row3 = mysqli_fetch_assoc($query3)) { ?>
                           <input type="text" name="MobileNo" value="<?php echo $row3['MobileNo']; ?>" class="form-control" readonly>
                           <?php echo "<br>";
                              } ?>
                        </td>
                     </tr>
                     <tr>
                        <th>Email Id</th>
                        <td>
                           <input type="text" name="EmailId" value=" <?php echo $row['EmailId']; ?>" class="form-control" readonly>
                        </td>
                        <th>Business Activity</th>
                        <td>
                           <input type="text" name="BusinessActivity"
                              value="<?php echo $row['BusinessActivity']; ?>" class="form-control">
                        </td>
                     </tr>
                     <?php
                        $query1 = mysqli_query($db, "SELECT * from fpo_registration_crops_cultivated where FPO_Registration_ID  = '$row[FPO_Registration_ID]' AND DeletedStatus='0'");
                        $row1 = mysqli_fetch_assoc($query1)
                        ?>
                  </table>
               </div>
               <?php
                  $crop = mysqli_query($db, "SELECT * from `fpo_registration_crops_cultivated` where FPO_Registration_ID  = '$_SESSION[FPO_Registration_ID]' AND DeletedStatus='0'");
                  $fpocrop = mysqli_num_rows($crop);
                  if ($fpocrop == '1') {
                      $fpocrop = mysqli_fetch_assoc($crop);
                      $CropsCultivated = explode(',', $fpocrop['CropsCultivated']);
                      $Year = explode(',', $fpocrop['Year']);
                      $Season = explode(',', $fpocrop['Season']);
                      $ProjectFarmOutputMT = explode(',', $fpocrop['ProjectFarmOutputMT']);
                      $CommodityTypes = explode(',', $fpocrop['CommodityTypes']);
                      $CropName = explode(',', $fpocrop['CropName']);
                      $AreainHa = explode(',', $fpocrop['AreainHa']);
                      $Variety = explode(',', $fpocrop['Variety']);
                      $IrrigationSource = explode(',', $fpocrop['IrrigationSource']);
                      $count = 1;
                      foreach ($CropsCultivated as $value2) {
                  ?>
               <div class="row" id="<?php if ($count > 1) {
                  echo 'row2';
                  } else {
                  echo 'row1';
                  } ?>">
                  <div class="clearfix" style="margin-top: 22px !important;">
                     <?php if ($count == 1) { ?>
                     <input type="button" value="+" class="btn btn-success float-end" onclick="addRow2()">
                     <?php
                        }
                        if ($count > 1) { ?>
                     <input type="button" value="-" class="btn btn-danger float-end" onclick="removeRow2(this)">
                     <?php
                        } ?>
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2"><strong>Crops Cultivated</strong></label>
                     <input type="text" class="form-control" value="<?php echo $CropsCultivated[$count - 1]; ?>" name="CropsCultivated[]" placeholder="Crops Cultivated">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2"><strong>Year</strong></label>
                     <select class="form-control" name="Year1[]">
                        <option value="<?php echo $row1['Year'] ?>" selected><?php echo $row1['Year'] ?></option>
                        <option value="">Select</option>
                        <option <?php if ($Year[$count - 1] == '2015') {
                           echo "selected";
                           } ?> value="2015">2015</option>
                        <option <?php if ($Year[$count - 1] == '2016') {
                           echo "selected";
                           } ?> value="2016">2016</option>
                        <option <?php if ($Year[$count - 1] == '2017') {
                           echo "selected";
                           } ?> value="2017">2017</option>
                        <option <?php if ($Year[$count - 1] == '2018') {
                           echo "selected";
                           } ?> value="2018">2018</option>
                        <option <?php if ($Year[$count - 1] == '2019') {
                           echo "selected";
                           } ?> value="2019">2019</option>
                        <option <?php if ($Year[$count - 1] == '2020') {
                           echo "selected";
                           } ?> value="2020">2020</option>
                        <option <?php if ($Year[$count - 1] == '2021') {
                           echo "selected";
                           } ?> value="2021">2021</option>
                        <option <?php if ($Year[$count - 1] == '2022') {
                           echo "selected";
                           } ?> value="2022">2022</option>
                        <option <?php if ($Year[$count - 1] == '2023') {
                           echo "selected";
                           } ?> value="2023">2023</option>
                        <option <?php if ($Year[$count - 1] == '2024') {
                           echo "selected";
                           } ?> value="2024">2024</option>
                        <option <?php if ($Year[$count - 1] == '2025') {
                           echo "selected";
                           } ?> value="2025">2025</option>
                        <option <?php if ($Year[$count - 1] == '2026') {
                           echo "selected";
                           } ?> value="2026">2026</option>
                        <option <?php if ($Year[$count - 1] == '2027') {
                           echo "selected";
                           } ?> value="2027">2027</option>
                        <option <?php if ($Year[$count - 1] == '2028') {
                           echo "selected";
                           } ?> value="2028">2028</option>
                        <option <?php if ($Year[$count - 1] == '2029') {
                           echo "selected";
                           } ?> value="2029">2029</option>
                        <option <?php if ($Year[$count - 1] == '2030') {
                           echo "selected";
                           } ?> value="2030">2030</option>
                     </select>
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2"><strong>Season</strong></label>
                     <input type="text" class="form-control" value="<?php echo $Season[$count - 1]; ?>" name="Season[]" placeholder="Season">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2"><strong>Projected Farm Output (MT)</strong></label>
                     <input type="text" class="form-control" value="<?php echo $ProjectFarmOutputMT[$count - 1]; ?>" name="ProjectFarmOutputMT[]" placeholder="Season">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2"><strong>Commodity Category</strong></label>
                     <select class="form-control" name="CommodityTypes[]">
                        <!-- <option value="<?php echo $row1['CommodityTypes'] ?>" selected><?php echo $row1['CommodityTypes'] ?></option> -->
                        <option <?php if ($CommodityTypes[$count - 1] == 'Testing') {
                           echo "selected";
                           } ?> value="Testing">Testing</option>
                        <option value="">Select</option>
                        <option value="Testing">Testing</option>
                     </select>
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2"><strong>Commodity Name</strong></label>
                     <input type="text" class="form-control" value="<?php echo $CropName[$count - 1]; ?>" name="CropName[]" placeholder="Commodity Name">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2"><strong>Area in Ha</strong></label>
                     <input type="text" class="form-control" value="<?php echo $AreainHa[$count - 1] ?>" name="AreainHa[]" placeholder="Area in Ha ">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2"><strong>Variety</strong></label>
                     <input type="text" class="form-control" value="<?php echo $Variety[$count - 1]; ?>" name="Variety[]" placeholder="Variety">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2"><strong>Irrigation Source</strong></label>
                     <input type="text" class="form-control" value="<?php echo $IrrigationSource[$count - 1]; ?>" name="IrrigationSource[]" placeholder="Irrigation Source ">
                  </div>
                  <div id="content2"></div>
               </div>
               <?php $count = $count + 1;
                  }
                  } else { ?>
               <div class="row" id="row1">
                  <div class="clearfix" style="margin-top: 22px !important;">
                     <input type="button" value="+" class="btn btn-success float-end" onclick="addRow2()">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2"><strong>Crops Cultivated</strong></label>
                     <input type="text" class="form-control" value="<?php echo $CropsCultivated[$count - 1]; ?>" name="CropsCultivated[]" placeholder="Crops Cultivated">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2"><strong>Year</strong></label>
                     <select class="form-control" name="Year1[]">
                        <option value="">Select</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                     </select>
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2"><strong>Season</strong></label>
                     <input type="text" class="form-control" name="Season[]" placeholder="Season">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2"><strong>Projected Farm Output (MT)</strong></label>
                     <input type="text" class="form-control" name="ProjectFarmOutputMT[]" placeholder="Season">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2"><strong>Commodity Category</strong></label>
                     <select class="form-control" name="CommodityTypes[]">
                        <!-- <option value="<?php echo $row1['CommodityTypes'] ?>" selected><?php echo $row1['CommodityTypes'] ?></option> -->
                        <!-- <option <?php if ($CommodityTypes[$count - 1] == 'Testing') {
                           echo "selected";
                           } ?> value="Testing">Testing</option> -->
                        <option value="">Select</option>
                        <option value="Testing">Testing</option>
                     </select>
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2"><strong>Commodity Name</strong></label>
                     <input type="text" class="form-control" name="CropName[]" placeholder="Commodity Name">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2"><strong>Area in Ha</strong></label>
                     <input type="text" class="form-control" name="AreainHa[]" placeholder="Area in Ha ">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2"><strong>Variety</strong></label>
                     <input type="text" class="form-control" name="Variety[]" placeholder="Variety">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2"><strong>Irrigation Source</strong></label>
                     <input type="text" class="form-control" name="IrrigationSource[]" placeholder="Irrigation Source ">
                  </div>
                  <div id="content2"></div>
               </div>
               <?php
                  } ?>
               <div class="container my-5">
                  <div class="col-md-12 text-center">
                     <input type="submit" name="update" value="Update" class="btn btn-success btn-large text-center">
                  </div>
               </div>
            </div>
         </form>
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
      <script type="text/javascript" src="js/jquery.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <script>
         var AndhraPradesh = ["Anantapur", "Chittoor", "East Godavari", "Guntur", "Kadapa", "Krishna", "Kurnool", "Prakasam", "Nellore", "Srikakulam", "Visakhapatnam", "Vizianagaram", "West Godavari"];
         
         var ArunachalPradesh = ["Anjaw", "Changlang", "Dibang Valley", "East Kameng", "East Siang", "Kra Daadi", "Kurung Kumey", "Lohit", "Longding", "Lower Dibang Valley", "Lower Subansiri", "Namsai", "Papum Pare", "Siang", "Tawang", "Tirap", "Upper Siang", "Upper Subansiri", "West Kameng", "West Siang", "Itanagar"];
         
         var Assam = ["Baksa", "Barpeta", "Biswanath", "Bongaigaon", "Cachar", "Charaideo", "Chirang", "Darrang", "Dhemaji", "Dhubri", "Dibrugarh", "Goalpara", "Golaghat", "Hailakandi", "Hojai", "Jorhat", "Kamrup Metropolitan", "Kamrup (Rural)", "Karbi Anglong", "Karimganj", "Kokrajhar", "Lakhimpur", "Majuli", "Morigaon", "Nagaon", "Nalbari", "Dima Hasao", "Sivasagar", "Sonitpur", "South Salmara Mankachar", "Tinsukia", "Udalguri", "West Karbi Anglong"];
         
         var Bihar = ["Araria", "Arwal", "Aurangabad", "Banka", "Begusarai", "Bhagalpur", "Bhojpur", "Buxar", "Darbhanga", "East Champaran", "Gaya", "Gopalganj", "Jamui", "Jehanabad", "Kaimur", "Katihar", "Khagaria", "Kishanganj", "Lakhisarai", "Madhepura", "Madhubani", "Munger", "Muzaffarpur", "Nalanda", "Nawada", "Patna", "Purnia", "Rohtas", "Saharsa", "Samastipur", "Saran", "Sheikhpura", "Sheohar", "Sitamarhi", "Siwan", "Supaul", "Vaishali", "West Champaran"];
         
         var Chhattisgarh = ["Balod", "Baloda Bazar", "Balrampur", "Bastar", "Bemetara", "Bijapur", "Bilaspur", "Dantewada", "Dhamtari", "Durg", "Gariaband", "Janjgir Champa", "Jashpur", "Kabirdham", "Kanker", "Kondagaon", "Korba", "Koriya", "Mahasamund", "Mungeli", "Narayanpur", "Raigarh", "Raipur", "Rajnandgaon", "Sukma", "Surajpur", "Surguja"];
         
         var Goa = ["North Goa", "South Goa"];
         
         var Gujarat = ["Ahmedabad", "Amreli", "Anand", "Aravalli", "Banaskantha", "Bharuch", "Bhavnagar", "Botad", "Chhota Udaipur", "Dahod", "Dang", "Devbhoomi Dwarka", "Gandhinagar", "Gir Somnath", "Jamnagar", "Junagadh", "Kheda", "Kutch", "Mahisagar", "Mehsana", "Morbi", "Narmada", "Navsari", "Panchmahal", "Patan", "Porbandar", "Rajkot", "Sabarkantha", "Surat", "Surendranagar", "Tapi", "Vadodara", "Valsad"];
         
         var Haryana = ["Ambala", "Bhiwani", "Charkhi Dadri", "Faridabad", "Fatehabad", "Gurugram", "Hisar", "Jhajjar", "Jind", "Kaithal", "Karnal", "Kurukshetra", "Mahendragarh", "Mewat", "Palwal", "Panchkula", "Panipat", "Rewari", "Rohtak", "Sirsa", "Sonipat", "Yamunanagar"];
         
         var HimachalPradesh = ["Bilaspur", "Chamba", "Hamirpur", "Kangra", "Kinnaur", "Kullu", "Lahaul Spiti", "Mandi", "Shimla", "Sirmaur", "Solan", "Una"];
         
         var JammuKashmir = ["Anantnag", "Bandipora", "Baramulla", "Budgam", "Doda", "Ganderbal", "Jammu", "Kargil", "Kathua", "Kishtwar", "Kulgam", "Kupwara", "Leh", "Poonch", "Pulwama", "Rajouri", "Ramban", "Reasi", "Samba", "Shopian", "Srinagar", "Udhampur"];
         
         var Jharkhand = ["Bokaro", "Chatra", "Deoghar", "Dhanbad", "Dumka", "East Singhbhum", "Garhwa", "Giridih", "Godda", "Gumla", "Hazaribagh", "Jamtara", "Khunti", "Koderma", "Latehar", "Lohardaga", "Pakur", "Palamu", "Ramgarh", "Ranchi", "Sahebganj", "Seraikela Kharsawan", "Simdega", "West Singhbhum"];
         
         var Karnataka = ["Bagalkot", "Bangalore Rural", "Bangalore Urban", "Belgaum", "Bellary", "Bidar", "Vijayapura", "Chamarajanagar", "Chikkaballapur", "Chikkamagaluru", "Chitradurga", "Dakshina Kannada", "Davanagere", "Dharwad", "Gadag", "Gulbarga", "Hassan", "Haveri", "Kodagu", "Kolar", "Koppal", "Mandya", "Mysore", "Raichur", "Ramanagara", "Shimoga", "Tumkur", "Udupi", "Uttara Kannada", "Yadgir"];
         
         var Kerala = ["Alappuzha", "Ernakulam", "Idukki", "Kannur", "Kasaragod", "Kollam", "Kottayam", "Kozhikode", "Malappuram", "Palakkad", "Pathanamthitta", "Thiruvananthapuram", "Thrissur", "Wayanad"];
         
         var MadhyaPradesh = ["Agar Malwa", "Alirajpur", "Anuppur", "Ashoknagar", "Balaghat", "Barwani", "Betul", "Bhind", "Bhopal", "Burhanpur", "Chhatarpur", "Chhindwara", "Damoh", "Datia", "Dewas", "Dhar", "Dindori", "Guna", "Gwalior", "Harda", "Hoshangabad", "Indore", "Jabalpur", "Jhabua", "Katni", "Khandwa", "Khargone", "Mandla", "Mandsaur", "Morena", "Narsinghpur", "Neemuch", "Panna", "Raisen", "Rajgarh", "Ratlam", "Rewa", "Sagar", "Satna",
         
             "Sehore", "Seoni", "Shahdol", "Shajapur", "Sheopur", "Shivpuri", "Sidhi", "Singrauli", "Tikamgarh", "Ujjain", "Umaria", "Vidisha"
         ];
         
         var Maharashtra = ["Ahmednagar", "Akola", "Amravati", "Aurangabad", "Beed", "Bhandara", "Buldhana", "Chandrapur", "Dhule", "Gadchiroli", "Gondia", "Hingoli", "Jalgaon", "Jalna", "Kolhapur", "Latur", "Mumbai City", "Mumbai Suburban", "Nagpur", "Nanded", "Nandurbar", "Nashik", "Osmanabad", "Palghar", "Parbhani", "Pune", "Raigad", "Ratnagiri", "Sangli", "Satara", "Sindhudurg", "Solapur", "Thane", "Wardha", "Washim", "Yavatmal"];
         
         var Manipur = ["Bishnupur", "Chandel", "Churachandpur", "Imphal East", "Imphal West", "Jiribam", "Kakching", "Kamjong", "Kangpokpi", "Noney", "Pherzawl", "Senapati", "Tamenglong", "Tengnoupal", "Thoubal", "Ukhrul"];
         
         var Meghalaya = ["East Garo Hills", "East Jaintia Hills", "East Khasi Hills", "North Garo Hills", "Ri Bhoi", "South Garo Hills", "South West Garo Hills", "South West Khasi Hills", "West Garo Hills", "West Jaintia Hills", "West Khasi Hills"];
         
         var Mizoram = ["Aizawl", "Champhai", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Serchhip", "Aizawl", "Champhai", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Serchhip"];
         
         var Nagaland = ["Dimapur", "Kiphire", "Kohima", "Longleng", "Mokokchung", "Mon", "Peren", "Phek", "Tuensang", "Wokha", "Zunheboto"];
         
         var Odisha = ["Angul", "Balangir", "Balasore", "Bargarh", "Bhadrak", "Boudh", "Cuttack", "Debagarh", "Dhenkanal", "Gajapati", "Ganjam", "Jagatsinghpur", "Jajpur", "Jharsuguda", "Kalahandi", "Kandhamal", "Kendrapara", "Kendujhar", "Khordha", "Koraput", "Malkangiri", "Mayurbhanj", "Nabarangpur", "Nayagarh", "Nuapada", "Puri", "Rayagada", "Sambalpur", "Subarnapur", "Sundergarh"];
         
         var Punjab = ["Amritsar", "Barnala", "Bathinda", "Faridkot", "Fatehgarh Sahib", "Fazilka", "Firozpur", "Gurdaspur", "Hoshiarpur", "Jalandhar", "Kapurthala", "Ludhiana", "Mansa", "Moga", "Mohali", "Muktsar", "Pathankot", "Patiala", "Rupnagar", "Sangrur", "Shaheed Bhagat Singh Nagar", "Tarn Taran"];
         
         var Rajasthan = ["Ajmer", "Alwar", "Banswara", "Baran", "Barmer", "Bharatpur", "Bhilwara", "Bikaner", "Bundi", "Chittorgarh", "Churu", "Dausa", "Dholpur", "Dungarpur", "Ganganagar", "Hanumangarh", "Jaipur", "Jaisalmer", "Jalore", "Jhalawar", "Jhunjhunu", "Jodhpur", "Karauli", "Kota", "Nagaur", "Pali", "Pratapgarh", "Rajsamand", "Sawai Madhopur", "Sikar", "Sirohi", "Tonk", "Udaipur"];
         
         var Sikkim = ["East Sikkim", "North Sikkim", "South Sikkim", "West Sikkim"];
         
         var TamilNadu = ["Ariyalur", "Chennai", "Coimbatore", "Cuddalore", "Dharmapuri", "Dindigul", "Erode", "Kanchipuram", "Kanyakumari", "Karur", "Krishnagiri", "Madurai", "Nagapattinam", "Namakkal", "Nilgiris", "Perambalur", "Pudukkottai", "Ramanathapuram", "Salem", "Sivaganga", "Thanjavur", "Theni", "Thoothukudi", "Tiruchirappalli", "Tirunelveli", "Tiruppur", "Tiruvallur", "Tiruvannamalai", "Tiruvarur", "Vellore", "Viluppuram", "Virudhunagar"];
         
         var Telangana = ["Adilabad", "Bhadradri Kothagudem", "Hyderabad", "Jagtial", "Jangaon", "Jayashankar", "Jogulamba", "Kamareddy", "Karimnagar", "Khammam", "Komaram Bheem", "Mahabubabad", "Mahbubnagar", "Mancherial", "Medak", "Medchal", "Nagarkurnool", "Nalgonda", "Nirmal", "Nizamabad", "Peddapalli", "Rajanna Sircilla", "Ranga Reddy", "Sangareddy", "Siddipet", "Suryapet", "Vikarabad", "Wanaparthy", "Warangal Rural", "Warangal Urban", "Yadadri Bhuvanagiri"];
         
         var Tripura = ["Dhalai", "Gomati", "Khowai", "North Tripura", "Sepahijala", "South Tripura", "Unakoti", "West Tripura"];
         
         var UttarPradesh = ["Agra", "Aligarh", "Allahabad", "Ambedkar Nagar", "Amethi", "Amroha", "Auraiya", "Azamgarh", "Baghpat", "Bahraich", "Ballia", "Balrampur", "Banda", "Barabanki", "Bareilly", "Basti", "Bhadohi", "Bijnor", "Budaun", "Bulandshahr", "Chandauli", "Chitrakoot", "Deoria", "Etah", "Etawah", "Faizabad", "Farrukhabad", "Fatehpur", "Firozabad", "Gautam Buddha Nagar", "Ghaziabad", "Ghazipur", "Gonda", "Gorakhpur", "Hamirpur", "Hapur", "Hardoi", "Hathras", "Jalaun", "Jaunpur", "Jhansi", "Kannauj", "Kanpur Dehat", "Kanpur Nagar", "Kasganj", "Kaushambi", "Kheri", "Kushinagar", "Lalitpur", "Lucknow", "Maharajganj", "Mahoba", "Mainpuri", "Mathura", "Mau", "Meerut", "Mirzapur", "Moradabad", "Muzaffarnagar", "Pilibhit", "Pratapgarh", "Raebareli", "Rampur", "Saharanpur", "Sambhal", "Sant Kabir Nagar", "Shahjahanpur", "Shamli", "Shravasti", "Siddharthnagar", "Sitapur", "Sonbhadra", "Sultanpur", "Unnao", "Varanasi"];
         
         var Uttarakhand = ["Almora", "Bageshwar", "Chamoli", "Champawat", "Dehradun", "Haridwar", "Nainital", "Pauri", "Pithoragarh", "Rudraprayag", "Tehri", "Udham Singh Nagar", "Uttarkashi"];
         
         var WestBengal = ["Alipurduar", "Bankura", "Birbhum", "Cooch Behar", "Dakshin Dinajpur", "Darjeeling", "Hooghly", "Howrah", "Jalpaiguri", "Jhargram", "Kalimpong", "Kolkata", "Malda", "Murshidabad", "Nadia", "North 24 Parganas", "Paschim Bardhaman", "Paschim Medinipur", "Purba Bardhaman", "Purba Medinipur", "Purulia", "South 24 Parganas", "Uttar Dinajpur"];
         
         var AndamanNicobar = ["Nicobar", "North Middle Andaman", "South Andaman"];
         
         var Chandigarh = ["Chandigarh"];
         
         var DadraHaveli = ["Dadra Nagar Haveli"];
         
         var DamanDiu = ["Daman", "Diu"];
         
         var Delhi = ["Central Delhi", "East Delhi", "New Delhi", "North Delhi", "North East Delhi", "North West Delhi", "Shahdara", "South Delhi", "South East Delhi", "South West Delhi", "West Delhi"];
         
         var Lakshadweep = ["Lakshadweep"];
         
         var Puducherry = ["Karaikal", "Mahe", "Puducherry", "Yanam"];
         $("#inputState").change(function () {
         
             var StateSelected = $(this).val();
         
             var optionsList;
         
             var htmlString = "";
             switch (StateSelected) {
         
                 case "Andhra Pradesh":
         
                     optionsList = AndhraPradesh;
         
                     break;
         
                 case "Arunachal Pradesh":
         
                     optionsList = ArunachalPradesh;
         
                     break;
         
                 case "Assam":
         
                     optionsList = Assam;
         
                     break;
         
                 case "Bihar":
         
                     optionsList = Bihar;
         
                     break;
         
                 case "Chhattisgarh":
         
                     optionsList = Chhattisgarh;
         
                     break;
         
                 case "Goa":
         
                     optionsList = Goa;
         
                     break;
         
                 case "Gujarat":
         
                     optionsList = Gujarat;
         
                     break;
         
                 case "Haryana":
         
                     optionsList = Haryana;
         
                     break;
         
                 case "Himachal Pradesh":
         
                     optionsList = HimachalPradesh;
         
                     break;
         
                 case "Jammu and Kashmir":
         
                     optionsList = JammuKashmir;
         
                     break;
         
                 case "Jharkhand":
         
                     optionsList = Jharkhand;
         
                     break;
         
                 case "Karnataka":
         
                     optionsList = Karnataka;
         
                     break;
         
                 case "Kerala":
         
                     optionsList = Kerala;
         
                     break;
         
                 case "Madya Pradesh":
         
                     optionsList = MadhyaPradesh;
         
                     break;
         
                 case "Maharashtra":
         
                     optionsList = Maharashtra;
         
                     break;
         
                 case "Manipur":
         
                     optionsList = Manipur;
         
                     break;
         
                 case "Meghalaya":
         
                     optionsList = Meghalaya;
         
                     break;
         
                 case "Mizoram":
         
                     optionsList = Mizoram;
         
                     break;
         
                 case "Nagaland":
         
                     optionsList = Nagaland;
         
                     break;
         
                 case "Orissa":
         
                     optionsList = Orissa;
         
                     break;
         
                 case "Punjab":
         
                     optionsList = Punjab;
         
                     break;
         
                 case "Rajasthan":
         
                     optionsList = Rajasthan;
         
                     break;
         
                 case "Sikkim":
         
                     optionsList = Sikkim;
         
                     break;
         
                 case "Tamil Nadu":
         
                     optionsList = TamilNadu;
         
                     break;
         
                 case "Telangana":
         
                     optionsList = Telangana;
         
                     break;
         
                 case "Tripura":
         
                     optionsList = Tripura;
         
                     break;
         
                 case "Uttaranchal":
         
                     optionsList = Uttaranchal;
         
                     break;
         
                 case "Uttar Pradesh":
         
                     optionsList = UttarPradesh;
         
                     break;
         
                 case "West Bengal":
         
                     optionsList = WestBengal;
         
                     break;
         
                 case "Andaman and Nicobar Islands":
         
                     optionsList = AndamanNicobar;
         
                     break;
         
                 case "Chandigarh":
         
                     optionsList = Chandigarh;
         
                     break;
         
                 case "Dadar and Nagar Haveli":
         
                     optionsList = DadraHaveli;
         
                     break;
         
                 case "Daman and Diu":
         
                     optionsList = DamanDiu;
         
                     break;
         
                 case "Delhi":
         
                     optionsList = Delhi;
         
                     break;
         
                 case "Lakshadeep":
         
                     optionsList = Lakshadeep;
         
                     break;
         
                 case "Pondicherry":
         
                     optionsList = Pondicherry;
         
                     break;
         
             }
             for (var i = 0; i < optionsList.length; i++) {
                 htmlString = htmlString + "<option value='" + optionsList[i] + "'>" + optionsList[i] + "</option>";
             }
             $("#inputDistrict").html(htmlString);
         });
      </script>
      <script>
         function addRow2() {
             var count = 1;
             document.querySelector('#content2').insertAdjacentHTML(
                 'afterbegin',
                 `<div class="row" id="row` + count + `">
                 <hr class="mt-3">
                       <div class="clearfix"></div>
                         <div class="col-md-4 form-group mt-3">
                            <label class="mb-2"><strong>Crops Cultivated</strong></label>
                            <input type="text" class="form-control" name="CropsCultivated[]" placeholder="Crops Cultivated ">
                         </div>
                         <div class="col-md-4 form-group mt-3">
                            <label class="mb-2"><strong>Year</strong></label>
                            <select class="form-control" name="Year1[]">
                              <option value="">Select</option>
                              <option value="2015">2015</option>
                              <option value="2016">2016</option>
                              <option value="2017">2017</option>
                              <option value="2018">2018</option>
                              <option value="2019">2019</option>
                              <option value="2020">2020</option>
                              <option value="2021">2021</option>
                              <option value="2022">2022</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                              <option value="2026">2026</option>
                              <option value="2027">2027</option>
                              <option value="2028">2028</option>
                              <option value="2029">2029</option>
                              <option value="2030">2030</option>
                            </select>
                         </div>
                         <div class="col-md-4 form-group mt-3">
                            <label class="mb-2"><strong>Season</strong></label>
                            <input type="text" class="form-control" name="Season[]" placeholder="Season">
                         </div>
                         <div class="col-md-4 form-group mt-3">
                            <label class="mb-2"><strong>Projected Farm Output (MT)</strong></label>
                            <input type="text" class="form-control" name="ProjectFarmOutputMT[]" placeholder="Season">
                         </div>
                         <div class="col-md-4 form-group mt-3">
                            <label class="mb-2"><strong>Commodity Category</strong></label>
                            <select class="form-control" name="CommodityTypes[]">
                               <option value="">Select</option>
                               <option value="Testing">Testing</option>
                            </select>
                         </div>
                         <div class="col-md-4 form-group mt-3">
                            <label class="mb-2"><strong>Commodity Name</strong></label>
                            <input type="text" class="form-control" name="CropName[]" placeholder="Commodity Name">
                         </div>
                         <div class="col-md-4 form-group mt-3">
                            <label class="mb-2"><strong>Area in Ha</strong></label>
                            <input type="text" class="form-control" name="AreainHa[]" placeholder="Area in Ha ">
                         </div>
                         <div class="col-md-4 form-group mt-3">
                            <label class="mb-2"><strong>Variety</strong></label>
                            <input type="text" class="form-control" name="Variety[]" placeholder="Variety">
                         </div>
                         <div class="col-md-4 form-group mt-3">
                            <label class="mb-2"><strong>Irrigation Source</strong></label>
                            <input type="text" class="form-control" name="IrrigationSource[]" placeholder="Irrigation Source ">
                         </div>
                         <input type="button" value="-" class="btn btn-danger" onclick="removeRow2(this)" style="margin-top: 20px;margin-left: 13px;width: 37.13px;">
                      </div>`
             )
         }
         function removeRow2(input) {
             input.parentNode.remove()
         }
      </script>
   </body>
</html>