<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
session_start();
error_reporting(0);
$FPO_Registration_ID=$_SESSION['FPO_Registration_ID'];
if ($_SESSION['FPO_Registration_ID'] == '') {
    header("Location: fpo-login.php");
}
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Extra Details</title>
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

<body style="background-image: url('images/fpo-bg2.jpg');background-repeat: repeat-y;background-position: center;">
    <?php include "fpo_header.php";?>
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
        <div class="section-title">
            <h2>Extra Details</h2>
        </div>
       
        <div class="container">
            <div class="row">
                <?php 
                    $extra = mysqli_query($db,"SELECT * FROM `fpo_extra_details` WHERE DeletedStatus='0' AND FPO_Registration_ID='$FPO_Registration_ID'");
                    $read = mysqli_fetch_assoc($extra);
                    $deleteStatus = $read['DeletedStatus'];
                ?>
                <div class="col-md-12 mb-3 text-end">
                    <a href="edit_extra_details.php" rel="noopener noreferrer" class="btn btn-info">Edit</a>
                       
                        <a onclick="return confirm('Are you sure want to delete?')" href="delete_extra_details.php?id=<?php echo $read['ID']; ?>" rel="noopener noreferrer" class="btn btn-danger">Delete</a>
                        <?php  
                            if(mysqli_num_rows($extra) > 0) { } else {
                        ?>
                        <a href="add_extra_details.php" rel="noopener noreferrer" class="btn btn-success">Add Extra
                        Details</a>
                        <?php } ?>
                </div>
            </div>
        </div>
 
        <div class="container mb-5 pt-0">
           
            <div class="row">
                <div class="sprt-box">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Certificate No</strong></div>
                                <div>
                                    <?php echo $read['CertificateNo'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Standard</strong></div>
                                <div>
                                    <?php echo $read['document_standard'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Certificated Date</strong></div>
                                <div>
                                    <?php echo $read['CertificateDate']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong> Certificated End Date</strong></div>
                                <div>
                                    <?php echo $read['CertificateEndDate']; ?>
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
                                            <a href="assets/extra_details_docs/<?php echo $read['CertificateUpload'] ?>"
                                                target="_blank"><img src="images/download.png" style="width:35px;"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <h4>Certification Body Audit Report</h4>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="border p-3 mb-3">
                                <div><strong>Report Number</strong></div>
                                <div>
                                    <?php echo $read['ReportNumber_Audit_report'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div><strong>Certificate</strong></div>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div>
                                            <a href="assets/extra_details_docs/<?php echo $read['ReportNumber_Audit_doc_Upload'] ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <h4>Produce Test Reports</h4>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="border p-3 mb-3">
                                <div><strong>Report Number</strong></div>
                                <div>
                                    <?php echo $read['Produce_Report_Number'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div><strong>Certificate</strong></div>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div>
                                            <a href="assets/extra_details_docs/<?php echo $read['Produce_Report_Number_Doc_Upload'] ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <h4>Products Covered under Certification</h4>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Product Name</strong></div>
                                <div>
                                    <?php echo $read['Produce_Report_Number'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div><strong>Product Image</strong></div>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div>
                                            <a href="assets/extra_details_docs/<?php echo $read['ProductImage'] ?>"
                                                target="_blank"><img
                                                    src="assets/extra_details_docs/<?php echo $read['ProductImage'] ?>"
                                                    style="width:40px;" alt="image"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Product Specification</strong></div>
                                <div style="height: 80px;overflow-y: scroll;">
                                    <?php echo $read['ProductSpecification'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <h4>Mass Balance Register</h4>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div><strong>Mass Balance Granting Certificate</strong></div>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div>
                                            <a href="assets/extra_details_docs/<?php echo $read['MassBalanceGranting_Document'] ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border p-3 mb-3">
                                <div><strong>Document Name</strong></div>
                                <div>
                                    <?php echo $read['MassBalanceGranting_Document_Name'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Signed Application Form</strong></h4>
                        <div class="col-md-12">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div><strong>Signed Application Form For Registration Certificate</strong></div>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <div>
                                            <a href="assets/extra_details_docs/<?php echo $read['Sub_License_Certification_Agreement_Document'] ?>"
                                                target="_blank"><img src="images/download.png" style="width:40px;"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Sub-License Certification</strong></h4>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div><strong>Certification Agreement Signed</strong></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div>
                                            <a href="assets/extra_details_docs/<?php echo $read['Sub_License_Certification_Agreement_Document'] ?>" target="_blank"><img
                                                    src="images/download.png" style="width:40px;"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Document Name</strong></div>
                                <div>
                                    <?php echo $read['Sub_License_Certification_Agreement_Document_Name'] ?> </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Date</strong></div>
                                <div>
                                <?php echo $read['Sub_License_Certification_Agreement_Document_Date'] ?>  </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Overall Responsible Person</strong></h4>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Location Address</strong></div>
                                <div>
                                    <?php echo $read['Overall_Responsible_person_name'] ?> </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div><strong>Position</strong></div>
                                <div>
                                <?php echo $read['Overall_Responsible_person_position'] ?>  </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div><strong>Photo</strong></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div>
                                            <a href="assets/extra_details_docs/<?php echo $read['Overall_Responsible_person_image'] ?>" target="_blank"><img
                                                    src="assets/extra_details_docs/<?php echo $read['Overall_Responsible_person_image'] ?>" alt="img" style="width:40px;"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Registered office/premises</strong></h4>
                        <div class="col-md-6">
                            <div class="border p-3 mb-3">
                                <div><strong>Location Address</strong></div>
                                <div>
                                    <?php echo $read['Location_address'] ?> </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div><strong>Photo</strong></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div>
                                            <a href="assets/extra_details_docs/<?php echo $read['Registred_office_photo'] ?>" target="_blank"><img src="assets/extra_details_docs/<?php echo $read['Registred_office_photo'] ?>" alt="img" style="width:40px;"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Virtual Tour of Production Facilities</strong></h4>
                        <div class="col-md-12">
                            <div class="border p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div><strong>Photo</strong></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div>
                                            <a href="assets/extra_details_docs/<?php echo $read['Virtual_Tour_Facilities_Photo'] ?>" target="_blank"><img src="assets/extra_details_docs/<?php echo $read['Virtual_Tour_Facilities_Photo'] ?>" alt="img" style="width:40px;"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Copies of Regulatory Licenses Obtained</strong></h4>
                         <div class="col-md-12">
                            <div class="border p-3 mb-3">
                                <div class="mb-4"><strong>Document Name</strong></div>
                                <div class="row">
                                    <?php
                                        $GrossRevenue_CropName = explode(",", $read['Copies_of_regulartory_License_Document_name']);
                                        $GrossRevenue_CropImage = explode(",", $read['Copies_of_regulartory_License_Document_docu']);
                                        $numDocuments = count($GrossRevenue_CropName);

                                        for ($i = 0; $i < $numDocuments; $i++) {
                                            $documentName = $GrossRevenue_CropName[$i];
                                            $documentImage = "assets/extra_details_docs/" . $GrossRevenue_CropImage[$i];
                                        ?>
                                    <style>
                                        .m-box-1 {
                                            border: 1px #d1d1d1 solid;
                                            border-radius: 8px;
                                            background: #fff;
                                        }

                                        .doc-box-1 {}

                                        .doc-box-pdf {}
                                    </style>
                                    <div class="col-md-4">
                                        <div class="m-box-1 text-center p-3 mb-4">
                                            <div class="doc-box-1 pb-3">
                                                <?php echo $documentName; ?>
                                            </div>

                                            <div class="doc-box-pdf pb-2">
                                                <a href="<?php echo $documentImage; ?>" target="_blank">
                                                    <img src="images/download.png" alt="img" style="width:40px;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sprt-box">
                    <div class="row">
                        <h4 class="heading-text mt-3 mb-3"><strong>Miscellaneous</strong></h4>
                        <div class="col-md-12">
                            <div class="border p-3 mb-3">
                                <div><strong>Miscellaneous</strong></div>
                                <div>
                                    <?php echo $read['miscellaneous']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
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
</body>

</html>