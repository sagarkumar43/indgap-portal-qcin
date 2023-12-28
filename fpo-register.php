<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
session_start();
error_reporting(0);
if ($_SESSION['FPO_Registration_ID'] != '') {
    header("Location: profile.php");
}
include "connection.php";
if (isset($_POST["FPOExporterName"]) && isset($_POST["Email"]) && isset($_POST["Password"]) && isset($_POST["rePassword"])) {
    $FPOExporterName = mysqli_real_escape_string($db, $_POST["FPOExporterName"]);
    $Address = mysqli_real_escape_string($db, $_POST["Address"]);
    $BlockMandalTaluk = mysqli_real_escape_string($db, $_POST["BlockMandalTaluk"]);
    $District = mysqli_real_escape_string($db, $_POST["District"]);
    $State = mysqli_real_escape_string($db, $_POST["State"]);
    $ContactPerson = mysqli_real_escape_string($db, $_POST["ContactPerson"]);
    $Landline = mysqli_real_escape_string($db, $_POST["Landline"]);
    $Email = mysqli_real_escape_string($db, $_POST["Email"]);
    $YearofFormatation = mysqli_real_escape_string($db, $_POST["YearofFormatation"]);
    $RegistrationCertificate = mysqli_real_escape_string($db, $_POST["RegistrationCertificate"]);
    $NoofFarmersRegistered = mysqli_real_escape_string($db, $_POST["NoofFarmersRegistered"]);
    $Active = mysqli_real_escape_string($db, $_POST["Active"]);
    $Inactive = mysqli_real_escape_string($db, $_POST["Inactive"]);
    $EquitySharecapitalPaidup = mysqli_real_escape_string($db, $_POST["EquitySharecapitalPaidup"]);
    $Year = mysqli_real_escape_string($db, $_POST["Year"]);
    $RsinLakhs = mysqli_real_escape_string($db, $_POST["RsinLakhs"]);
    $PromotingAgencyName = mysqli_real_escape_string($db, $_POST["PromotingAgencyName"]);
    $ContactPersonName = mysqli_real_escape_string($db, $_POST["ContactPersonName"]);
    $EmailId = mysqli_real_escape_string($db, $_POST["EmailId"]);
    $BusinessActivity = mysqli_real_escape_string($db, $_POST["BusinessActivity"]);
    $profile_img = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["profile_img"]["name"];
    $profile_img_tmp = $_FILES['profile_img']['tmp_name'];
    move_uploaded_file($profile_img_tmp,'assets/profile_img/'.$profile_img);
    $unique = rand(1000,9999);
    $unique_code = "AB". $unique;
    if ($_POST["Password"] == $_POST["rePassword"]) {
        $Password = md5(mysqli_real_escape_string($db, $_POST["Password"]));
        $query1 = mysqli_query($db, "SELECT * from fpo_registration where Email  = '$Email' AND DeletedStatus = '0'");
        $rownum = mysqli_num_rows($query1);
        if ($rownum > 0) {
            header("Location:fpo-register.php?msg=failext");
        } else {
            $RegistrationCertificate = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["RegistrationCertificate"]["name"];
            if(strtolower(end(explode(".",$RegistrationCertificate))) =="pdf") {
            move_uploaded_file($_FILES["RegistrationCertificate"]["tmp_name"], "FPORegistrationCertificates/" . $RegistrationCertificate);
            
            $query = mysqli_query($db, "INSERT INTO `fpo_registration` (`FPO_Registration_ID`, `FPO_UniqueCode`,`FPOExporterName`, `Address`, `BlockMandalTaluk`, `District`, `State`, `ContactPerson`, `Landline`, `Email`, `YearofFormatation`, `RegistrationCertificate`, `NoofFarmersRegistered`, `Active`, `Inactive`, `EquitySharecapitalPaidup`, `Year`, `RsinLakhs`, `PromotingAgencyName`, `ContactPersonName`, `EmailId`, `BusinessActivity`, `Password`, `DeletedStatus`, `Account_Status`, `document_standard`, `document_name`, `document_desc`, `Profile_document`, `Profile_Img` ,`CreatedDate`) VALUES (NULL,  '$unique_code' ,'$FPOExporterName' ,'$Address', '$BlockMandalTaluk', '$District', '$State', '$ContactPerson', '$Landline', '$Email', '$YearofFormatation', '$RegistrationCertificate', '$NoofFarmersRegistered', '$Active', '$Inactive', '$EquitySharecapitalPaidup', '$Year', '$RsinLakhs', '$PromotingAgencyName', '$ContactPersonName', '$EmailId', '$BusinessActivity', '$Password', '0', 'Inactive', '', '', '', '', '$profile_img' ,CURRENT_TIMESTAMP);");
            $FPO_Registration_ID = $db->insert_id;
            if ($query) {
                $query2 = mysqli_query($db, "INSERT INTO `fpo_registration_details` (`fpo_registration_detail_id`, `FPO_Registration_ID`, `GrossRevenue_Year`, `GrossRevenue_CropName`, `GrossRevenue_CropVariety`, `GrossRevenue_QuantityMT`, `GrossRevenue_RevenueinLakhs`, `GrossRevenue_MarketPlace`, `GrossRevenue_AveragePricePerMT`, `Warehouse_YearofSetup`, `Warehouse_AreainSqft`, `Warehouse_Capacityinmt`, `Warehouse_OwnedorLeased`, `Warehouse_AccredeationStatus`, `Procesing_Equipment_Activity`, `Procesing_Equipment_Operational_Status`, `Procesing_Equipment_ValueRsinLakhs`, `Procesing_Equipment_Discription`, `Farm_Equipment_Activity`, `Farm_Equipment_OperationalStatus`, `Farm_Equipment_ValueRsinLakhs`, `Farm_Equipment_Discription`, `Credit_Facilities_Availed_Bank`, `Credit_Facilities_Availed_FacilityType`, `Credit_Facilities_Availed_AmountReleasedRs`, `Credit_Facilities_Availed_AmountOutstandingRs`, `Credit_Facilities_Availed_OperationStatusRegularIrregular`, `Market_Linkage_Season`, `Market_Linkage_CropName`, `Market_Linkage_Variety`, `Market_Linkage_Grade`, `Market_Linkage_HarvestMonth`, `Market_Linkage_QuntatySoldinmt`, `Market_Linkage_ProductImage`, `Market_Linkage_ProductDeliveryLocation`, `Market_Linkage_MarketPlace`, `Market_Linkage_FoodSafetyCertificationStatus`, `Market_Linkage_UploadCertificate`, `Market_Linkage_TermandConditions`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$FPO_Registration_ID', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', current_timestamp());");
                for ($i = 0;$i < count($_POST["MobileNo"]);$i++) {
                    $MobileNo = $_POST["MobileNo"][$i];
                    if ($_POST["MobileNo"][$i] != '') {
                        $query1 = mysqli_query($db, "INSERT INTO `fpo_registration_mobileno` (`fpo_registration_mobileno_id`, `FPO_Registration_ID`, `MobileNo`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$FPO_Registration_ID', '$MobileNo', '0', current_timestamp());");
                    }
                }
                for ($j = 0;$j < count($_POST["MobileNumber"]);$j++) {
                    $MobileNumber = $_POST["MobileNumber"][$j];
                    if ($_POST["MobileNumber"][$j] != '') {
                        $query1 = mysqli_query($db, "INSERT INTO `fpo_registration_mobilenumber` (`fpo_registration_mobilenumber_id`, `FPO_Registration_ID`, `MobileNo`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$FPO_Registration_ID', '$MobileNumber', '0', current_timestamp());");
                    }
                }
                for ($k = 0;$k < count($_POST["CropsCultivated"]);$k++) {
                    $CropsCultivated = $_POST["CropsCultivated"][$k];
                    $Year1 = $_POST["Year1"][$k];
                    $Season = $_POST["Season"][$k];
                    $ProjectFarmOutputMT = $_POST["ProjectFarmOutputMT"][$k];
                    $CommodityTypes = $_POST['CommodityTypes'][$k];
                    $CropName = $_POST["CropName"][$k];
                    $AreainHa = $_POST["AreainHa"][$k];
                    $Variety = $_POST["Variety"][$k];
                    $IrrigationSource = $_POST["IrrigationSource"][$k];
                    if ($_POST["CropsCultivated"][$k] != '') {
                        $query1 = mysqli_query($db, "INSERT INTO `fpo_registration_crops_cultivated` (`fpo_registration_crops_cultivated_id`, `FPO_Registration_ID`, `CropsCultivated`, `Year`, `Season`, `ProjectFarmOutputMT`, `CommodityTypes` ,`CropName`, `AreainHa`, `Variety`, `IrrigationSource`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$FPO_Registration_ID', '$CropsCultivated', '$Year1', '$Season', '$ProjectFarmOutputMT', '$CommodityTypes' ,'$CropName', '$AreainHa', '$Variety', '$IrrigationSource', '0', current_timestamp());");
                    }
                }
                header("Location:fpo-register.php?msg=success");
            }else {
                header("Location:fpo-register.php?msg=fail");
            }
                
            }else{
                header("Location:fpo-register.php?msg=failnotpdf");
            }
            
        }
    } else {
        header("Location:fpo-register.php?msg=failpassns");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>FPO Registration</title>
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
   <style>
      .col-md-2 {
         flex: 69 0 auto;
         width: 28.666667%;
         display: flex;
         contain: size;
      }

      .col-sm-10 {
         flex: 0 0 auto;
         width: 77.333333%;
         text-align: -webkit-right;
      }

      .form-control {
         display: block;
         padding: 0.375rem 0.75rem;
         font-size: 1rem;
         font-weight: 400;
         line-height: 1.5;
         color: #212529;
         background-color: #fff;
         background-clip: padding-box;
         border: 1px solid #ced4da;
         -webkit-appearance: none;
         -moz-appearance: none;
         appearance: none;
         border-radius: 0.25rem;
         transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
      }

      .m-relative {
         position: relative;
      }

      .add-btn {
         position: absolute;
         top: 46%;
         bottom: 0px;
         right: 13px;
         background: #3b8a00;
         color: #fff;
         padding: 0px 10px;
         border-top-right-radius: 4px;
         border-bottom-right-radius: 4px;
         font-size: 30px;
         line-height: 35px;
         cursor: pointer;
      }

   </style>
</head>

<body>
   <?php include("main-header.php") ?>
   <main id="main">
      <div class="slider img">
         <img src="assets/img/slide/slider.jpg">
      </div>
      <div class="container register-box mt-5 mb-5">
         <div class="section-title">
            <h2>FPO Registration</h2>
         </div>
         <div class="form-1">
            <?php
                  if ($_GET['msg'] == 'failnotpdf') { ?>
            <center>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="bs-component">
                        <div class="alert alert-dismissible alert-danger" style="width: 50%;">
                           <button class="close" type="button" data-dismiss="alert"
                              style="float: right;">×</button>Registration Certificates is not in PDF format.
                        </div>
                     </div>
                  </div>
               </div>
            </center>
            <?php
                  } 
                  if ($_GET['msg'] == 'failext') { ?>
            <center>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="bs-component">
                        <div class="alert alert-dismissible alert-danger" style="width: 50%;">
                           <button class="close" type="button" data-dismiss="alert"
                              style="float: right;">×</button>Email Id already exist.
                        </div>
                     </div>
                  </div>
               </div>
            </center>
            <?php
                  } 
                  if ($_GET['msg'] == 'failext') { ?>
            <center>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="bs-component">
                        <div class="alert alert-dismissible alert-danger" style="width: 50%;">
                           <button class="close" type="button" data-dismiss="alert"
                              style="float: right;">×</button>Passwords are not same.
                        </div>
                     </div>
                  </div>
               </div>
            </center>
            <?php
                  } 
                  if ($_GET['msg'] == 'fail') { ?>
            <center>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="bs-component">
                        <div class="alert alert-dismissible alert-danger" style="width: 50%;">
                           <button class="close" type="button" data-dismiss="alert" style="float: right;">×</button>FPO
                           Registration not saved.
                        </div>
                     </div>
                  </div>
               </div>
            </center>
            <?php
                  } 
                  if ($_GET['msg'] == 'success') { ?>
            <center>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="bs-component">
                        <div class="alert alert-dismissible alert-success" style="width: 50%;">
                           <button class="close" type="button" data-dismiss="alert" style="float: right;">×</button>FPO
                           Registration successfully saved.
                        </div>
                     </div>
                  </div>
               </div>
            </center>
            <?php
                  } ?>
            <form action="" method="POST" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-4 form-group mt-3">
                     <label for="profile_img" class="mb-2">Upload Profile Image</label>
                     <input type="file" name="profile_img" id="profile_img" class="form-control" accept="image/*" required="">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">FPO/Exporter Name</label>
                     <input type="text" class="form-control" name="FPOExporterName" placeholder="FPO/Exporter Name"
                        required="">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Address</label>
                     <input type="text" class="form-control" name="Address" placeholder="Address">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Block/Mandal/Taluk</label>
                     <input type="text" class="form-control" name="BlockMandalTaluk" placeholder="Block/Mandal/Taluk">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">State</label>
                     <select class="form-control" id="inputState" name="State">
                        <option value="">Select</option>
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
                        <option value="">Select</option>
                     </select>
                  </div>
                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">Contact Person</label>
                     <input type="text" class="form-control" name="ContactPerson" placeholder="Contact Person">
                  </div>
                  <div class="col-md-3 form-group mt-3 m-relative">
                     <a href="javascript:void(0)" style="top: 32px;border-radius: inherit;color: #fff;height: 38px;"
                        class="add-btn" onclick="addRow()">+</a>
                     <label class="mb-2">Mobile No.</label>
                     <input type="tel" maxlength="10" pattern="\d{10}" class="form-control" name="MobileNo[]"
                        placeholder="Mobile No.">
                     <div id="content"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">Land line</label>
                     <input type="tel" class="form-control" name="Landline" placeholder="Land line">
                  </div>
                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">Email</label>
                     <input type="email" class="form-control" name="Email" placeholder="Email" required="">
                  </div>
                  <div class="col-md-6 form-group mt-3">
                     <label class="mb-2">Year of Formatation</label>
                     <select class="form-control" name="YearofFormatation">
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
                  <div class="col-md-6 form-group mt-3">
                     <label class="mb-2">Registration Certificate</label>
                     <input type="file" class="form-control" name="RegistrationCertificate"
                        placeholder="Registration Certificate" required="">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">No of Farmers Registered</label>
                     <input type="text" class="form-control" name="NoofFarmersRegistered"
                        placeholder="No of Farmers registered">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Active</label>
                     <input type="text" class="form-control" name="Active" placeholder="Active ">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Inactive</label>
                     <input type="text" class="form-control" name="Inactive" placeholder="Inactive">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Equity Share capital Paidup</label>
                     <input type="text" class="form-control" name="EquitySharecapitalPaidup"
                        placeholder="Equity Share capital Paidup">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Year</label>
                     <select class="form-control" name="Year">
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
                     <label class="mb-2">Rs in Lakhs</label>
                     <input type="text" class="form-control" name="RsinLakhs" placeholder="Rs in Lakhs">
                  </div>
                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">Promoting Agency Name</label>
                     <input type="text" class="form-control" name="PromotingAgencyName"
                        placeholder="Promoting Agency Name">
                  </div>
                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">Contact Person Name</label>
                     <input type="text" class="form-control" name="ContactPersonName" placeholder="Contact Person Name">
                  </div>
                  <div class="col-md-3 form-group mt-3 m-relative">
                     <a href="javascript:void(0)" style="top: 32px;border-radius: inherit;color: #fff;height: 38px;"
                        class="add-btn" onclick="addRow1()">+</a>
                     <label class="mb-2">Mobile No.</label>
                     <input type="tel" maxlength="10" pattern="\d{10}" class="form-control" name="MobileNumber[]"
                        placeholder="Mobile No.">
                     <div id="content1"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">Email Id</label>
                     <input type="email" class="form-control" name="EmailId" placeholder="Email Id">
                  </div>
                  <div class="col-md-12 form-group mt-3">
                     <label class="mb-2">Business Activity</label>
                     <input type="text" class="form-control" name="BusinessActivity" placeholder="Business Activity">
                     <!-- <select class="form-control" name="BusinessActivity">
                           <option value="">Select</option>
                           <option value="Activity">Activity</option>
                        </select> -->
                  </div>
                  <div class="clearfix" style="margin-top: 22px !important;">
                     <a href="javascript:void(0)"
                        style="position: inherit;top: 40px;border-radius: inherit;color: #fff;height: 38px;"
                        class="add-btn" onclick="addRow2()">+</a>
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Crops Cultivated</label>
                     <input type="text" class="form-control" name="CropsCultivated[]" placeholder="Crops Cultivated ">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Year</label>
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
                     <label class="mb-2">Season</label>
                     <input type="text" class="form-control" name="Season[]" placeholder="Season">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Projected Farm Output (MT)</label>
                     <input type="text" class="form-control" name="ProjectFarmOutputMT[]" placeholder="Season">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Commodity Category</label>
                     <select class="form-control" name="CommodityTypes[]">
                        <option value="">Select Category</option>
                        <?php
                              $cate = "SELECT Category FROM `own_production` GROUP BY Category";
                              $exe = mysqli_query($db,$cate);
                              while($read = mysqli_fetch_assoc($exe))
                              {
                           ?>
                        <option value="<?php echo $read['Category'] ?>">
                           <?php echo $read['Category'] ?>
                        </option>
                        <?php } ?>
                     </select>
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Commodity Name</label>
                     <input type="text" class="form-control" name="CropName[]" placeholder="Commodity Name">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Area in Ha</label>
                     <input type="text" class="form-control" name="AreainHa[]" placeholder="Area in Ha ">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Variety</label>
                     <input type="text" class="form-control" name="Variety[]" placeholder="Variety">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Irrigation Source</label>
                     <input type="text" class="form-control" name="IrrigationSource[]" placeholder="Irrigation Source ">
                  </div>
                  <div id="content2"></div>
                  <div class="col-md-6 form-group mt-3">
                     <label class="mb-2">Password</label>
                     <input type="password" class="form-control" name="Password" placeholder="Password" required="">
                  </div>
                  <div class="col-md-6 form-group mt-3">
                     <label class="mb-2">Re-Password</label>
                     <input type="password" class="form-control" name="rePassword" placeholder="Re-Password"
                        required="">
                  </div>
                  <div class="clearfix"></div>
               </div>
               <div class="text-right pt-4">
                  <span class=""><a href="fpo-login.php" class="forgot-pass" style="color: #1e4681;">FPO
                        Login</a></span>
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
   <?php include "footer.php";?>
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
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
   <script type="text/javascript">
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

      function addRow() {
         document.querySelector('#content').insertAdjacentHTML(
            'afterbegin',
            `<div class="col-md-3 form-group mt-3 m-relative">
                           <a href="javascript:void(0)" style="width: 37.13px;left: 254px;right: 0px;background: red;top: 0px;border-radius: inherit;color: #fff;height: 38px;" class="add-btn" onclick="removeRow(this)">-</a>
                           <input style="width: 257px;" type="tel" maxlength="10" pattern="\d{10}" class="form-control" name="MobileNo[]" placeholder="Mobile No.">
                        </div>`
         )
      }

      function removeRow(input) {
         input.parentNode.remove()
      }

      function addRow1() {
         document.querySelector('#content1').insertAdjacentHTML(
            'afterbegin',
            `<div class="col-md-3 form-group mt-3 m-relative">
                           <a href="javascript:void(0)" style="width: 37.13px;left: 254px;right: 0px;background: red;top: 0px;border-radius: inherit;color: #fff;height: 38px;" class="add-btn" onclick="removeRow1(this)">-</a>
                           <input style="width: 257px;" type="tel" maxlength="10" pattern="\d{10}" class="form-control" name="MobileNumber[]" placeholder="Mobile No.">
                        </div>`
         )
      }

      function removeRow1(input) {
         input.parentNode.remove()
      }

      function addRow2() {
         document.querySelector('#content2').insertAdjacentHTML(
            'afterbegin',
            `<div class="row"><a href="javascript:void(0)" style="margin-top: 20px;
         margin-left: 13px;position: inherit;width: 37.13px;left: 254px;right: 0px;background: red;top: 0px;border-radius: inherit;color: #fff;height: 38px;" class="add-btn" onclick="removeRow2(this)">-</a>      <div class="clearfix">
                        
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Crops Cultivated</label>
                           <input type="text" class="form-control" name="CropsCultivated[]" placeholder="Crops Cultivated ">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Year</label>
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
                           <label class="mb-2">Season</label>
                           <input type="text" class="form-control" name="Season[]" placeholder="Season">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Projected Farm Output (MT)</label>
                           <input type="text" class="form-control" name="ProjectFarmOutputMT[]" placeholder="Season">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Commodity Category</label>
                           <select class="form-control" name="CommodityTypes[]">
                              <option value="">Select</option>
                              <?php
                              $cate = "SELECT Category FROM `own_production` GROUP BY Category";
                              $exe = mysqli_query($db,$cate);
                              while($read = mysqli_fetch_assoc($exe))
                              {
                           ?>
                           <option value="<?php echo $read['Category'] ?>"><?php echo $read['Category'] ?></option>
                           <?php } ?>
                           </select>
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Commodity Name</label>
                           <input type="text" class="form-control" name="CropName[]" placeholder="Commodity Name">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Area in Ha</label>
                           <input type="text" class="form-control" name="AreainHa[]" placeholder="Area in Ha ">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Variety</label>
                           <input type="text" class="form-control" name="Variety[]" placeholder="Variety">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Irrigation Source</label>
                           <input type="text" class="form-control" name="IrrigationSource[]" placeholder="Irrigation Source ">
                        </div>
                     </div>`
         )
      }

      function removeRow2(input) {
         input.parentNode.remove()
      }
   </script>
  
</body>

</html>