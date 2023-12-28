<?php
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   session_start();
   error_reporting(0);
   if ($_SESSION['cb_user_id'] == '') {
      header("Location: index.php");
  }
   include "connection.php";
    $id = $_GET['id'];
    $Deleted_Status = 0;
    $stmt2 = $db->prepare("SELECT * from `cb_user_edit_fpo_profile` WHERE FPO_Registration_ID = ? AND Deleted_Status = ?");
    $stmt2->bind_param("ii", $id, $Deleted_Status);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $row2 = $result2->fetch_assoc();
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>View Client User</title>
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
   <?php include "cb_header.php"; ?>
   <main id="main">
      <div class="slider img">
         <img src="assets/img/slide/slider.jpg">
      </div>
      <div class="container mt-5 mb-5">
         <div class="section-title">
            <h2>
               <?php echo $FPOExporterName ?> - (
               <?php if(empty($row['FPO_UniqueCode'])){ echo "NA"; } else { echo $row['FPO_UniqueCode']; } ?>)
            </h2>
         </div>
         <div class="form-1">
            <form method="POST" enctype="multipart/form-data" autocomplete="off">
               <h4 class='heading-text mt-5 mb-2'>Application Registered</h4>
               <div class="row">

                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Unique Number</label>
                     <input value="<?php echo $row2['Unique_Number']; ?>" type="text" readonly class="form-control">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Status of IndG.A.P</label>
                     <input value="<?php echo $row2['Status_of_IndGAP']; ?>" type="text" readonly class="form-control">
                  </div>
               </div>

               <?php if($row2['Status_of_IndGAP']!='Registered' ){?>
               <div class="application-box p-3 mt-3 mb-3 pb-5 registered" style="display: none;" id="registered">
                  <div class="row">
                     <p class='heading-text'><strong>Application Registered</strong></p>
                     <p class="close-m" id="registered-box">&times;</p>
                     <div
                        class="<?php if(!empty($row2['R_Client_Application_Form'])){echo 'col-md-3';}else{echo 'col-md-6';} ?> form-group mt-3">
                        <label class="mb-2">Application Form</label>
                        <input type="file" name="R_Client_Application_Form" class="form-control"
                           placeholder="Application Form">
                     </div>
                     <?php if(!empty($row2['R_Client_Application_Form'])){ ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['R_Client_Application_Form']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                     <?php if(!empty($row2['R_Signed_Certification_Agreement'])){ ?>
                  <div class="col-md-1 form-group mt-3">
                  	<a href="CBDocument/<?php echo $row2['R_Signed_Certification_Agreement']; ?>" target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div>
                  <?php } ?> -->
                     <!-- <div class="<?php if(!empty($row2['R_Scope'])){echo 'col-md-3';}else{echo 'col-md-3';} ?> form-group mt-3">
                        <label class="mb-2">Scope</label>
                        <input type="file" name="R_Scope" class="form-control" placeholder="Scope">
                     </div>
                     <?php if(!empty($row2['R_Scope'])){ ?>
                  <div class="col-md-1 form-group mt-3">
                  	<a href="CBDocument/<?php echo $row2['R_Scope']; ?>" target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div>
                  <?php } ?> -->
                  </div>
               </div>
               <?php } else {?>
               <div class="application-box p-3 mt-3 mb-3 pb-5 registered" style="display: block;" id="registered">
                  <div class="row">
                     <p class='heading-text'><strong>Application Registered</strong></p>
                     <p class="close-m" id="registered-box">&times;</p>
                     <!-- <div class="col-md-3 form-group mt-3">
                        <label class="mb-2">Name</label>
                        <input value="<?php echo $row2['R_Client_Name']; ?>" type="text" name="R_Client_Name"
                           class="form-control" placeholder="Name">
                     </div> -->
                     <!--<div class="col-md-6 form-group mt-3">-->
                     <!--   <label class="mb-2">Current Status</label>-->
                     <!--   <input value="<?php echo $row2['R_Current_Status']; ?>" type="text" name="R_Current_Status"-->
                     <!--      class="form-control" placeholder="Current Status">-->
                     <!--</div>-->
                     <div
                        class="<?php if(!empty($row2['R_Client_Application_Form'])){echo 'col-md-3';}else{echo 'col-md-3';} ?> form-group mt-3">
                        <label class="mb-2">Application Form</label>
                        <input type="file" name="R_Client_Application_Form" class="form-control"
                           placeholder="Client Application Form">
                     </div>
                     <?php if(!empty($row2['R_Client_Application_Form'])){ ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['R_Client_Application_Form']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                     <!-- <div class="<?php if(!empty($row2['R_Signed_Certification_Agreement'])){echo 'col-md-3';}else{echo 'col-md-3';} ?> form-group mt-3">
                        <label class="mb-2">Signed Certification Agreement</label>
                        <input type="file" name="R_Signed_Certification_Agreement" class="form-control"
                           placeholder="Signed Certification Agreement">
                     </div>
                     <?php if(!empty($row2['R_Signed_Certification_Agreement'])){ ?>
                  <div class="col-md-1 form-group mt-3">
                  	<a href="CBDocument/<?php echo $row2['R_Signed_Certification_Agreement']; ?>" target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div>
                  <?php } ?>
                     <div class="<?php if(!empty($row2['R_Scope'])){echo 'col-md-3';}else{echo 'col-md-3';} ?> form-group mt-3">
                        <label class="mb-2">Scope</label>
                        <input type="file" name="R_Scope" class="form-control" placeholder="Scope">
                     </div>
                     <?php if(!empty($row2['R_Scope'])){ ?>
                  <div class="col-md-1 form-group mt-3">
                  	<a href="CBDocument/<?php echo $row2['R_Scope']; ?>" target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div>
                  <?php } ?> -->
                  </div>
               </div>
               <?php } ?>
               <?php if($row2['Status_of_IndGAP']!='Granted') { ?>
               <div class="application-box p-3 mt-3 mb-3 pb-5 grant" style="display: none;" id="grant">
                  <div class="row">
                     <p class='heading-text'><strong>Application Granted</strong></p>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate No.</label>
                           <input value="<?php echo $row2['CG_Certificate_No']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate Date</label>
                           <input value="<?php echo $row2['CG_Certificate_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate End Date</label>
                           <input value="<?php echo $row2['CG_Certificate_End_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate Renewal Date</label>
                           <input value="<?php echo $row2['CG_Certificate_Renewal_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     
                     <?php if(!empty($row2['CG_Client_Application_Form'])){ ?>
                     <div class="col-md-1 form-group mt-3">
                         <label class="mb-2">Certificate</label>
                        <a href="CBDocument/<?php echo $row2['CG_Client_Application_Form']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                     <!-- <div class="<?php if(!empty($row2['CG_Signed_Certification_Agreement'])){echo 'col-md-3';}else{echo 'col-md-3';} ?> form-group mt-3">
                        <label class="mb-2">Signed Certification Agreement</label>
                        <input type="file" name="CG_Signed_Certification_Agreement" class="form-control"
                           placeholder="Signed Certification Agreement">
                     </div>
                     <?php if(!empty($row2['CG_Signed_Certification_Agreement'])){ ?>
                  <div class="col-md-1 form-group mt-3">
                  	<a href="CBDocument/<?php echo $row2['CG_Signed_Certification_Agreement']; ?>" target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div>
                  <?php } ?>
                     <div class="<?php if(!empty($row2['CG_Scope'])){echo 'col-md-3';}else{echo 'col-md-3';} ?> form-group mt-3">
                        <label class="mb-2">Scope</label>
                        <input type="file" name="CG_Scope" class="form-control" placeholder="Scope">
                     </div>
                      <?php if(!empty($row2['CG_Scope'])){ ?>
                  <div class="col-md-1 form-group mt-3">
                  	<a href="CBDocument/<?php echo $row2['CG_Scope']; ?>" target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div>
                  <?php } ?> -->
                  </div>
               </div>
               <?php } else { ?>
               <div class="application-box p-3 mt-3 mb-3 pb-5 grant" style="display: block;" id="grant">
                  <div class="row">
                     <p class='heading-text'><strong>Application Grant</strong></p>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate No.</label>
                           <input value="<?php echo $row2['CG_Certificate_No']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate Date</label>
                           <input value="<?php echo $row2['CG_Certificate_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate End Date</label>
                           <input value="<?php echo $row2['CG_Certificate_End_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate Renewal Date</label>
                           <input value="<?php echo $row2['CG_Certificate_Renewal_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <!--<div class="col-md-6 form-group mt-3">-->
                     <!--   <label class="mb-2">Current Status</label>-->
                     <!--   <input value="<?php echo $row2['CG_Current_Status']; ?>" type="text" name="CG_Current_Status"-->
                     <!--      class="form-control" placeholder="Current Status">-->
                     <!--</div>-->
                     
                     <?php if(!empty($row2['CG_Client_Application_Form'])){ ?>
                     <div class="col-md-1 form-group mt-3">
                         <label class="mb-2">Certificate</label>
                        <a href="CBDocument/<?php echo $row2['CG_Client_Application_Form']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                     <!-- <div class="<?php if(!empty($row2['CG_Signed_Certification_Agreement'])){echo 'col-md-3';}else{echo 'col-md-3';} ?> form-group mt-3">
                        <label class="mb-2">Signed Certification Agreement</label>
                        <input type="file" name="CG_Signed_Certification_Agreement" class="form-control"
                           placeholder="Signed Certification Agreement">
                     </div>
                     <?php if(!empty($row2['CG_Signed_Certification_Agreement'])){ ?>
                  <div class="col-md-1 form-group mt-3">
                  	<a href="CBDocument/<?php echo $row2['CG_Signed_Certification_Agreement']; ?>" target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div>
                  <?php } ?>
                     <div class="<?php if(!empty($row2['CG_Scope'])){echo 'col-md-3';}else{echo 'col-md-4';} ?> form-group mt-3">
                        <label class="mb-2">Scope</label>
                        <input type="file" name="CG_Scope" class="form-control" placeholder="Scope">
                     </div>
                      <?php if(!empty($row2['CG_Scope'])){ ?>
                  <div class="col-md-1 form-group mt-3">
                  	<a href="CBDocument/<?php echo $row2['CG_Scope']; ?>" target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div>
                  <?php } ?> -->
                  </div>
               </div>
               <?php } if($row2['Status_of_IndGAP']!='Suspended' ){ ?>

               <div class="application-box p-3 mt-3 mb-3 pb-5 suspension" style="display: none;" id="suspension">
                  <div class="row">
                     <p class='heading-text'><strong>Application Suspended</strong></p>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate Issue Date</label>
                        <input value="<?php echo $row2['S_Certificate_Issue_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate Validity Date</label>
                        <input value="<?php echo $row2['S_Certificate_Validity_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Suspended Date</label>
                        <input value="<?php echo $row2['S_Suspended_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Reason for Suspension</label>
                        <input value="<?php echo $row2['S_Reason_for_Suspended']; ?>" type="text" readonly class="form-control">
                     </div>
                     <?php if(!empty($row2['S_Document_Upload'])){ ?>
                     <div class="col-md-1 form-group mt-3">
                         <label class="mb-2">Document</label>
                        <a href="CBDocument/<?php echo $row2['S_Document_Upload']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                  </div>
               </div>
               <?php } else { ?>
               <div class="application-box p-3 mt-3 mb-3 pb-5 suspension" style="display: block;" id="suspension">
                  <div class="row">
                     <p class='heading-text'><strong>Application Suspended</strong></p>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate Issue Date</label>
                        <input value="<?php echo $row2['S_Certificate_Issue_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate Validity Date</label>
                        <input value="<?php echo $row2['S_Certificate_Validity_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Suspended Date</label>
                        <input value="<?php echo $row2['S_Suspended_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Reason for Suspension</label>
                        <input value="<?php echo $row2['S_Reason_for_Suspended']; ?>" type="text" readonly class="form-control">
                     </div>
                     <?php if(!empty($row2['S_Document_Upload'])){ ?>
                     <div class="col-md-1 form-group mt-3">
                         <label class="mb-2">Document</label>
                        <a href="CBDocument/<?php echo $row2['S_Document_Upload']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                  </div>
               </div>
               <?php } if($row2['Status_of_IndGAP']!='Withdrawal' ){ ?>

               <div class="application-box p-3 mt-3 mb-3 pb-5 withdraw" style="display: none;" id="withdraw">
                  <div class="row">
                     <p class='heading-text'><strong>Application Withdrawal</strong></p>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate Issue Date</label>
                        <input value="<?php echo $row2['W_Certificate_Issue_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate Validity Date</label>
                        <input value="<?php echo $row2['W_Certificate_Validity_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Withdrawal Date</label>
                        <input value="<?php echo $row2['W_Withdrawal_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Reason for Withdrawal</label>
                        <input value="<?php echo $row2['W_Reason_for_Withdrawal']; ?>" type="text" readonly class="form-control">
                     </div>
                     <?php if(!empty($row2['W_Document_Upload'])){ ?>
                     <div class="col-md-1 form-group mt-3">
                         <label class="mb-2">Document</label>
                        <a href="CBDocument/<?php echo $row2['W_Document_Upload']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                  </div>
               </div>
               <?php } else { ?>
               <div class="application-box p-3 mt-3 mb-3 pb-5 withdraw" style="display: block;" id="withdraw">
                  <div class="row">
                     <p class='heading-text'><strong>Application Withdrawal</strong></p>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate Issue Date</label>
                        <input value="<?php echo $row2['W_Certificate_Issue_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate Validity Date</label>
                        <input value="<?php echo $row2['W_Certificate_Validity_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Withdrawal Date</label>
                        <input value="<?php echo $row2['W_Withdrawal_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Reason for Withdrawal</label>
                        <input value="<?php echo $row2['W_Reason_for_Withdrawal']; ?>" type="text" readonly class="form-control">
                     </div>
                     <?php if(!empty($row2['W_Document_Upload'])){ ?>
                     <div class="col-md-1 form-group mt-3">
                         <label class="mb-2">Document</label>
                        <a href="CBDocument/<?php echo $row2['W_Document_Upload']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                  </div>
               </div>
               <?php } if($row2['Status_of_IndGAP']!='Expired'){ ?>
               <div class="application-box p-3 mt-3 mb-3 pb-5 expired" style="display: none;" id="expired">
                  <div class="row">
                     <p class='heading-text'><strong>Application Expired</strong></p>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate Issue Date</label>
                        <input value="<?php echo $row2['E_Certificate_Issue_Date']; ?>" type="date"
                           name="E_Certificate_Issue_Date" class="form-control" placeholder="Certificate Issue Date">
                        <input value="<?php echo $row2['E_Certificate_Issue_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate Validity Date</label>
                        <input value="<?php echo $row2['E_Certificate_Validity_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <?php if(!empty($row2['E_Document_Upload'])){ ?>
                     <div class="col-md-1 form-group mt-3">
                         <label class="mb-2">Document</label>
                        <a href="CBDocument/<?php echo $row2['E_Document_Upload']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                  </div>
               </div>
               <?php } else { ?>
               <div class="application-box p-3 mt-3 mb-3 pb-5 expired" style="display: block;" id="expired">
                  <div class="row">
                     <p class='heading-text'><strong>Application Expired</strong></p>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate Issue Date</label>
                        <input value="<?php echo $row2['E_Certificate_Issue_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Certificate Validity Date</label>
                        <input value="<?php echo $row2['E_Certificate_Validity_Date']; ?>" type="text" readonly class="form-control">
                     </div>
                     <?php if(!empty($row2['E_Document_Upload'])){ ?>
                     <div class="col-md-1 form-group mt-3">
                         <label class="mb-2">Document</label>
                        <a href="CBDocument/<?php echo $row2['E_Document_Upload']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                  </div>
               </div>
               <?php } ?>

               

               <div class="row">

               <hr class="mt-3" style="border: 3px solid #4bc50b;">
                  <h4 class='heading-text mt-3 mb-2'>Signed Application Form</h4>
                  <?php if(!empty($row2['ClientSignedApplicationFormForRegistration'])){ ?>
                  <div class="col-md-3 form-group mt-3">
                      <label class="mb-2">Signed Application Form For Registration</label>
                     <a href="CBDocument/<?php echo $row2['ClientSignedApplicationFormForRegistration']; ?>"
                        target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div>
                  <?php } ?>
                  <hr class="mt-3" style="border: 3px solid #4bc50b;">
                  <h4 class='heading-text mt-3 mb-2'>Sub-License Certification</h4>
                  <?php if(!empty($row2['CertificationAgreementSigned_Document'])){ ?>
                  <div class="col-md-3 form-group mt-3">
                      <label class="mb-2">Certification Agreement Signed</label>
                     <a href="CBDocument/<?php echo $row2['CertificationAgreementSigned_Document']; ?>"
                        target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div>
                  <?php } ?>

                  <hr class="mt-3" style="border: 3px solid #4bc50b;">
                  <h4 class='heading-text mt-3 mb-2'>Qualified Internal Inspectors/Auditors</h4>
                  <div class="col-md-6 form-group mt-3">
                     <label class="mb-2">Qualified Internal Inspectors</label>
                     <textarea class="form-control" readonly cols="62"
                        rows="1"><?php echo $row2['Clientqualifiedinternalinspectors']; ?></textarea>
                  </div>
                  <?php if(!empty($row2['ClientqualifiedinternalinspectorsDocument'])){ ?>
                  <div class="col-md-1 form-group mt-3">
                      <label class="mb-2">Document</label>
                     <a href="CBDocument/<?php echo $row2['ClientqualifiedinternalinspectorsDocument']; ?>"
                        target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div>
                  <?php } ?>

                  <div class="col-md-6 form-group mt-3">
                     <label class="mb-2">Qualified Internal Auditors</label>
                     <textarea class="form-control" readonly cols="62"
                        rows="1"><?php echo $row2['ClientqualifiedInternalAuditors']; ?></textarea>
                  </div>
                  <?php if(!empty($row2['ClientqualifiedInternalAuditorsDocument'])){ ?>
                  <div class="col-md-1 form-group mt-3">
                      <label class="mb-2">Document</label>
                     <a href="CBDocument/<?php echo $row2['ClientqualifiedInternalAuditorsDocument']; ?>"
                        target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div>
                  <?php } ?>


                  <hr class="mt-3" style="border: 3px solid #4bc50b;">
                  <h4 class='heading-text mt-3 mb-2'>Assessment Schedule</h4>
                  

                  <h5 class="heading-text-mt-3 mb-3">Members Added Schedule</h5>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Schedule</label>
                     <textarea class="form-control" readonly cols="62"
                        rows="1"><?php echo $row2['CBAssessmentSchedule']; ?></textarea>
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Schedule Date</label>
                     <input value="<?php echo $row2['ScheduleDate']; ?>" readonly
                        class="form-control">
                  </div>
                  <?php if(!empty($row2['AssessmentScheduleDocument'])){ ?>
                  <div class="col-md-1 form-group mt-3">
                      <label class="mb-2">Document</label>
                     <a href="CBDocument/<?php echo $row2['AssessmentScheduleDocument']; ?>" target="_blank"><img
                           style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div>
                  <?php } ?>
                  <h5 class="heading-text mt-5">QMS Schedule</h5>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Schedule</label>
                     <textarea class="form-control" readonly cols="62"
                        rows="1"><?php echo $row2['CBAssessmentSchedule']; ?></textarea>
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Schedule Date</label>
                     <input value="<?php echo $row2['ScheduleDate']; ?>" readonly
                        class="form-control">
                  </div>
                  <?php if(!empty($row2['AssessmentScheduleDocument'])){ ?>
                  <div class="col-md-1 form-group mt-3">
                      <label class="mb-2">Document</label>
                     <a href="CBDocument/<?php echo $row2['AssessmentScheduleDocument']; ?>" target="_blank"><img
                           style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div>
                  <?php } ?>

                  <hr class="mt-3" style="border: 3px solid #4bc50b;">

<h4 class='heading-text mt-3 mb-2'>Non-Conformity Reports</h4>
<div class="col-md-4 form-group mt-3">
   <label class="mb-2">Reports</label>
   <textarea class="form-control" readonly cols="40"
      rows="1"><?php echo $row2['NonConformityReports']; ?></textarea>
</div>
<div class="col-md-4 form-group mt-3">
   <label class="mb-2">Corrective Actions</label>
   <input value="<?php echo $row2['ClientCorrectiveActions']; ?>" readonly class="form-control">
</div>
<div class="col-md-4 form-group mt-3">
   <label class="mb-2">CB Closure</label>
   <input value="<?php echo $row2['CBClosure']; ?>" readonly class="form-control">
</div>
<?php if(!empty($row2['NonConformityReportsDocument'])){ ?>
<div class="col-md-1 form-group mt-3">
    <label class="mb-2">Document</label>
   <a href="CBDocument/<?php echo $row2['NonConformityReportsDocument']; ?>" target="_blank"><img
         style="width: 40px;margin-top:20px;" src="images/download.png"></a>
</div>
<?php } ?>
<?php if(!empty($row2['NonConformityReportsDocument_two'])){ ?>
<div class="col-md-1 form-group mt-3">
    <label class="mb-2">Document</label>
   <a href="CBDocument/<?php echo $row2['NonConformityReportsDocument_two']; ?>" target="_blank"><img
         style="width: 40px;margin-top:20px;" src="images/download.png"></a>
</div>
<?php } ?>
<?php if(!empty($row2['NonConformityReportsDocument_three'])){ ?>
<div class="col-md-1 form-group mt-3">
    <label class="mb-2">Document</label>
   <a href="CBDocument/<?php echo $row2['NonConformityReportsDocument_three']; ?>"
      target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
</div>
<?php } ?>


<hr class="mt-3" style="border: 3px solid #4bc50b;">
                  <h4 class='heading-text mb-4'>Residue Analysis</h4>
                     <?php if (!empty($row2['ResidueAnalysisDocument'])) { ?>
                     <div class="col-md-3 form-group mt-3">
                         <label class="mb-2">Residue Analysis</label><br>
                        <a href="CBDocument/<?php echo $row2['ResidueAnalysisDocument']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                  
                 


                  <hr class="mt-3" style="border: 3px solid #4bc50b;">
                  <h4 class='heading-text mt-3 mb-2'>Audit Days</h4>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Audit Man Days Spent By CB</label>
                     <input value="<?php echo $row2['AuditManDaysSpentByCB']; ?>" readonly class="form-control">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">QMS Audit</label>
                     <input value="<?php echo $row2['QMSAudit']; ?>" readonly class="form-control">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Members Inspections</label>
                     <input value="<?php echo $row2['MembersInspections']; ?>" readonly class="form-control"
                        >
                  </div>
                 

                  <hr class="mt-3" style="border: 3px solid #4bc50b;">
                  <h4 class='heading-text mb-4'>Internal folder</h4>
                     <?php if (!empty($row2['QMSChecklist'])) { ?>
                     <div class="col-md-3 form-group mt-3">
                         <label class="mb-2">QMS Checklist</label><br>
                        <a href="CBDocument/<?php echo $row2['QMSChecklist']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                     <?php if (!empty($row2['CPCCChecklists'])) { ?>
                     <div class="col-md-3 form-group mt-3">
                         <label class="mb-2">CPCC Checklists</label><br>
                        <a href="CBDocument/<?php echo $row2['CPCCChecklists']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                     <?php if (!empty($row2['Sampleslip'])) { ?>
                     <div class="col-md-3 form-group mt-3">
                         <label class="mb-2">Sample slip</label><br>
                        <a href="CBDocument/<?php echo $row2['Sampleslip']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                     <hr class="mt-3" style="border: 3px solid #4bc50b;">
                     <h4 class='heading-text mb-4'>Technical Review</h4>
                     <?php if (!empty($row2['TechnicalReviewReport'])) { ?>
                     <div class="col-md-3 form-group mt-3">
                         <label class="mb-2">Technical Review Report</label><br>
                        <a href="CBDocument/<?php echo $row2['TechnicalReviewReport']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                     <hr class="mt-3" style="border: 3px solid #4bc50b;">
                     <h4 class='heading-text mb-4'>Certification Committee</h4>
                     <?php if (!empty($row2['CertificationCommitteeReport'])) { ?>
                     <div class="col-md-3 form-group mt-3">
                         <label class="mb-2">Certification Committee Report</label><br>
                        <a href="CBDocument/<?php echo $row2['CertificationCommitteeReport']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                     <hr class="mt-3" style="border: 3px solid #4bc50b;">
                     <h4 class='heading-text mt-3 mb-2'>Mass Balance Register</h4>
                     
                     <?php if (!empty($row2['MassBalanceGrantingCertificate'])) { ?>
                     <div class="col-md-3 form-group mt-3">
                          <label class="mb-2">Mass Balance Granting Certificate</label><br>
                        <a href="CBDocument/<?php echo $row2['MassBalanceGrantingCertificate']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>

                  
                  <hr class="mt-3" style="border: 3px solid #4bc50b;">
                  <h4 class='heading-text mt-3 mb-2'>Scope</h4>
                  <div class="col-md-6 form-group mt-3">
                     <label class="mb-2">Applied Status</label>
                     <input value="<?php echo $row2['ScopeStatus']; ?>" readonly class="form-control">
                  </div>
                  <?php if(!empty($row2['Scope_Document'])){ ?>
                  <div class="col-md-1 form-group mt-3">
                      <label for="" class="mb-2">Document</label>
                     <a href="CBDocument/<?php echo $row2['Scope_Document']; ?>" target="_blank"><img
                           style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div>
                  <?php } ?>

                  <div class="col-md-6 form-group mt-3">
                     <label class="mb-2">Granted Status</label>
                     <input value="<?php echo $row2['GrantedScopeStatus']; ?>" readonly class="form-control">
                  </div>
                  <?php if(!empty($row2['Granted_Scope_Document'])){ ?>
                  <div class="col-md-1 form-group mt-3">
                      <label for="" class="mb-2">Document</label>
                     <a href="CBDocument/<?php echo $row2['Granted_Scope_Document']; ?>" target="_blank"><img
                           style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div>
                  <?php } ?>
                  <hr class="mt-3" style="border: 3px solid #4bc50b;">
                  <h4 class='heading-text mt-3 mb-2'>Feedback</h4>
                  <div class="col-md-12 form-group mt-3">
                     <label class="mb-2">Feedback <span style="color:red;">*</span></label>
                     <textarea class="form-control" readonly cols="131" rows="3"
                        required><?php echo $row2['ClientFeedback']; ?></textarea>
                  </div>
                  <hr class="mt-3" style="border: 3px solid #4bc50b;">
                  <h4 class='heading-text mt-3 mb-2'>Complaints</h4>
                  <div class="col-md-6 form-group mt-3">
                     <label class="mb-2">Description of Complaint</label>
                     <input type="text" readonly value="<?php echo $row2['DescriptionOfCompliance']; ?>" class="form-control">
                  </div>
                  <?php if(!empty($row2['DescriptionOfCompliance_Document'])){ ?>
                  <div class="col-md-1 form-group mt-3">
                      <label class="mb-2">Documents</label>
                     <a href="CBDocument/<?php echo $row2['DescriptionOfCompliance_Document']; ?>" target="_blank"><img
                           style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div>
                  <?php } ?>
                  <hr class="mt-3" style="border: 3px solid #4bc50b;">
                  <h4 class='heading-text mt-3 mb-2'>Other</h4>
                  <?php if(!empty($row2['OtherDocument'])){ ?>
                  <div class="col-md-4 form-group mt-3">
                      <label class="mb-2">Other Documents</label><br>
                     <a href="CBDocument/<?php echo $row2['OtherDocument']; ?>" target="_blank"><img
                           style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                  </div>
                  <?php } ?>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Document Name</label>
                     <input value="<?php echo $row2['OtherDocument_Name']; ?>" readonly class="form-control">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                     <label class="mb-2">Document Discription</label>
                     <input value="<?php echo $row2['OtherDocument_Discription']; ?>" readonly class="form-control">
                  </div>
               </div>
               <div class="text-right pt-4">
               </div>
            </form>
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
</body>

</html>