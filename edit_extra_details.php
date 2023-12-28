<?php
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   session_start();
   error_reporting(0);
   $FPO_Registration_ID = $_SESSION['FPO_Registration_ID'];
   if ($FPO_Registration_ID == '') {
    header("Location: fpo-login.php");
}
   include "connection.php";

   $extraaaa = mysqli_query($db,"SELECT * FROM `fpo_extra_details` WHERE DeletedStatus='0'");
   $read = mysqli_fetch_assoc($extraaaa);
   if(mysqli_num_rows($extraaaa) > 0) { 
      //header("Location: extra_details.php");
   }

    $extra = mysqli_query($db,"SELECT * FROM `fpo_extra_details` WHERE DeletedStatus='0'");
                    $read = mysqli_fetch_assoc($extra);
       
   



   ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Edit FPO Record</title>
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

<body style="background-image: url('images/fpo-bg2.jpg');background-repeat: repeat-y;background-position: center;">
   <?php include "fpo_header.php"; ?>
   <main id="main">
      <div class="slider img">
         <img src="assets/img/slide/slider.jpg">
      </div>
      <div class="container mt-5 mb-5">
         <div class="section-title">
            <h2>Edit</h2>
         </div>
         <div class="form-1">
            <?php
                  $msg = $_GET['msg'];
                  if ($msg == 'fail') { ?>
            <center>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="bs-component">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                           Production not saved.
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                     </div>
                  </div>
               </div>
            </center>
            <?php
                  } ?>
            <?php
                  $msg = $_GET['msg'];
                  if ($msg == 'success') { ?>
            <center>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="bs-component">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           Production successfully saved.
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                     </div>
                  </div>
               </div>
            </center>
            <?php
                  } ?>
            <form method="POST" enctype="multipart/form-data" autocomplete="off">
               <div class="row">

                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">Certificate No</label>
                     <input value="<?php echo $read['CertificateNo'] ?>" type="text" class="form-control" name="CertificateNo"
                        placeholder="Certificate No">
                  </div>
                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">Standard</label>
                     <select name="document_standard" class="form-control" required="">
                        <option value="00">Select Standard</option>
                        <option <?php if($read['document_standard'] == 'IndGAP'){echo 'selected';} ?> value="IndGAP">IndGAP</option>
                        <option <?php if($read['document_standard'] == 'GloabalGAP'){echo 'selected';} ?> value="GloabalGAP">GloabalGAP</option>
                        <option <?php if($read['document_standard'] == 'Organic NPOP'){echo 'selected';} ?> value="Organic NPOP">Organic NPOP</option>
                        <option <?php if($read['document_standard'] == 'Organic NOP'){echo 'selected';} ?> value="Organic NOP">Organic NOP</option>
                        <option <?php if($read['document_standard'] == 'ISO22000'){echo 'selected';} ?> value="ISO22000">ISO22000</option>
                        <option <?php if($read['document_standard'] == 'BRC'){echo 'selected';} ?> value="BRC">BRC</option>
                        <option <?php if($read['document_standard'] == 'Others'){echo 'selected';} ?> value="Others">Others</option>
                     </select>
                  </div>
                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">Certificate Date</label>
                     <input value="<?php echo $read['CertificateDate']; ?>" type="date" name="CertificateDate" class="form-control"
                        placeholder="Certificate Date">
                  </div>
                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">Certificate End Date</label>
                     <input value="<?php echo $read['CertificateEndDate']; ?>" type="date" name="CertificateEndDate" class="form-control"
                        placeholder="Certificate End Date">
                  </div>
                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">Certificate Upload</label>
                     <input type="file" name="CertificateUpload" class="form-control"
                        placeholder="Certificate Upload">
                  </div>
                  <div class="col-md-1 text-right" style="margin-top:45px;">
                                        <div>
                                            <a href="assets/extra_details_docs/<?php echo $read['CertificateUpload'] ?>"
                                                target="_blank"><img src="images/download.png" style="width:35px;"></a>
                                        </div>
                                    </div>

                  <hr class="mt-3" style="border: 3px solid #4bc50b;">
                  <h4 class='heading-text mt-3 mb-2'>Certification Body Audit Report</h4>
                  <div class="col-md-6 form-group mt-3">
                     <label class="mb-2">Report Number</label>
                     <input value="<?php echo $read['ReportNumber_Audit_report'] ?>" type="text" class="form-control" name="ReportNumber_Audit_report"
                        placeholder="Report Number">
                  </div>
                  <div class="col-md-5 form-group mt-3">
                     <label class="mb-2">Document Upload</label>
                     <input type="file" name="ReportNumber_Audit_doc_Upload" class="form-control"
                        placeholder="ReportNumber_Audit_doc_Upload">
                  </div>
                  <div class="col-md-1 text-right" style="margin-top:45px;">
                                        <div>
                                            <a href="assets/extra_details_docs/<?php echo $read['ReportNumber_Audit_doc_Upload'] ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                        </div>
                                    </div>

                  <hr class="mt-3" style="border: 3px solid #4bc50b;">
                  <h4 class='heading-text mt-3 mb-2'>Produce Test Reports</h4>
                  <div class="col-md-6 form-group mt-3">
                     <label class="mb-2">Report Number</label>
                     <input value="<?php echo $read['Produce_Report_Number'] ?>" type="text" class="form-control" name="Produce_Report_Number"
                        placeholder="Report Number">
                  </div>
                  <div class="col-md-5 form-group mt-3">
                     <label class="mb-2">Document Upload</label>
                     <input type="file" name="Produce_Report_Number_Doc_Upload" class="form-control"
                        placeholder="Produce_Report_Number_Doc_Upload">
                  </div>
                  <div class="col-md-1 text-right" style="margin-top:45px;">
                                        <div>
                                            <a href="assets/extra_details_docs/<?php echo $read['Produce_Report_Number_Doc_Upload'] ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                        </div>
                                    </div>

                  <hr class="mt-3" style="border: 3px solid #4bc50b;">

                  <h4 class='heading-text mt-3 mb-2'>Products Covered under Certification</h4>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Product Name</label>
                     <input value="<?php echo $read['Produce_Report_Number'] ?>" type="text" name="ProductName" class="form-control" placeholder="Product Name">
                  </div>
                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">Product Image</label>
                     <input type="file" name="ProductImage" class="form-control" placeholder="Document Upload">
                  </div>
                  <div class="col-md-1 text-right" style="margin-top:45px;">
                                        <div>
                                            <a href="assets/extra_details_docs/<?php echo $read['ProductImage'] ?>"
                                                target="_blank"><img
                                                    src="assets/extra_details_docs/<?php echo $read['ProductImage'] ?>"
                                                    style="width:40px;" alt="image"></a>
                                        </div>
                                    </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Product Specification</label>
                     <textarea class="form-control" name="ProductSpecification" id="CBAssessmentSchedule" cols="62"
                        rows="1"><?php echo $read['ProductSpecification'] ?></textarea>
                  </div>
                  <hr class="mt-3" style="border: 3px solid #4bc50b;">
                  <h4 class='heading-text mt-3 mb-2'>Mass Balance Register</h4>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Mass Balance Granting Certificate</label>
                     <input type="file" name="MassBalanceGranting_Document" class="form-control" placeholder="Document Name">
                  </div>
                  <div class="col-md-1 text-right" style="margin-top:45px;">
                                        <div>
                                            <a href="assets/extra_details_docs/<?php echo $read['MassBalanceGranting_Document'] ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                        </div>
                                    </div>

                  <!-- <div class="col-md-1 form-group mt-3">
                     <a href="" target="_blank"><img
                           style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div> -->

                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Document Name</label>
                     <input value="<?php echo $read['MassBalanceGranting_Document_Name'] ?>" type="text" name="MassBalanceGranting_Document_Name" class="form-control"
                        placeholder="Document Name">
                  </div>
                  <!-- <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Date</label>
                     <input  type="date"
                        name="MassBalanceGranting_Document_Date" class="form-control" placeholder="Document Name">
                  </div> -->

                  <hr class="mt-3" style="border: 3px solid #4bc50b;">
                  <h4 class='heading-text mt-3 mb-2'>Signed Application Form</h4>
                  <div class="col-md-6 form-group mt-3">
                     <label class="mb-2">Signed Application Form For Registration</label>
                     <input type="file" class="form-control" name="Singed_Application_Registration"
                        placeholder="Total Qty (In MT)">
                  </div>
                    <div class="col-md-1 text-right" style="margin-top:45px;">
                                        <div>
                                            <a href="assets/extra_details_docs/<?php echo $read['Sub_License_Certification_Agreement_Document'] ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                        </div>
                                    </div>
                  <!-- <div class="col-md-1 form-group mt-3">
                     <a href="" target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div> -->


                  <hr class="mt-3" style="border: 3px solid #4bc50b;">
                  <h4 class='heading-text mt-3 mb-2'>Sub-License Certification</h4>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Certification Agreement Signed</label>
                     <input type="file" class="form-control" name="Sub_License_Certification_Agreement_Document"
                        placeholder="Certification Agreement Signed">
                  </div>
                  <div class="col-md-1" style="margin-top:45px;">
                                        <div>
                                            <a href="assets/extra_details_docs/<?php echo $read['Sub_License_Certification_Agreement_Document'] ?>" target="_blank"><img
                                                    src="images/download.png" style="width:40px;"></a>
                                        </div>
                                    </div>
                  <div class="col-md-3 form-group mt-3">
                     <label class="mb-2">Document Name</label>
                     <input value="<?php echo $read['Sub_License_Certification_Agreement_Document_Name'] ?>" type="text" name="Sub_License_Certification_Agreement_Document_Name" class="form-control"
                        placeholder="Document Name">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Date</label>
                     <input value="<?php echo $read['Sub_License_Certification_Agreement_Document_Date'] ?>" type="date" name="Sub_License_Certification_Agreement_Document_Date" class="form-control"
                        placeholder="Document Name">
                  </div>
                  <!--                  
                  <div class="col-md-1 form-group mt-3">
                     <a href=""
                        target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div> -->

                  <!-- <div class="col-md-6 form-group mt-3">
                     <label for="" class="mb-2">Document Name</label>
                     <input value="<?php echo $row2['CertificationAgreement_Document_Name']; ?>" type="text"
                        name="CertificationAgreement_Document_Name" class="form-control" placeholder="Document Name">
                  </div> -->
                  <hr class="mt-3" style="border: 3px solid #4bc50b;">

                  <h4 class='heading-text mt-3 mb-2'>Overall Responsible Person</h4>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Name</label>
                     <input value="<?php echo $read['Overall_Responsible_person_name'] ?>" type="text" class="form-control" name="Overall_Responsible_person_name" id="" placeholder="Name">
                  </div>


                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Position</label>
                     <input value="<?php echo $read['Overall_Responsible_person_position'] ?>" type="text" class="form-control" name="Overall_Responsible_person_position" placeholder="Position">
                  </div>
                  <div class="col-md-2 form-group mt-3">
                     <label class="mb-2">Photo</label>
                     <input value="" type="file" class="form-control" name="Overall_Responsible_person_image"
                        placeholder="Photo">
                  </div>
                  <div class="col-md-2" style="margin-top:45px;">
                                        <div>
                                            <a href="assets/extra_details_docs/<?php echo $read['Overall_Responsible_person_image'] ?>" target="_blank"><img
                                                    src="assets/extra_details_docs/<?php echo $read['Overall_Responsible_person_image'] ?>" alt="img" style="width:40px;"></a>
                                        </div>
                                    </div>



                  <hr class="mt-3" style="border: 3px solid #4bc50b;">

                  <h4 class='heading-text mt-3 mb-2'>Registered office/premises</h4>
                  <div class="col-md-6 form-group mt-3">
                     <label class="mb-2">Location Address</label>
                     <input value="<?php echo $read['Location_address'] ?>" type="text" class="form-control" name="Location_address" id="" placeholder="Location Address">
                  </div>

                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Photo</label>
                     <input value="" type="file" class="form-control" name="Registred_office_photo"
                        placeholder="Photo">
                  </div>
                  <div class="col-md-2" style="margin-top:45px;">
                                        <div>
                                            <a href="assets/extra_details_docs/<?php echo $read['Registred_office_photo'] ?>" target="_blank"><img src="assets/extra_details_docs/<?php echo $read['Registred_office_photo'] ?>" alt="img" style="width:40px;"></a>
                                        </div>
                                    </div>


                  <hr class="mt-3" style="border: 3px solid #4bc50b;">

                  <h4 class='heading-text mt-3 mb-2'>Virtual Tour of Production Facilities</h4>

                  <div class="col-md-10 form-group mt-3">
                     <label class="mb-2">Photo</label>
                     <input value="" type="file" class="form-control" name="Virtual_Tour_Facilities_Photo" multiple>
                  </div>
                  <div class="col-md-2" style="margin-top: 45px;">                  
                    <a href="assets/extra_details_docs/<?php echo $read['Virtual_Tour_Facilities_Photo'] ?>" target="_blank"><img src="assets/extra_details_docs/<?php echo $read['Virtual_Tour_Facilities_Photo'] ?>" alt="img" style="width:40px;"></a>
                  </div>

                  <hr class="mt-3" style="border: 3px solid #4bc50b;">
                    
                  <h4 class='heading-text mt-3 mb-2'>Copies of Regulatory Licenses Obtained</h4>
                  <div id="employee_table">
                     <div class="row" id="row1">
                        <div class="col-md-5 form-group mt-3">
                           <label class="mb-2">Document Name</label>
                           <?php
                                 
                                    $GrossRevenue_CropName = explode(",",$read['Copies_of_regulartory_License_Document_name']);
                                    foreach($GrossRevenue_CropName as $GrossRevenue_CropNames){?>
                            <input value="<?php echo $GrossRevenue_CropNames; ?>" type="text" class="form-control" name="Copies_of_regulartory_License_Document_name[]" id=""
                              placeholder="Document Name">    
                                        
                                    <br><?php } 
                                ?>
                                
                                
                                
                           
                        </div>
                        <div class="col-md-5 form-group mt-3">
                           <label class="mb-2">Document Upload</label>
                           <?php
                                             $GrossRevenue_CropName = explode(",",$read['Copies_of_regulartory_License_Document_docu']);
                                             foreach($GrossRevenue_CropName as $GrossRevenue_CropNames){
                                                  ?> 
                                                 <input value="" type="file" class="form-control" name="Copies_of_regulartory_License_Document_docu[]">
                                                 <a href="assets/extra_details_docs/<?php echo $GrossRevenue_CropNames ?>" target="_blank"><img src="images/download.png" alt="img" style="width:40px;"></a>
                                                 <?php
                                             } 
                                        ?>
                           
                        </div>
                        
                        <div class="col-md-2 form-group mt-5">
                           <label></label>
                           
                           <input type="button" class="btn btn-success" onclick="add_gross();" value="+"
                              style="width: 25%;">
                        </div>
                     </div>
                  </div>

                  <!-- <hr class="mt-3" style="border: 3px solid #4bc50b;">
                  
                  <h4 class='heading-text mt-3 mb-2'></h4>
                  <div class="col-md-6 form-group mt-3">
                     <label class="mb-2">Document Name</label>
                     <input type="text" class="form-control" name="OtherDocument" id="" placeholder="Document Name">
                  </div>
                  <div class="col-md-6 form-group mt-3">
                     <label class="mb-2">Date</label>
                     <input value="" type="date" class="form-control" name="OtherDocument_Discription">
                  </div> -->
                  <hr class="mt-3" style="border: 3px solid #4bc50b;">

                  <h4 class='heading-text mt-3 mb-2'></h4>
                  <div class="col-md-12 form-group mt-3">
                     <label class="mb-2">Miscellaneous</label>
                     <textarea class="form-control" name="miscellaneous" cols="30" rows="5"><?php echo $read['miscellaneous']; ?></textarea>
                  </div>
               </div>
               <div class="text-right pt-4">
                  <input type="submit" value="Update" name="Update" class="btn btn-success" />
               </div>
            </form>
            <?php
               if(isset($_POST['Update']))
               {
                  $CertificateNo = mysqli_real_escape_string($db,$_POST['CertificateNo']);
                  $document_standard = mysqli_real_escape_string($db,$_POST['document_standard']);
                  $CertificateDate = mysqli_real_escape_string($db,$_POST['CertificateDate'] );
                  $CertificateEndDate = mysqli_real_escape_string($db,$_POST['CertificateEndDate']);
                  $CertificateUpload = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES['CertificateUpload']['name'];
                  $CertificateUpload_tmp = $_FILES['CertificateUpload']['tmp_name'];
                  $ReportNumber_Audit_report = mysqli_real_escape_string($db,$_POST['ReportNumber_Audit_report']);
                  $ReportNumber_Audit_doc_Upload = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES['ReportNumber_Audit_doc_Upload']['name'];
                  $ReportNumber_Audit_doc_Upload_tmp = $_FILES['ReportNumber_Audit_doc_Upload']['tmp_name'];
                  $Produce_Report_Number = mysqli_real_escape_string($db,$_POST['Produce_Report_Number']);
                  $Produce_Report_Number_Doc_Upload = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES['Produce_Report_Number_Doc_Upload']['name'];
                  $Produce_Report_Number_Doc_Upload_tmp = $_FILES['Produce_Report_Number_Doc_Upload']['tmp_name'];
                  $ProductName = mysqli_real_escape_string($db,$_POST['ProductName']);
                  $ProductImage = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES['ProductImage']['name'];
                  $ProductImage_tmp = $_FILES['ProductImage']['tmp_name'];
                  $ProductSpecification = mysqli_real_escape_string($db,$_POST['ProductSpecification']);
                  $MassBalanceGranting_Document = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES['MassBalanceGranting_Document']['name'];
                  $MassBalanceGranting_Document_tmp = $_FILES['MassBalanceGranting_Document']['tmp_name'];
                  $MassBalanceGranting_Document_Name = mysqli_real_escape_string($db,$_POST['MassBalanceGranting_Document_Name']);
                  $Singed_Application_Registration = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES['Singed_Application_Registration']['name'];
                  $Singed_Application_Registration_tmp = $_FILES['Singed_Application_Registration']['tmp_name'];
                  $Sub_License_Certification_Agreement_Document = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES['Sub_License_Certification_Agreement_Document']['name'];
                  $Sub_License_Certification_Agreement_Document_tmp = $_FILES['Sub_License_Certification_Agreement_Document']['tmp_name'];
                  $Sub_License_Certification_Agreement_Document_Name = mysqli_real_escape_string($db,$_POST['Sub_License_Certification_Agreement_Document_Name']);
                  $Sub_License_Certification_Agreement_Document_Date = mysqli_real_escape_string($db,$_POST['Sub_License_Certification_Agreement_Document_Date']);
                  $Overall_Responsible_person_name = mysqli_real_escape_string($db,$_POST['Overall_Responsible_person_name']);
                  $Overall_Responsible_person_position = mysqli_real_escape_string($db,$_POST['Overall_Responsible_person_position']);
                  $Overall_Responsible_person_image = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES['Overall_Responsible_person_image']['name'];
                  $Overall_Responsible_person_image_tmp = $_FILES['Overall_Responsible_person_image']['tmp_name'];
                  $Location_address = mysqli_real_escape_string($db,$_POST['Location_address']);
                  $Registred_office_photo = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES['Registred_office_photo']['name'];
                  $Registred_office_photo_tmp = $_FILES['Registred_office_photo']['tmp_name'];
                  $Virtual_Tour_Facilities_Photo = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES['Virtual_Tour_Facilities_Photo']['name'];
                  $Virtual_Tour_Facilities_Photo_tmp = $_FILES['Virtual_Tour_Facilities_Photo']['tmp_name'];
                  $Copies_of_regulartory_License_Document_name = mysqli_real_escape_string($db,implode(',',$_POST['Copies_of_regulartory_License_Document_name']));
                  // $Copies_of_regulartory_License_Document_docu = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES['Copies_of_regulartory_License_Document_docu']['name'];
                  // $Copies_of_regulartory_License_Document_docu_tmp = $_FILES['Copies_of_regulartory_License_Document_docu']['tmp_name'];
                  $miscellaneous = mysqli_real_escape_string($db,$_POST['miscellaneous']);

                  move_uploaded_file($CertificateUpload_tmp, "assets/extra_details_docs/" . $CertificateUpload);

                  move_uploaded_file($ReportNumber_Audit_doc_Upload_tmp, "assets/extra_details_docs/" . $ReportNumber_Audit_doc_Upload);

                  move_uploaded_file($Produce_Report_Number_Doc_Upload_tmp, "assets/extra_details_docs/" . $Produce_Report_Number_Doc_Upload);
                  move_uploaded_file($ProductImage_tmp, "assets/extra_details_docs/" . $ProductImage);
                  move_uploaded_file($MassBalanceGranting_Document_tmp, "assets/extra_details_docs/" . $MassBalanceGranting_Document);
                  move_uploaded_file($Singed_Application_Registration_tmp, "assets/extra_details_docs/" . $Singed_Application_Registration);
                  move_uploaded_file($Sub_License_Certification_Agreement_Document_tmp, "assets/extra_details_docs/" . $Sub_License_Certification_Agreement_Document);
                  move_uploaded_file($Overall_Responsible_person_image_tmp, "assets/extra_details_docs/" . $Overall_Responsible_person_image);
                  move_uploaded_file($Registred_office_photo_tmp, "assets/extra_details_docs/" . $Registred_office_photo);
                  move_uploaded_file($Virtual_Tour_Facilities_Photo_tmp, "assets/extra_details_docs/" . $Virtual_Tour_Facilities_Photo);
                  // move_uploaded_file($Copies_of_regulartory_License_Document_docu_tmp, "assets/extra_details_docs/" . $Copies_of_regulartory_License_Document_docu);

                  // comma saperated image insert code
                  $imageData = array();
                  foreach ($_FILES['Copies_of_regulartory_License_Document_docu']['tmp_name'] as $key => $tmpName) {
                     $fileName = time() . "-" . rand(1000, 9999) . "-DOC-" .$_FILES['Copies_of_regulartory_License_Document_docu']['name'][$key];
                     // $targetPath = $uploadDir . $fileName;
                     $targetPath = move_uploaded_file($tmpName, 'assets/extra_details_docs/'.$fileName);
                     $imageData[] = $fileName;
                   }
                   $imagePaths = implode(',', $imageData);

                 $query ="UPDATE `fpo_extra_details` SET `CertificateNo`='$CertificateNo', `document_standard`='$document_standard', `CertificateDate`='$CertificateDate', `CertificateEndDate`='$CertificateEndDate', `CertificateUpload`='$CertificateUpload', `ReportNumber_Audit_report`='$ReportNumber_Audit_report', `ReportNumber_Audit_doc_Upload`='$ReportNumber_Audit_doc_Upload', `Produce_Report_Number`='$Produce_Report_Number', `Produce_Report_Number_Doc_Upload`='$Produce_Report_Number_Doc_Upload', `ProductName`='$ProductName', `ProductImage`='$ProductImage', `ProductSpecification`='$ProductSpecification', `MassBalanceGranting_Document`='$MassBalanceGranting_Document', `MassBalanceGranting_Document_Name`='$MassBalanceGranting_Document_Name', `Singed_Application_Registration`='$Singed_Application_Registration', `Sub_License_Certification_Agreement_Document`='$Sub_License_Certification_Agreement_Document', `Sub_License_Certification_Agreement_Document_Name`='$Sub_License_Certification_Agreement_Document_Name', `Sub_License_Certification_Agreement_Document_Date`='$Sub_License_Certification_Agreement_Document_Date', `Overall_Responsible_person_name`='$Overall_Responsible_person_name', `Overall_Responsible_person_position`='$Overall_Responsible_person_position', `Overall_Responsible_person_image`='$Overall_Responsible_person_image', `Location_address`='$Location_address', `Registred_office_photo`='$Registred_office_photo', `Virtual_Tour_Facilities_Photo`='$Virtual_Tour_Facilities_Photo', `Copies_of_regulartory_License_Document_name`='$Copies_of_regulartory_License_Document_name', `Copies_of_regulartory_License_Document_docu`='$imagePaths', `miscellaneous`='$miscellaneous' WHERE `fpo_extra_details`.`ID` = '1' AND DeletedStatus = '0'";
                 
                 $extra = mysqli_query($db,$query);
               
                 if ($query) {
                     echo '<script>alert("Details Updated Successfully !")</script>';
                     echo '<script>window.location.href="edit_extra_details.php";</script>';
                 }
               }
            ?>
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
   <script>
      // var Privileges = jQuery('#IndGAP_Status');
      var select = this.value;
      jQuery('#IndGAP_Status').change(function () {
         if ($(this).val() == 'Registered') {
            $('.registered').show();
            $('.suspension').hide();
            $('.grant').hide();
            $('.withdraw').hide();
            $('.expired').hide();
         }
         if ($(this).val() == 'Granted') {
            $('.grant').show();
            $('.suspension').hide();
            $('.withdraw').hide();
            $('.expired').hide();
            $('.registered').hide();
         }
         if ($(this).val() == 'Suspended') {
            $('.suspension').show();
            $('.grant').hide();
            $('.withdraw').hide();
            $('.expired').hide();
            $('.registered').hide();
         }
         if ($(this).val() == 'Withdrawal') {
            $('.withdraw').show();
            $('.suspension').hide();
            $('.grant').hide();
            $('.expired').hide();
            $('.registered').hide();
         }
         if ($(this).val() == 'Expired') {
            $('.expired').show();
            $('.withdraw').hide();
            $('.suspension').hide();
            $('.grant').hide();
            $('.registered').hide();
         }
         // else $('.application-box').hide();
      });
   </script>

   <script>
      $(document).ready(function () {
         $("#registered-box").click(function () {
            $("#registered").addClass("Registered-hidden");
            $("#registered").css("display", "none");
         });
      });
      $(document).ready(function () {
         $("#grant-box").click(function () {
            $("#grant").addClass("Grant-hidden");
            $("#grant").css("display", "none");
         });
      });

      $(document).ready(function () {
         $("#suspension-box").click(function () {
            $("#suspension").addClass("suspension-hidden");
            $("#suspension").css("display", "none");
         });
      });

      $(document).ready(function () {
         $("#withdraw-box").click(function () {
            $("#withdraw").addClass("withdraw-hidden");
            $("#withdraw").css("display", "none");
         });
      });

      $(document).ready(function () {
         $("#expired-box").click(function () {
            $("#expired").addClass("expired-hidden");
            $("#expired").css("display", "none");
         });
      });
   </script>
   <script>
      function add_gross() {
         var count = 1;
         count = count + $('#employee_table').length;
         document.querySelector('.row').insertAdjacentHTML(
            `afterend`, `<div class="row" id="row` + count + `"><hr class="mt-3"><div class="col-md-5 form-group mt-3">
                           <label class="mb-2">Document Name</label>
                           <input type="text" class="form-control" name="Copies_of_regulartory_License_Document_name[]" id=""
                              placeholder="Document Name">
                        </div>
                        <div class="col-md-5 form-group mt-3">
                           <label class="mb-2">Document Upload</label>
                           <input value="" type="file" class="form-control" name="Copies_of_regulartory_License_Document_docu[]">
                        </div>
                        <div class="col-md-2 form-group mt-5">
                           <label></label>
                           <input type="button" class="btn btn-danger" value="DELETE" onclick=delete_gross('row` + count + `')>
                     </div></div>`
         )
      }

      function delete_gross(count) {
         $('#' + count).remove();
      }

   </script>
</body>

</html>
