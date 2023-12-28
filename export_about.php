<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
error_reporting(0);
include("connection.php");
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
    <section id="hero" style="margin-bottom:40px!important;">
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
                <h2>Proper documentation and compliances are critical to the export process.</h2>
                <p>Export documentation plays a vital role in international marketing as it facilitates the smooth flow of goods and payments thereof across national frontiers. It is widely considered as the heart and soul of international business as no form of international business can be done without the presence of proper documentation. These documents must be properly and correctly filled The exporter needs to meet regulatory compliances of the exporting and importing countries and also customer requirements. This may include general and product wise requirements In India several promoting and regulatory institutions are involved in the export of agricultural and processed foods such as APEDA, Department of Plant Protection, Ministry of Agriculture, DGFT, FSSAI, Customs, and Export Inspection Council The certificates that are to be obtained include, Phytosanitary, Certificate of Origin, Certificate of Conformity, Certificate Analysis, Health certificate, Grading Certificate etc.</p>

                <p><strong>In this section Krishi GAP made attempts to provide the best possible information on the institutions involved and their role in exports. You need to visit the websites of these  institutions for the updates asthese are changed quite often.</strong></p>
               
            </div>
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