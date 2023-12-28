<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
error_reporting(0);
include("connection.php");
 $select = "SELECT * FROM `export_document` WHERE Standard='$_GET[standard]' AND Country='$_GET[country]' AND DeletedStatus='0'";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Efresh FPO</title>
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
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        .form-floating>.form-control:focus,
        .form-floating>.form-control:not(:placeholder-shown) {
            padding-top: 0.625rem;
            padding-bottom: 0.625rem;
        }
    </style>
</head>

<body>
    <?php include("main-header.php") ?>
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active" style="background: url(assets/img/slide/slide-1.jpg)">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <!-- <h2 class="animate__animated animate__fadeInDown" style="color:#fff !important;">Welcome to <span>Market Linkages Platform</span></h2> -->
                                <!--<a href="homepage_details.php" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>-->
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="background: url(assets/img/slide/slide4.jpg)">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <!-- <h2 class="animate__animated fanimate__adeInDown" style="color:#fff !important;">Welcome to <span>Market Linkages Platform</span></h2> -->
                                <!--<a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>-->
                            </div>
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
    <main id="main">
        <section id="featured" class="featured">
            
            <div class="container">
            <div class="col-md-2">
                           <h5>&nbsp;</h5>
                           <a href="export_about.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">About This Section</a>
                        </div>
                <form  method="get">
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <h5>Compliances</h5>
                            <div class="form-floating">
                                <select name="standard" class="form-control" required="" id="compliances">
                                    <option <?php if($_GET['standard'] == 'compliances') { echo "Selected"; } ?> value="compliances">--Select--</option>
                                    <option <?php if($_GET['standard'] == 'General') { echo "Selected"; } ?> value="General" >General</option>
                                    <option <?php if($_GET['standard'] == 'FSSAI') { echo "Selected"; } ?> value="FSSAI" >FSSAI</option>
                                    <option <?php if($_GET['standard'] == 'DGFT') { echo "Selected"; } ?> value="DGFT">DGFT</option>
                                    <option <?php if($_GET['standard'] == 'APEDA') { echo "Selected"; } ?> value="APEDA">APEDA</option>
                                    <option <?php if($_GET['standard'] == 'ExportInspectionCouncil') { echo "Selected"; } ?> value="ExportInspectionCouncil">Export Inspection Council</option>
                                    <option <?php if($_GET['standard'] == 'DirectorateofPlantProtection') { echo "Selected"; } ?> value="DirectorateofPlantProtection">Directorate of Plant Protection</option>
                                    <option <?php if($_GET['standard'] == 'Customs') { echo "Selected"; } ?> value="Customs" >Customs</option>
                                    <option <?php if($_GET['standard'] == 'Others') { echo "Selected"; } ?> value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <h5>Commodity</h5>
                            <div class="form-floating">
                                <select name="od" class="form-control" required="" id="compliances">
                                    <option value="compliances">--Select Commodities--</option>
                                    <option value="Test" >Test</option>
                                    <option value="Testing" >Testing</option>
                                    <option value="123" >123</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="col-md-4">
                            <h5>Country</h5>
                            <div class="form-floating">
                                <select name="country" class="form-control" required="" id="compliances">
                                    <option value="compliances">--Select--</option>
                                    <option value="India" <?php if($_GET['country'] == 'India') { echo "Selected"; } ?> >India</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5>&nbsp;</h5>
                                <button class="btn btn-primary w-100 py-3" type="submit">Show Result</button>
                            <!-- <input type="submit" name="show" value="Show Result"  class="btn btn-primary w-100 py-3"> -->
                        </div>
                    </div>
                    
                </form>
            </div>
        </section>
      

        <section class="export" id="export">
            <?php  $numdt += mysqli_num_rows(mysqli_query($db, "$select"));
                           if ($numdt > 0) {?>
            <div class="container">
                <h2 class="text-center">EXPORT</h2>
                <div class="row mt-3">
                    <div class="col-md-3"><b>Document Name</b></div>
                    <div class="col-md-3"><b>Document</b></div>
                    <div class="col-md-3"><b>Document Source</b></div>
                    <div class="col-md-3"><b>Source Link</b></div>
                </div>
                <?php
                   
                    $execute = mysqli_query($db,$select);
                    $count = 1;
                    while($read = mysqli_fetch_assoc($execute))
                    {
                ?>
                <div class="row mt-4">
                    <div class="col-md-3"><?php echo $count; ?>.  <?php echo $read['Doc_Name']; ?></div>
                    <div class="col-md-3"><a href="ExportDocuments/export/<?php echo $read['Document']; ?>" target="_blank"><img src="assets/img/pdf.png" alt=""
                                style="width: 12%;"></a></div>
                    <div class="col-md-3"><?php echo $read['Doc_Source']; ?></div>
                    <div class="col-md-3">
                        <p style="overflow-y: auto;">
                            <a href="<?php echo $read['Source_Link']; ?>" target="_blank"><?php echo $read['Source_Link']; ?></a>
                        </p>
                    </div>
                </div>
                <?php $count++; } ?>
                <!-- <div class="row mt-4">
                    <div class="col-md-3">Agmark grading Procedure for export to EU</div>
                    <div class="col-md-3"><a href="assets/Agmark-grading-procedure-for-export-to-EU.docx" target="_blank"><img src="assets/img/pdf.png" alt=""
                                style="width: 12%;"></a></div>
                    <div class="col-md-3">Directorate of marketing & Inspection, Ministry of Agriculture</div>
                    <div class="col-md-3">
                        <p style="overflow-y: auto;">
                            <a href="https://dmi.gov.in/GradesStandard.aspx"
                                target="_blank">https://dmi.gov.in/GradesStandard.aspx</a>
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">Procedure for issuance of PhytoSanitary Certificate and issuance offices</div>
                    <div class="col-md-3"><a href="assets/Procdure-for-Phyto-Sanitary-Certificate-Issuance.docx" target="_blank"><img src="assets/img/pdf.png" alt=""
                                style="width: 12%;"></a></div>
                    <div class="col-md-3">Directorate of Plant Protection ,Quarantine and Storage</div>
                    <div class="col-md-3">
                        <p style="overflow-y: auto;">
                            <a href="https://ppqs.gov.in/"
                                target="_blank">https://ppqs.gov.in/</a>
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">Registration with APEDA for Export</div>
                    <div class="col-md-3"><a href="assets/Registration-with-APEDA-for-Export.docx" target="_blank"><img src="assets/img/pdf.png" alt=""
                                style="width: 12%;"></a></div>
                    <div class="col-md-3">APEDA</div>
                    <div class="col-md-3">
                        <p style="overflow-y: auto;">
                            <a href="https://apeda.gov.in/"
                                target="_blank">https://apeda.gov.in/</a>
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">General Compliances for Export of Agri Products</div>
                    <div class="col-md-3"><a href="assets/General-Compliances-for-Export-of-Agri-Products.docx" target="_blank"><img src="assets/img/pdf.png" alt=""
                                style="width: 12%;"></a></div>
                    <div class="col-md-3">Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports</div>
                    <div class="col-md-3">
                        <p style="overflow-y: auto;">
                            <a href="#"
                                target="_blank"></a>
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">Product Wise Compliances for Export of Agri products</div>
                    <div class="col-md-3"><a href="assets/Product-Wise-Compliances-for-Export-of-Agri-products.docx" target="_blank"><img src="assets/img/pdf.png" alt=""
                                style="width: 12%;"></a></div>
                    <div class="col-md-3">APEDA</div>
                    <div class="col-md-3">
                        <p style="overflow-y: auto;">
                            <a href="https://apeda.gov.in/" target="_blank">https://apeda.gov.in/</a>
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">Fresh Fruits and Vegetables Notified under Agmark Act</div>
                    <div class="col-md-3"><a href="assets/Fresh-Fruits-and-Vegetables-Notified-under-Agmark-Act.docx" target="_blank"><img src="assets/img/pdf.png" alt=""
                                style="width: 12%;"></a></div>
                    <div class="col-md-3">Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports</div>
                    <div class="col-md-3">
                        <p style="overflow-y: auto;">
                            <a href="#"
                                target="_blank"></a>
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">Phytosanitary Certificate</div>
                    <div class="col-md-3"><a href="assets/Phyto-Sanitary-Certificate-Issuance.docx" target="_blank"><img src="assets/img/pdf.png" alt=""
                                style="width: 12%;"></a></div>
                    <div class="col-md-3">Trade Notices/Advisories/Export Procedures issued by APEDA/DMI from time to time to facilitate exports</div>
                    <div class="col-md-3">
                        <p style="overflow-y: auto;">
                            <a href="#"
                                target="_blank"></a>
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">Certificate of Origin</div>
                    <div class="col-md-3"><a href="assets/Certificate-of-Origin.docx" target="_blank"><img src="assets/img/pdf.png" alt=""
                                style="width: 12%;"></a></div>
                    <div class="col-md-3">Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports</div>
                    <div class="col-md-3">
                        <p style="overflow-y: auto;">
                            <a href="https://apeda.gov.in/" target="_blank">https://apeda.gov.in/</a>
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">Certificate of Conformity</div>
                    <div class="col-md-3"><a href="assets/Certificate-of-Conformity.docx" target="_blank"><img src="assets/img/pdf.png" alt=""
                                style="width: 12%;"></a></div>
                    <div class="col-md-3">Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports</div>
                    <div class="col-md-3">
                        <p style="overflow-y: auto;">
                            <a href="https://apeda.gov.in/" target="_blank">https://apeda.gov.in/</a>
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">Certificate of Analysis</div>
                    <div class="col-md-3"><a href="assets/Certificate-of-Analysis.docx" target="_blank"><img src="assets/img/pdf.png" alt=""
                                style="width: 12%;"></a></div>
                    <div class="col-md-3">Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports</div>
                    <div class="col-md-3">
                        <p style="overflow-y: auto;">
                            <a href="https://apeda.gov.in/" target="_blank">https://apeda.gov.in/</a>
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">Authenticity Certificate</div>
                    <div class="col-md-3"><a href="assets/Authenticity-Certificate.docx" target="_blank"><img src="assets/img/pdf.png" alt=""
                                style="width: 12%;"></a></div>
                    <div class="col-md-3">Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports</div>
                    <div class="col-md-3">
                        <p style="overflow-y: auto;">
                            <a href="https://apeda.gov.in/" target="_blank">https://apeda.gov.in/</a>
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">Health Certificate to European Countries</div>
                    <div class="col-md-3"><a href="assets/Health-Certificate-to-European-Countries.docx" target="_blank"><img src="assets/img/pdf.png" alt=""
                                style="width: 12%;"></a></div>
                    <div class="col-md-3">Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports</div>
                    <div class="col-md-3">
                        <p style="overflow-y: auto;">
                            <a href="https://apeda.gov.in/" target="_blank">https://apeda.gov.in/</a>
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">Agmark Grading Certificate procedure for export of fresh fruits and vegetables to European countries</div>
                    <div class="col-md-3"><a href="assets/Agmark-Grading-Certificate-to-European-Countries.docx" target="_blank"><img src="assets/img/pdf.png" alt=""
                                style="width: 12%;"></a></div>
                    <div class="col-md-3">Trade Notices/Advisories/Export Procedures issued by APEDA/DMI from time to time to facilitate exports</div>
                    <div class="col-md-3">
                        <p style="overflow-y: auto;">
                            <a href="#"
                                target="_blank"></a>
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">Agmark Grading Certificate for Onions</div>
                    <div class="col-md-3"><a href="assets/Agmark-Grading-for-Onion.docx" target="_blank"><img src="assets/img/pdf.png" alt="" style="width: 12%;"></a></div>
                    <div class="col-md-3">Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports</div>
                    <div class="col-md-3">
                        <p style="overflow-y: auto;">
                            <a href="#" target="_blank"></a>
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">Agmark Grading Certificate for Grapes</div>
                    <div class="col-md-3"><a href="assets/Agmark-Grading-for-Grapes.docx" target="_blank"><img src="assets/img/pdf.png" alt="" style="width: 12%;"></a></div>
                    <div class="col-md-3">Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports</div>
                    <div class="col-md-3">
                        <p style="overflow-y: auto;">
                            <a href="#" target="_blank"></a>
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">Agmark Grading Certificate for Pomegranates</div>
                    <div class="col-md-3"><a href="assets/Agmark-Grading-Pomegranates.docx" target="_blank"><img src="assets/img/pdf.png" alt="" style="width: 12%;"></a></div>
                    <div class="col-md-3">Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports</div>
                    <div class="col-md-3">
                        <p style="overflow-y: auto;">
                            <a href="#" target="_blank"></a>
                        </p>
                    </div>
                </div> 
                <div class="row mt-4">
                    <div class="col-md-3">FSSAI Food Safety License for processed foods</div>
                    <div class="col-md-3"><a href="assets/FSSAI-Food-Safety-License-for-processed-foods.docx" target="_blank"><img src="assets/img/pdf.png" alt="" style="width: 12%;"></a></div>
                    <div class="col-md-3">Food Safety and Standards Authority of India</div>
                    <div class="col-md-3">
                        <p style="overflow-y: auto;">
                            <a href="https://www.fssaiindia.in/documents-and-Procedures/" target="_blank">https://www.fssaiindia.in/documents-and-Procedures/</a>
                        </p>
                    </div>
                </div> -->
            </div>
            <?php } ?>
        </section>
       
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
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script>


// function showdata()
// {
//     $(document).click(function(){
//         $('#compliances').on('click',function(){
//             alert($(this).val();)
//         })
//     })
// }



            //     $(document).change(function () {
            //     $('#export').hide();
            //     $('#import').hide();
            //     //listen for the dropdown change
            //     $('#compliances').change(function () {
            //     if ($(this).val() == 'Import') {
            //     //remove the element from dom
            //     $('#import').show();
            //     $('#export').hide();
                
            //     }
            //     else if ($(this).val() == 'Export') {
            //         $('#export').show();
            //         $('#import').hide();
            //     }
            //     else
            //     {
            //         $('#export').hide();
            //         $('#import').hide();
            //     }
            // });

            // })
    
      // }
    </script>
</body>

</html>