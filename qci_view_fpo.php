<?php
session_start();
error_reporting(0);
include('connection.php');
if ($_SESSION['QCI_ID'] == '') {
    header("Location: qci-login.php");
}
$registerID = $_GET['id'];
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
</head>

<body style="background-image: url('images/fpo-bg2.jpg');background-repeat: repeat-y;background-position: center;">
    <?php include "qci_header.php";  ?>

    <main id="main">

        <!-- ======= Hero Section ======= -->

        <section id="hero">
            <div class="hero-container">
                <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade"
                    data-bs-ride="carousel">
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
                <h2>Client Profile Edit by CB</h2>
            </div>
            <div class="table-1">
                <?php
                $query1 = mysqli_query($db, "SELECT FPR.*,cb_user_edit_fpo_profile.* FROM fpo_registration FPR INNER JOIN cb_user_edit_fpo_profile ON cb_user_edit_fpo_profile.FPO_Registration_ID = FPR.FPO_Registration_ID WHERE cb_user_edit_fpo_profile.ID='$registerID' AND cb_user_edit_fpo_profile.Deleted_Status='0' ORDER BY cb_user_edit_fpo_profile.ID DESC");
                $row2 = mysqli_fetch_assoc($query1);
                            ?>

                <div class="sprt-box">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Organization Name</strong></div>
                                <div>
                                    <?php echo $row2['FPOExporterName']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Address</strong></div>
                                <div>
                                    <?php echo $row2['Address']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>State</strong></div>
                                <div>
                                    <?php echo $row2['State']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Contact Person</strong></div>
                                <div>
                                    <?php echo $row2['ContactPerson']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Email</strong></div>
                                <div>
                                    <?php echo $row2['Email']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Contact Number</strong></div>
                                <div>
                                    <?php echo $row2['Landline']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Certificate <?php echo $row2['Status_of_IndGAP']; ?></strong></h4>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Unique Number</strong></div>
                                <div>
                                    <?php echo $row2['Unique_Number']; ?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Status of IndG.A.P</strong></div>
                                <div>
                                    <?php echo $row2['Status_of_IndGAP']; ?>
                                </div>
                            </div>
                        </div> -->

                        <!-- Registerd Data -->
                        <?php if(['Status_of_IndGAP']=='Registered') {?>
                        <!-- <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Name</strong></div>
                                <div>
                                    <?php echo $row2['R_Client_Name']; ?>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Certificate</strong></div>
                                <div>
                                    <?php if($row2['R_Client_Application_Form'] != ''){ ?>
                                    <a href="CBDocument/<?php echo $row2['R_Client_Application_Form']; ?>"
                                        target="_blank"><img src="images/download.png" style="width:35px;"></a>
                                    <?php } else { echo "File Not Uploaded"; }?>
                                </div>
                            </div>
                        </div>
                        
                        <hr class="mt-3" style="border: 3px solid #4bc50b;">
                        <?php } ?>

                        <!-- Granted Data -->
                        <?php if($row2['Status_of_IndGAP']=='Granted') { ?>
                        <!-- <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Name</strong></div>
                                <div>
                                    <?php echo $row2['CG_Client_Name']; ?>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Certificate No.</strong></div>
                                <div>
                                    <?php echo $row2['CG_Certificate_No']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Certificated Date</strong></div>
                                <div>
                                    <?php echo $row2['CG_Certificate_Date']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>End Date</strong></div>
                                <div>
                                    <?php echo $row2['CG_Certificate_End_Date']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Renewal Date</strong></div>
                                <div>
                                    <?php echo $row2['CG_Certificate_Renewal_Date']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div><strong>Certificate</strong></div>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <div>
                                            <?php if($row2['CG_Client_Application_Form'] != ''){ ?>
                                            <a href="CBDocument/<?php echo $row2['CG_Client_Application_Form']; ?>"
                                                target="_blank"><img src="images/download.png" style="width:35px;"></a>
                                            <?php } else { echo "File Not Uploaded"; }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <!-- Suspension Data -->
                        <?php if($row2['Status_of_IndGAP']=='Suspended') {?>
                        <!-- <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Name</strong></div>
                                <div>
                                    <?php echo $row2['S_Client_Name']; ?>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Certificate Issue Date</strong></div>
                                <div>
                                    <?php echo $row2['S_Certificate_Issue_Date']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Certificate Validity Date</strong></div>
                                <div>
                                    <?php echo $row2['S_Certificate_Validity_Date']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Suspended Date</strong></div>
                                <div>
                                    <?php echo $row2['S_Suspended_Date']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Reason For Suspension</strong></div>
                                <div>
                                    <?php echo $row2['S_Reason_for_Suspended']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Document</strong></div>
                                <div>
                                    <?php if($row2['S_Document_Upload'] != ''){ ?>
                                    <a href="CBDocument/<?php echo $row2['S_Document_Upload']; ?>" target="_blank"><img
                                            src="images/download.png" style="width:40px;"></a>
                                    <?php } else { echo "File Not Uploaded"; }?>
                                </div>
                            </div>
                        </div>

                        <?php } ?>

                        <!-- Withdrawal Data -->
                        <?php if($row2['Status_of_IndGAP']=='Withdrawal') {?>
                        <!-- <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Name</strong></div>
                                <div>
                                    <?php echo $row2['W_Client_Name']; ?>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Certificate Issue Date</strong></div>
                                <div>
                                    <?php echo $row2['W_Certificate_Issue_Date']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Certificate Validity Date</strong></div>
                                <div>
                                    <?php echo $row2['W_Certificate_Validity_Date']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Withdrawal Date</strong></div>
                                <div>
                                    <?php echo $row2['W_Withdrawal_Date']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Reason For Withdrawal</strong></div>
                                <div>
                                    <?php echo $row2['W_Reason_for_Withdrawal']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Document</strong></div>
                                <div>
                                    <?php if($row2['W_Document_Upload'] != ''){ ?>
                                    <a href="CBDocument/<?php echo $row2['W_Document_Upload']; ?>" target="_blank"><img
                                            src="images/download.png" style="width:40px;"></a>
                                    <?php } else { echo "File Not Uploaded"; }?>
                                </div>
                            </div>
                        </div>

                        <?php } ?>
                        <!-- Expired Data -->
                        <?php if($row2['Status_of_IndGAP']=='Expired') {?>
                        <!-- <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Name</strong></div>
                                <div>
                                    <?php echo $row2['E_Client_Name']; ?>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Certificate Issue Date</strong></div>
                                <div>
                                    <?php echo $row2['E_Certificate_Issue_Date']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Certificate Validity Date</strong></div>
                                <div>
                                    <?php echo $row2['E_Certificate_Validity_Date']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Document</strong></div>
                                <div>
                                    <?php if($row2['E_Document_Upload'] != ''){ ?>
                                    <a href="CBDocument/<?php echo $row2['E_Document_Upload']; ?>" target="_blank"><img
                                            src="images/download.png" style="width:40px;"></a>
                                    <?php } else { echo "File Not Uploaded"; }?>
                                </div>
                            </div>
                        </div>

                        <?php } ?>

                        <!-- <div class="col-md-4">
                        <div class="border p-3 mb-3">
                            <div><strong>Assessment Report</strong></div>
                            <div>
                                <?php echo $row2['AssessmentReport']; ?>
                            </div>
                        </div>
                    </div> -->
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Assessment Report</strong></h4>
                        <div class="col-md-12">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div><strong>Assessment Report Document</strong></div>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <div>
                                            <?php if($row2['AssessmentReportDocument'] != ''){ ?>
                                            <a href="CBDocument/<?php echo $row2['AssessmentReportDocument']; ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                            <?php } else { echo "File Not Uploaded"; }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Signed Application Form For Registration</strong>
                        </h4>
                        <div class="col-md-12">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div><strong>Document</strong></div>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <div>
                                            <?php if($row2['ClientSignedApplicationFormForRegistration'] != ''){ ?>
                                            <a href="CBDocument/<?php echo $row2['ClientSignedApplicationFormForRegistration']; ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                            <?php } else { echo "File Not Uploaded"; }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Sub-License Certification Agreement</strong></h4>
                        <div class="col-md-12">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div><strong> Document</strong></div>
                                    </div>

                                    <div class="col-md-2 text-right">
                                        <div>
                                            <?php if($row2['CertificationAgreementSigned_Document'] != ''){ ?>
                                            <a href="CBDocument/<?php echo $row2['CertificationAgreementSigned_Document']; ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                            <?php } else { echo "File Not Uploaded"; }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Audit Days</strong></h4>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Audit Man days spent by CB</strong></div>
                                <div>
                                    <?php echo $row2['AuditManDaysSpentByCB']; ?> Days
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>QMS Audit</strong></div>
                                <div>
                                    <?php echo $row2['QMSAudit']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Members Inspections</strong></div>
                                <div>
                                    <?php echo $row2['MembersInspections']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Non-Conformity Reports</strong></h4>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Reports</strong></div>
                                <div>
                                    <?php echo $row2['NonConformityReports']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Corrective Actions</strong></div>
                                <div>
                                    <?php echo $row2['ClientCorrectiveActions']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>CB Closure</strong></div>
                                <div>
                                    <?php echo $row2['CBClosure']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div><strong>Document</strong></div>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div>
                                            <?php if($row2['NonConformityReportsDocument'] != ''){ ?>
                                            <a href="CBDocument/<?php echo $row2['NonConformityReportsDocument']; ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                            <?php } else { echo "File Not Uploaded"; }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div><strong>Document</strong></div>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div>
                                            <?php if($row2['NonConformityReportsDocument_two'] != ''){ ?>
                                            <a href="CBDocument/<?php echo $row2['NonConformityReportsDocument_two']; ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                            <?php } else { echo "File Not Uploaded"; }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div><strong>Document</strong></div>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div>
                                            <?php if($row2['NonConformityReportsDocument_three'] != ''){ ?>
                                            <a href="CBDocument/<?php echo $row2['NonConformityReportsDocument_three']; ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                            <?php } else { echo "File Not Uploaded"; }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Assessment Schedule</strong></h4>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Schedule</strong></div>
                                <div>
                                    <?php echo $row2['CBAssessmentSchedule']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Schedule Date</strong></div>
                                <div>
                                    <?php echo $row2['ScheduleDate']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div><strong>Document</strong></div>
                                    </div>
                                    <div class="col-md-4 text-right">
                                    <div>
                                    <?php if($row2['AssessmentScheduleDocument'] != ''){ ?>
                                    <a href="CBDocument/<?php echo $row2['AssessmentScheduleDocument']; ?>"
                                        target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                    <?php } else { echo "File Not Uploaded"; }?>
                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Scope</strong></h4>
                        <!-- <div class="col-md-4">
                        <div class="border p-3 mb-3">
                            <div><strong>Certificate Agreement Signed Document Name</strong></div>
                            <div>
                                <?php echo $row2['CertificationAgreement_Document_Name']; ?>
                            </div>
                        </div>
                    </div> -->
                        <div class="col-md-6">
                            <div class="border p-3 mb-3">
                                <div><strong>Applied Status</strong></div>
                                <div>
                                    <?php echo $row2['ScopeStatus']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div><strong> Document</strong></div>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <div>
                                            <?php if($row2['Scope_Document'] != ''){ ?>
                                            <a href="CBDocument/<?php echo $row2['Scope_Document']; ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                            <?php } else { echo "File Not Uploaded"; }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border p-3 mb-3">
                                <div><strong>Granted Scope</strong></div>
                                <div>
                                <?php echo $row2['GrantedScopeStatus']; ?>
                            </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div><strong> Document</strong></div>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <div>
                                        <?php if($row2['Granted_Scope_Document'] != ''){ ?>
                                        <a href="CBDocument/<?php echo $row2['Granted_Scope_Document']; ?>" target="_blank"><img
                                                src="images/download.png" style="width:40px;"></a>
                                        <?php } else { echo "File Not Uploaded"; }?>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Scope Status Document Name</strong></div>
                                <div>
                                    <?php echo $row2['Scope_Document_Name']; ?>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Qualified Internal Inspectors/Auditors</strong></h4>
                        <div class="col-md-6">
                            <div class="border p-3 mb-3">
                                <div><strong>Inspectors</strong></div>
                                <div>
                                    <?php echo $row2['Clientqualifiedinternalinspectors']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div><strong>Inspectors Document</strong></div>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <div>
                                            <?php if($row2['ClientqualifiedinternalinspectorsDocument'] != ''){ ?>
                                            <a href="CBDocument/<?php echo $row2['ClientqualifiedinternalinspectorsDocument']; ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                            <?php } else { echo "File Not Uploaded"; }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border p-3 mb-3">
                                <div><strong>Auditors</strong></div>
                                <div>
                                    <?php echo $row2['ClientqualifiedInternalAuditors']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div><strong>Auditors Document</strong></div>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <div>
                                            <?php if($row2['ClientqualifiedInternalAuditorsDocument'] != ''){ ?>
                                            <a href="CBDocument/<?php echo $row2['ClientqualifiedInternalAuditorsDocument']; ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                            <?php } else { echo "File Not Uploaded"; }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Mass Balance Register</strong></h4>
                        <div class="col-md-12">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div><strong>Certificate</strong></div>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <div>
                                            <?php if($row2['MassBalanceGranting_Document'] != ''){ ?>
                                            <a href="CBDocument/<?php echo $row2['MassBalanceGranting_Document']; ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                            <?php } else { echo "File Not Uploaded"; }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Granting Certificate Name</strong></div>
                                <div>
                                    <?php echo $row2['MassBalanceGranting_Document_Name']; ?>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Granting Certificate Date</strong></div>
                                <div>
                                    <?php echo $row2['MassBalanceGranting_Document_Date']; ?>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>CB Procedure Assessment and Inspection</strong></h4>
                        <div class="col-md-12">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div><strong>Document</strong></div>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <div>
                                            <?php if($row2['CBProcedure_Document'] != ''){ ?>
                                            <a href="CBDocument/<?php echo $row2['CBProcedure_Document']; ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                            <?php } else { echo "File Not Uploaded"; }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Feedback</strong></h4>
                        <!-- <div class="col-md-4">
                        <div class="border p-3 mb-3">
                            <div><strong>CB Procedure Upload Document Name</strong></div>
                            <div>
                                <?php echo $row2['CBProcedure_DocumentName']; ?>
                            </div>
                        </div>
                    </div> -->
                        <div class="col-md-12">
                            <div class="border p-3 mb-3">
                                <div><strong>Feedback</strong></div>
                                <div>
                                    <?php echo $row2['ClientFeedback']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Complaints</strong></h4>
                        <div class="col-md-6">
                            <div class="border p-3 mb-3">
                                <div><strong>Description of Complaint</strong></div>
                                <div>
                                    <?php echo $row2['DescriptionOfCompliance']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div><strong>Document</strong></div>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <div>
                                        <?php if($row2['DescriptionOfCompliance_Document'] != ''){ ?>
                                        <a href="CBDocument/<?php echo $row2['DescriptionOfCompliance_Document']; ?>"
                                            target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                        <?php } else { echo "File Not Uploaded"; }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Other</strong></h4>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div><strong>Other Document</strong></div>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div>
                                            <?php if($row2['OtherDocument'] != ''){ ?>
                                            <a href="CBDocument/<?php echo $row2['OtherDocument']; ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                            <?php } else { echo "File Not Uploaded"; }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Document Name</strong></div>
                                <div>
                                    <?php echo $row2['OtherDocument_Name']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Document Description</strong></div>
                                <div>
                                <?php echo $row2['OtherDocument_Discription']; ?>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
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
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has been the
                            industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and
                            scrambled it to make a type specimen book. It has survived not only five centuries, but
                            also the leap into
                            electronic typesetting, remaining essentially unchanged.</p>
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