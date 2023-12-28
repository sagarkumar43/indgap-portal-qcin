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

if (isset($_POST["FPOName"]) && isset($_POST["Email"]) && isset($_POST["Password"])) {

    $FPOName = mysqli_real_escape_string($db, $_POST["FPOName"]);

    $FPOAddress = mysqli_real_escape_string($db, $_POST["FPOAddress"]);

    $State = mysqli_real_escape_string($db, $_POST["State"]);

    $District = mysqli_real_escape_string($db, $_POST["District"]);

    $ContactPerson = mysqli_real_escape_string($db, $_POST["ContactPerson"]);

    $ContactNo = mysqli_real_escape_string($db, $_POST["ContactNo"]);

    $Email = mysqli_real_escape_string($db, $_POST["Email"]);

    $RegistrationDate = mysqli_real_escape_string($db, $_POST["RegistrationDate"]);

    $NoofFarmer = mysqli_real_escape_string($db, $_POST["NoofFarmer"]);

    $TotalLandHAWithFPOfarmers = mysqli_real_escape_string($db, $_POST["TotalLandHAWithFPOfarmers"]);

    $PaidupShareCapital = mysqli_real_escape_string($db, $_POST["PaidupShareCapital"]);

    $PromotingAgency = mysqli_real_escape_string($db, $_POST["PromotingAgency"]);

    $BussinessActivity = mysqli_real_escape_string($db, $_POST["BussinessActivity"]);

    $TotalIrrigatedArea = mysqli_real_escape_string($db, $_POST["TotalIrrigatedArea"]);

    $CropType = mysqli_real_escape_string($db, $_POST["CropType"]);

    $MajorCropName = mysqli_real_escape_string($db, $_POST["MajorCropName"]);

    $YearofTurnoverRs = mysqli_real_escape_string($db, $_POST["YearofTurnoverRs"]);

    $TurnoverRs = mysqli_real_escape_string($db, $_POST["TurnoverRs"]);

    $FixedInfrastructureBuildings = mysqli_real_escape_string($db, $_POST["FixedInfrastructureBuildings"]);

    $Plantandmachinery = mysqli_real_escape_string($db, $_POST["Plantandmachinery"]);

    $Others = mysqli_real_escape_string($db, $_POST["Others"]);

    $WarehouseFaclity = mysqli_real_escape_string($db, $_POST["WarehouseFaclity"]);

    $WarehouseFaclityDescription = mysqli_real_escape_string($db, $_POST["WarehouseFaclityDescription"]);

    $WarehouseFacilityYearofConstruction = mysqli_real_escape_string($db, $_POST["WarehouseFacilityYearofConstruction"]);

    $WarehouseFacilityLocation = mysqli_real_escape_string($db, $_POST["WarehouseFacilityLocation"]);

    $WarehouseFacilityLocationAreainsqft = mysqli_real_escape_string($db, $_POST["WarehouseFacilityLocationAreainsqft"]);

    $Lenght = mysqli_real_escape_string($db, $_POST["Lenght"]);

    $Width = mysqli_real_escape_string($db, $_POST["Width"]);

    $Depth = mysqli_real_escape_string($db, $_POST["Depth"]);

    $ProduceStored = mysqli_real_escape_string($db, $_POST["ProduceStored"]);

    $Capacity = mysqli_real_escape_string($db, $_POST["Capacity"]);

    $PresentStatus = mysqli_real_escape_string($db, $_POST["PresentStatus"]);

    $ProcessingEquipment = mysqli_real_escape_string($db, $_POST["ProcessingEquipment"]);

    $DescriptionofEquipment = mysqli_real_escape_string($db, $_POST["DescriptionofEquipment"]);

    $YearofPurchaseEquipment = mysqli_real_escape_string($db, $_POST["YearofPurchaseEquipment"]);

    $ProcessingActivityofEquipment = mysqli_real_escape_string($db, $_POST["ProcessingActivityofEquipment"]);

    $Capacity1 = mysqli_real_escape_string($db, $_POST["Capacity1"]);

    $DescriptionofOutputEquipment = mysqli_real_escape_string($db, $_POST["DescriptionofOutputEquipment"]);

    $PresentStatus1 = mysqli_real_escape_string($db, $_POST["PresentStatus1"]);

    $FarmEquipment = mysqli_real_escape_string($db, $_POST["FarmEquipment"]);

    $DescriptionofEquipmentFarm = mysqli_real_escape_string($db, $_POST["DescriptionofEquipmentFarm"]);

    $YearofPurchaseEquipmentFarm = mysqli_real_escape_string($db, $_POST["YearofPurchaseEquipmentFarm"]);

    $ActivityofFarm = mysqli_real_escape_string($db, $_POST["ActivityofFarm"]);

    $PresentStatus2 = mysqli_real_escape_string($db, $_POST["PresentStatus2"]);

    $SalesHistory = mysqli_real_escape_string($db, $_POST["SalesHistory"]);

    $Year = mysqli_real_escape_string($db, $_POST["Year"]);

    $CropName = mysqli_real_escape_string($db, $_POST["CropName"]);

    $ProduceVariety = mysqli_real_escape_string($db, $_POST["ProduceVariety"]);

    $Grade = mysqli_real_escape_string($db, $_POST["Grade"]);

    $QtyinMT = mysqli_real_escape_string($db, $_POST["QtyinMT"]);

    $ValuesRsinLakhs = mysqli_real_escape_string($db, $_POST["ValuesRsinLakhs"]);

    $MarketPlace = mysqli_real_escape_string($db, $_POST["MarketPlace"]);

    $CustomerList = mysqli_real_escape_string($db, $_POST["CustomerList"]);

    $AveragePriceperMT = mysqli_real_escape_string($db, $_POST["AveragePriceperMT"]);

    $CollectionCenterorWarehouse = mysqli_real_escape_string($db, $_POST["CollectionCenterorWarehouse"]);

    $Storagetype = mysqli_real_escape_string($db, $_POST["Storagetype"]);

    $Password = md5(mysqli_real_escape_string($db, $_POST["Password"]));

    $query1 = mysqli_query($db, "SELECT * from fpo_registration where Email  = '$Email' AND DeletedStatus = '0'");

    $rownum = mysqli_num_rows($query1);

    if($rownum > 0){
        header("Location:fpo-register.php?msg=failext");
    }else{

        $RegistrationCertificates = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["RegistrationCertificates"]["name"];
if(strtolower(end(explode(".",$RegistrationCertificates))) =="pdf") {
    move_uploaded_file($_FILES["RegistrationCertificates"]["tmp_name"], "FPORegistrationCertificates/" . $RegistrationCertificates);
}
        $query = mysqli_query($db, "INSERT INTO `fpo_registration` (`Cluster_Registration_ID`, `FPOName`, `FPOAddress`, `State`, `District`, `ContactPerson`, `ContactNo`, `Email`, `RegistrationCertificates`, `RegistrationDate`, `NoofFarmer`, `TotalLandHAWithFPOfarmers`, `PaidupShareCapital`, `PromotingAgency`, `BussinessActivity`, `TotalIrrigatedArea`, `CropType`, `MajorCropName`, `YearofTurnoverRs`, `TurnoverRs`, `FixedInfrastructureBuildings`, `Plantandmachinery`, `Others`, `WarehouseFaclity`, `WarehouseFaclityDescription`, `WarehouseFacilityYearofConstruction`, `WarehouseFacilityLocation`, `WarehouseFacilityLocationAreainsqft`, `Lenght`, `Width`, `Depth`, `ProduceStored`, `Capacity`, `PresentStatus`, `ProcessingEquipment`, `DescriptionofEquipment`, `YearofPurchaseEquipment`, `ProcessingActivityofEquipment`, `Capacity1`, `DescriptionofOutputEquipment`, `PresentStatus1`, `FarmEquipment`, `DescriptionofEquipmentFarm`, `YearofPurchaseEquipmentFarm`, `ActivityofFarm`, `PresentStatus2`, `SalesHistory`, `Year`, `CropName`, `ProduceVariety`, `Grade`, `QtyinMT`, `ValuesRsinLakhs`, `MarketPlace`, `CustomerList`, `AveragePriceperMT`, `CollectionCenterorWarehouse`, `Storagetype`, `Password`, `DeletedStatus`, `UpdatedDate`, `CreatedDate`) VALUES (NULL, '$FPOName', '$FPOAddress', '$State', '$District', '$ContactPerson', '$ContactNo', '$Email', '$RegistrationCertificates', '$RegistrationDate', '$NoofFarmer', '$TotalLandHAWithFPOfarmers', '$PaidupShareCapital', '$PromotingAgency', '$BussinessActivity', '$TotalIrrigatedArea', '$CropType', '$MajorCropName', '$YearofTurnoverRs', '$TurnoverRs', '$FixedInfrastructureBuildings', '$Plantandmachinery', '$Others', '$WarehouseFaclity', '$WarehouseFaclityDescription', '$WarehouseFacilityYearofConstruction', '$WarehouseFacilityLocation', '$WarehouseFacilityLocationAreainsqft', '$Lenght', '$Width', '$Depth', '$ProduceStored', '$Capacity', '$PresentStatus', '$ProcessingEquipment', '$DescriptionofEquipment', '$YearofPurchaseEquipment', '$ProcessingActivityofEquipment', '$Capacity1', '$DescriptionofOutputEquipment', '$PresentStatus1', '$FarmEquipment', '$DescriptionofEquipmentFarm', '$YearofPurchaseEquipmentFarm', '$ActivityofFarm', '$PresentStatus2', '$SalesHistory', '$Year', '$CropName', '$ProduceVariety', '$Grade', '$QtyinMT', '$ValuesRsinLakhs', '$MarketPlace', '$CustomerList', '$AveragePriceperMT', '$CollectionCenterorWarehouse', '$Storagetype', '$Password', '0', '', current_timestamp());");

        if ($query) {

            header("Location:fpo-register.php?msg=success");

        } else {

            header("Location:fpo-register.php?msg=fail");

        }

    }

} 

?>

<!DOCTYPE html>

<html lang="en">

   <head>

      <meta charset="utf-8">

      <meta content="width=device-width, initial-scale=1.0" name="viewport">

      <title>Registration</title>

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

         transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;

         }

         /* *, ::after, ::before {

         box-sizing: border-box;

         margin: 2px;

         } */
         .m-relative {
            position:relative;
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

      <main id="main">

         <div class="slider img">

            <img src="assets/img/slide/slider.jpg">

         </div>

         <div class="container register-box mt-5 mb-5">

            <div class="section-title">

               <h2>Registration</h2>

            </div>

            <div class="form-1">

               <?php

                                 $msg = $_GET['msg'];

                                 if($msg == 'failext'){?>

                              <center><div class="row">

                                 <div class="col-lg-12">

                                    <div class="bs-component">

                                       <div class="alert alert-dismissible alert-danger" style="width: 50%;">

                                          <button class="close" type="button" data-dismiss="alert" style="float: right;">×</button>Email Id already exist.

                                       </div>

                                    </div>

                                 </div>

                              </div></center>

                              <?php } ?>

                              <?php

                                 $msg = $_GET['msg'];

                                 if($msg == 'fail'){?>

                              <center><div class="row">

                                 <div class="col-lg-12">

                                    <div class="bs-component">

                                       <div class="alert alert-dismissible alert-danger" style="width: 50%;">

                                          <button class="close" type="button" data-dismiss="alert" style="float: right;">×</button>Registration not saved.

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

                                          <button class="close" type="button" data-dismiss="alert" style="float: right;">×</button>Registration successfully saved.

                                       </div>

                                    </div>

                                 </div>

                              </div></center>

                              <?php } ?>

               <form action="" method="POST" enctype="multipart/form-data">

                  <div class="row">

                     <div class="col-md-6 form-group mt-3">

                        <label class="mb-2">FPO/Exporter Name</label>

                        <input type="text" class="form-control" name="FPOName" placeholder="FPO/Exporter Name" required="">

                     </div>

                     <div class="col-md-6 form-group mt-3">

                        <label class="mb-2">Address</label>

                        <input type="text" class="form-control" name="FPOAddress" placeholder="Address">

                     </div>

                     <div class="col-md-4 form-group mt-3">

                        <label class="mb-2">Block/Mandal/Taluk</label>

                        <input type="text" class="form-control" name="FPOAddress" placeholder="Block/Mandal/Taluk">

                     </div>

                     <div class="col-md-4 form-group mt-3">

                        <label class="mb-2">District</label>

                        <select name="District" class="form-control" id="inputDistrict">

                           <option value="">Select District</option>

                        </select>

                     </div>

                     <div class="col-md-4 form-group mt-3">

                        <label class="mb-2">State</label>

                        <select class="form-control" id="inputState" name="State" required="">

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

                     

                     <div class="col-md-3 form-group mt-3">

                        <label class="mb-2">Contact Person</label>

                        <input type="text" class="form-control" name="ContactPerson" placeholder="Contact Person">

                     </div>

                     

                     <div class="col-md-3 form-group mt-3 m-relative">
                         <div class="add-btn">+</div>           
                        <label class="mb-2">Mobile No. </label>

                        <input type="tel" class="form-control" name="ContactNo" placeholder="Mobile No.">

                     </div>

                     <div class="col-md-3 form-group mt-3">

                        <label class="mb-2">Land line </label>

                        <input type="tel" class="form-control" name="ContactNo" placeholder="Land line">

                     </div>

                     <div class="col-md-3 form-group mt-3">

                        <label class="mb-2">Email</label>

                        <input type="email" class="form-control" name="Email" placeholder="Email">

                     </div>
                                  
                     <div class="col-md-6 form-group mt-3">

                        <label class="mb-2">Year of Formatation  </label>

                        <input type="text" class="form-control" name="ContactNo" placeholder="Year of Formatation ">

                     </div>

                     <div class="col-md-6 form-group mt-3">

                        <label class="mb-2">Registration Certificate</label>

                        <input type="file" class="form-control" name="ContactNo" placeholder="Registration Certificate">

                     </div>
                     
                     <div class="col-md-4 form-group mt-3">

                        <label class="mb-2">No of Farmers Registered</label>

                        <input type="text" class="form-control" name="ContactNo" placeholder="No of Farmers registered">

                     </div>

                     <div class="col-md-4 form-group mt-3">

                        <label class="mb-2">Active </label>

                        <input type="text" class="form-control" name="ContactNo" placeholder="Active ">

                     </div>

                     <div class="col-md-4 form-group mt-3">

                        <label class="mb-2">Inactive</label>

                        <input type="text" class="form-control" name="ContactNo" placeholder="Inactive">

                     </div>

                     <div class="col-md-4 form-group mt-3">

                        <label class="mb-2">Equity Share capital Paidup</label>

                        <input type="text" class="form-control" name="ContactNo" placeholder="Equity Share capital Paidup">

                     </div>

                     <div class="col-md-4 form-group mt-3">

                        <label class="mb-2">Year</label>

                        <input type="text" class="form-control" name="ContactNo" placeholder="Year">

                     </div>

                     <div class="col-md-4 form-group mt-3">

                        <label class="mb-2">Rs in Lakhs</label>

                        <input type="text" class="form-control" name="ContactNo" placeholder="Rs in Lakhs">

                     </div>

                     <div class="col-md-3 form-group mt-3">

                        <label class="mb-2">Promoting Agency Name</label>

                        <input type="text" class="form-control" name="ContactNo" placeholder="Promoting Agency Name">

                     </div>

                     <div class="col-md-3 form-group mt-3">

                        <label class="mb-2">Contact Person Name</label>

                        <input type="text" class="form-control" name="ContactNo" placeholder="Contact Person Name">

                     </div>

                     <div class="col-md-3 form-group mt-3 m-relative">
                     <div class="add-btn">+</div>
                        <label class="mb-2">Mobile No.</label>

                        <input type="text" class="form-control" name="ContactNo" placeholder="Mobile No.">

                     </div>

                     <div class="col-md-3 form-group mt-3">

                        <label class="mb-2">Email Id</label>

                        <input type="text" class="form-control" name="ContactNo" placeholder="Email Id">

                     </div>

                     <div class="col-md-12 form-group mt-3">

                        <label class="mb-2">Business Activity</label>
                        <select class="form-control">
                           <option>Select</option>
                           <option>Activity</option>
                                 </select>
                     </div>
                                    <div class="clearfix"></div>
                     <div class="col-md-4 form-group mt-3">

                        <label class="mb-2">Crops Cultivated </label>

                        <input type="text" class="form-control" name="ContactNo" placeholder="Crops Cultivated ">

                     </div>

                     <div class="col-md-4 form-group mt-3">

                        <label class="mb-2">Year  </label>

                        <input type="text" class="form-control" name="ContactNo" placeholder="Year">

                     </div>

                     <div class="col-md-4 form-group mt-3">

                        <label class="mb-2">Season  </label>

                        <input type="text" class="form-control" name="ContactNo" placeholder="Season">

                     </div>

                     <div class="col-md-4 form-group mt-3">

                        <label class="mb-2">Project Farm Output (MT)  </label>

                        <input type="text" class="form-control" name="ContactNo" placeholder="Season">

                     </div>

                     <div class="col-md-4 form-group mt-3">

                        <label class="mb-2">Crop Name </label>

                        <input type="text" class="form-control" name="ContactNo" placeholder="Crop Name">

                     </div>

                     <div class="col-md-4 form-group mt-3">

                        <label class="mb-2">Area in Ha </label>

                        <input type="text" class="form-control" name="ContactNo" placeholder="Area in Ha ">

                     </div>

                     <div class="col-md-4 form-group mt-3">

                        <label class="mb-2">Variety </label>

                        <input type="text" class="form-control" name="ContactNo" placeholder="Variety">

                     </div>

                     <div class="col-md-4 form-group mt-3">

                        <label class="mb-2">Irrigation Source </label>

                        <input type="text" class="form-control" name="ContactNo" placeholder="Irrigation Source ">

                     </div>


                     <div class="col-md-6 form-group mt-3">

                        <label class="mb-2">Password</label>

                        <input type="password" class="form-control" name="Password" placeholder="Password">

                     </div>


                     <div class="col-md-6 form-group mt-3">

                        <label class="mb-2">Re-Password</label>

                        <input type="password" class="form-control" name="Password" placeholder="Re-Password">

                     </div>

                    

                     

                     <div class="clearfix"></div>

                  </div>

                  <div class="text-right pt-4">

                      <span class=""><a href="fpo-login.php" class="forgot-pass" style="color: #1e4681;">FPO Login</a></span>  

                     <button type="reset" class="btn btn-danger">Cancel</button>

                     <button type="submit" class="btn btn-success">Submit</button>

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

      </main>

      <!-- End #main -->

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

      </footer>

      <!-- End Footer -->

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

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

      <script type="text/javascript">

         var AndhraPradesh = ["Anantapur","Chittoor","East Godavari","Guntur","Kadapa","Krishna","Kurnool","Prakasam","Nellore","Srikakulam","Visakhapatnam","Vizianagaram","West Godavari"];

         var ArunachalPradesh = ["Anjaw","Changlang","Dibang Valley","East Kameng","East Siang","Kra Daadi","Kurung Kumey","Lohit","Longding","Lower Dibang Valley","Lower Subansiri","Namsai","Papum Pare","Siang","Tawang","Tirap","Upper Siang","Upper Subansiri","West Kameng","West Siang","Itanagar"];

         var Assam = ["Baksa","Barpeta","Biswanath","Bongaigaon","Cachar","Charaideo","Chirang","Darrang","Dhemaji","Dhubri","Dibrugarh","Goalpara","Golaghat","Hailakandi","Hojai","Jorhat","Kamrup Metropolitan","Kamrup (Rural)","Karbi Anglong","Karimganj","Kokrajhar","Lakhimpur","Majuli","Morigaon","Nagaon","Nalbari","Dima Hasao","Sivasagar","Sonitpur","South Salmara Mankachar","Tinsukia","Udalguri","West Karbi Anglong"];

         var Bihar = ["Araria","Arwal","Aurangabad","Banka","Begusarai","Bhagalpur","Bhojpur","Buxar","Darbhanga","East Champaran","Gaya","Gopalganj","Jamui","Jehanabad","Kaimur","Katihar","Khagaria","Kishanganj","Lakhisarai","Madhepura","Madhubani","Munger","Muzaffarpur","Nalanda","Nawada","Patna","Purnia","Rohtas","Saharsa","Samastipur","Saran","Sheikhpura","Sheohar","Sitamarhi","Siwan","Supaul","Vaishali","West Champaran"];

         var Chhattisgarh = ["Balod","Baloda Bazar","Balrampur","Bastar","Bemetara","Bijapur","Bilaspur","Dantewada","Dhamtari","Durg","Gariaband","Janjgir Champa","Jashpur","Kabirdham","Kanker","Kondagaon","Korba","Koriya","Mahasamund","Mungeli","Narayanpur","Raigarh","Raipur","Rajnandgaon","Sukma","Surajpur","Surguja"];

         var Goa = ["North Goa","South Goa"];

         var Gujarat = ["Ahmedabad","Amreli","Anand","Aravalli","Banaskantha","Bharuch","Bhavnagar","Botad","Chhota Udaipur","Dahod","Dang","Devbhoomi Dwarka","Gandhinagar","Gir Somnath","Jamnagar","Junagadh","Kheda","Kutch","Mahisagar","Mehsana","Morbi","Narmada","Navsari","Panchmahal","Patan","Porbandar","Rajkot","Sabarkantha","Surat","Surendranagar","Tapi","Vadodara","Valsad"];

         var Haryana = ["Ambala","Bhiwani","Charkhi Dadri","Faridabad","Fatehabad","Gurugram","Hisar","Jhajjar","Jind","Kaithal","Karnal","Kurukshetra","Mahendragarh","Mewat","Palwal","Panchkula","Panipat","Rewari","Rohtak","Sirsa","Sonipat","Yamunanagar"];

         var HimachalPradesh = ["Bilaspur","Chamba","Hamirpur","Kangra","Kinnaur","Kullu","Lahaul Spiti","Mandi","Shimla","Sirmaur","Solan","Una"];

         var JammuKashmir = ["Anantnag","Bandipora","Baramulla","Budgam","Doda","Ganderbal","Jammu","Kargil","Kathua","Kishtwar","Kulgam","Kupwara","Leh","Poonch","Pulwama","Rajouri","Ramban","Reasi","Samba","Shopian","Srinagar","Udhampur"];

         var Jharkhand = ["Bokaro","Chatra","Deoghar","Dhanbad","Dumka","East Singhbhum","Garhwa","Giridih","Godda","Gumla","Hazaribagh","Jamtara","Khunti","Koderma","Latehar","Lohardaga","Pakur","Palamu","Ramgarh","Ranchi","Sahebganj","Seraikela Kharsawan","Simdega","West Singhbhum"];

         var Karnataka = ["Bagalkot","Bangalore Rural","Bangalore Urban","Belgaum","Bellary","Bidar","Vijayapura","Chamarajanagar","Chikkaballapur","Chikkamagaluru","Chitradurga","Dakshina Kannada","Davanagere","Dharwad","Gadag","Gulbarga","Hassan","Haveri","Kodagu","Kolar","Koppal","Mandya","Mysore","Raichur","Ramanagara","Shimoga","Tumkur","Udupi","Uttara Kannada","Yadgir"];

         var Kerala = ["Alappuzha","Ernakulam","Idukki","Kannur","Kasaragod","Kollam","Kottayam","Kozhikode","Malappuram","Palakkad","Pathanamthitta","Thiruvananthapuram","Thrissur","Wayanad"];

         var MadhyaPradesh = ["Agar Malwa","Alirajpur","Anuppur","Ashoknagar","Balaghat","Barwani","Betul","Bhind","Bhopal","Burhanpur","Chhatarpur","Chhindwara","Damoh","Datia","Dewas","Dhar","Dindori","Guna","Gwalior","Harda","Hoshangabad","Indore","Jabalpur","Jhabua","Katni","Khandwa","Khargone","Mandla","Mandsaur","Morena","Narsinghpur","Neemuch","Panna","Raisen","Rajgarh","Ratlam","Rewa","Sagar","Satna",

         "Sehore","Seoni","Shahdol","Shajapur","Sheopur","Shivpuri","Sidhi","Singrauli","Tikamgarh","Ujjain","Umaria","Vidisha"];

         var Maharashtra = ["Ahmednagar","Akola","Amravati","Aurangabad","Beed","Bhandara","Buldhana","Chandrapur","Dhule","Gadchiroli","Gondia","Hingoli","Jalgaon","Jalna","Kolhapur","Latur","Mumbai City","Mumbai Suburban","Nagpur","Nanded","Nandurbar","Nashik","Osmanabad","Palghar","Parbhani","Pune","Raigad","Ratnagiri","Sangli","Satara","Sindhudurg","Solapur","Thane","Wardha","Washim","Yavatmal"];

         var Manipur = ["Bishnupur","Chandel","Churachandpur","Imphal East","Imphal West","Jiribam","Kakching","Kamjong","Kangpokpi","Noney","Pherzawl","Senapati","Tamenglong","Tengnoupal","Thoubal","Ukhrul"];

         var Meghalaya = ["East Garo Hills","East Jaintia Hills","East Khasi Hills","North Garo Hills","Ri Bhoi","South Garo Hills","South West Garo Hills","South West Khasi Hills","West Garo Hills","West Jaintia Hills","West Khasi Hills"];

         var Mizoram = ["Aizawl","Champhai","Kolasib","Lawngtlai","Lunglei","Mamit","Saiha","Serchhip","Aizawl","Champhai","Kolasib","Lawngtlai","Lunglei","Mamit","Saiha","Serchhip"];

         var Nagaland = ["Dimapur","Kiphire","Kohima","Longleng","Mokokchung","Mon","Peren","Phek","Tuensang","Wokha","Zunheboto"];

         var Odisha = ["Angul","Balangir","Balasore","Bargarh","Bhadrak","Boudh","Cuttack","Debagarh","Dhenkanal","Gajapati","Ganjam","Jagatsinghpur","Jajpur","Jharsuguda","Kalahandi","Kandhamal","Kendrapara","Kendujhar","Khordha","Koraput","Malkangiri","Mayurbhanj","Nabarangpur","Nayagarh","Nuapada","Puri","Rayagada","Sambalpur","Subarnapur","Sundergarh"];

         var Punjab = ["Amritsar","Barnala","Bathinda","Faridkot","Fatehgarh Sahib","Fazilka","Firozpur","Gurdaspur","Hoshiarpur","Jalandhar","Kapurthala","Ludhiana","Mansa","Moga","Mohali","Muktsar","Pathankot","Patiala","Rupnagar","Sangrur","Shaheed Bhagat Singh Nagar","Tarn Taran"];

         var Rajasthan = ["Ajmer","Alwar","Banswara","Baran","Barmer","Bharatpur","Bhilwara","Bikaner","Bundi","Chittorgarh","Churu","Dausa","Dholpur","Dungarpur","Ganganagar","Hanumangarh","Jaipur","Jaisalmer","Jalore","Jhalawar","Jhunjhunu","Jodhpur","Karauli","Kota","Nagaur","Pali","Pratapgarh","Rajsamand","Sawai Madhopur","Sikar","Sirohi","Tonk","Udaipur"];

         var Sikkim = ["East Sikkim","North Sikkim","South Sikkim","West Sikkim"];

         var TamilNadu = ["Ariyalur","Chennai","Coimbatore","Cuddalore","Dharmapuri","Dindigul","Erode","Kanchipuram","Kanyakumari","Karur","Krishnagiri","Madurai","Nagapattinam","Namakkal","Nilgiris","Perambalur","Pudukkottai","Ramanathapuram","Salem","Sivaganga","Thanjavur","Theni","Thoothukudi","Tiruchirappalli","Tirunelveli","Tiruppur","Tiruvallur","Tiruvannamalai","Tiruvarur","Vellore","Viluppuram","Virudhunagar"];

         var Telangana = ["Adilabad","Bhadradri Kothagudem","Hyderabad","Jagtial","Jangaon","Jayashankar","Jogulamba","Kamareddy","Karimnagar","Khammam","Komaram Bheem","Mahabubabad","Mahbubnagar","Mancherial","Medak","Medchal","Nagarkurnool","Nalgonda","Nirmal","Nizamabad","Peddapalli","Rajanna Sircilla","Ranga Reddy","Sangareddy","Siddipet","Suryapet","Vikarabad","Wanaparthy","Warangal Rural","Warangal Urban","Yadadri Bhuvanagiri"];

         var Tripura = ["Dhalai","Gomati","Khowai","North Tripura","Sepahijala","South Tripura","Unakoti","West Tripura"];

         var UttarPradesh = ["Agra","Aligarh","Allahabad","Ambedkar Nagar","Amethi","Amroha","Auraiya","Azamgarh","Baghpat","Bahraich","Ballia","Balrampur","Banda","Barabanki","Bareilly","Basti","Bhadohi","Bijnor","Budaun","Bulandshahr","Chandauli","Chitrakoot","Deoria","Etah","Etawah","Faizabad","Farrukhabad","Fatehpur","Firozabad","Gautam Buddha Nagar","Ghaziabad","Ghazipur","Gonda","Gorakhpur","Hamirpur","Hapur","Hardoi","Hathras","Jalaun","Jaunpur","Jhansi","Kannauj","Kanpur Dehat","Kanpur Nagar","Kasganj","Kaushambi","Kheri","Kushinagar","Lalitpur","Lucknow","Maharajganj","Mahoba","Mainpuri","Mathura","Mau","Meerut","Mirzapur","Moradabad","Muzaffarnagar","Pilibhit","Pratapgarh","Raebareli","Rampur","Saharanpur","Sambhal","Sant Kabir Nagar","Shahjahanpur","Shamli","Shravasti","Siddharthnagar","Sitapur","Sonbhadra","Sultanpur","Unnao","Varanasi"];

         var Uttarakhand  = ["Almora","Bageshwar","Chamoli","Champawat","Dehradun","Haridwar","Nainital","Pauri","Pithoragarh","Rudraprayag","Tehri","Udham Singh Nagar","Uttarkashi"];

         var WestBengal = ["Alipurduar","Bankura","Birbhum","Cooch Behar","Dakshin Dinajpur","Darjeeling","Hooghly","Howrah","Jalpaiguri","Jhargram","Kalimpong","Kolkata","Malda","Murshidabad","Nadia","North 24 Parganas","Paschim Bardhaman","Paschim Medinipur","Purba Bardhaman","Purba Medinipur","Purulia","South 24 Parganas","Uttar Dinajpur"];

         var AndamanNicobar = ["Nicobar","North Middle Andaman","South Andaman"];

         var Chandigarh = ["Chandigarh"];

         var DadraHaveli = ["Dadra Nagar Haveli"];

         var DamanDiu = ["Daman","Diu"];

         var Delhi = ["Central Delhi","East Delhi","New Delhi","North Delhi","North East Delhi","North West Delhi","Shahdara","South Delhi","South East Delhi","South West Delhi","West Delhi"];

         var Lakshadweep = ["Lakshadweep"];

         var Puducherry = ["Karaikal","Mahe","Puducherry","Yanam"];

         

         

         $("#inputState").change(function(){

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

         case  "Gujarat":

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

         case  "Karnataka":

           optionsList = Karnataka;

           break;

         case "Kerala":

           optionsList = Kerala;

           break;

         case  "Madya Pradesh":

           optionsList = MadhyaPradesh;

           break;

         case "Maharashtra":

           optionsList = Maharashtra;

           break;

         case  "Manipur":

           optionsList = Manipur;

           break;

         case "Meghalaya":

           optionsList = Meghalaya ;

           break;

         case  "Mizoram":

           optionsList = Mizoram;

           break;

         case "Nagaland":

           optionsList = Nagaland;

           break;

         case  "Orissa":

           optionsList = Orissa;

           break;

         case "Punjab":

           optionsList = Punjab;

           break;

         case  "Rajasthan":

           optionsList = Rajasthan;

           break;

         case "Sikkim":

           optionsList = Sikkim;

           break;

         case  "Tamil Nadu":

           optionsList = TamilNadu;

           break;

         case  "Telangana":

           optionsList = Telangana;

           break;

         case "Tripura":

           optionsList = Tripura ;

           break;

         case  "Uttaranchal":

           optionsList = Uttaranchal;

           break;

         case  "Uttar Pradesh":

           optionsList = UttarPradesh;

           break;

         case "West Bengal":

           optionsList = WestBengal;

           break;

         case  "Andaman and Nicobar Islands":

           optionsList = AndamanNicobar;

           break;

         case "Chandigarh":

           optionsList = Chandigarh;

           break;

         case  "Dadar and Nagar Haveli":

           optionsList = DadraHaveli;

           break;

         case "Daman and Diu":

           optionsList = DamanDiu;

           break;

         case  "Delhi":

           optionsList = Delhi;

           break;

         case "Lakshadeep":

           optionsList = Lakshadeep ;

           break;

         case  "Pondicherry":

           optionsList = Pondicherry;

           break;

         }

         

         

         for(var i = 0; i < optionsList.length; i++){

         htmlString = htmlString+"<option value='"+ optionsList[i] +"'>"+ optionsList[i] +"</option>";

         }

         $("#inputDistrict").html(htmlString);

         

         });

      </script>

   </body>

</html>