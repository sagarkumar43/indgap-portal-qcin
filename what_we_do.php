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
       .heading , .alignment li{
            text-align:justify;
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
                <div class="row">
                    <p class="heading">Digital Platform can play a crucial role in creating visibility between food safety certified
suppliers and buyers in the food supply chain. Connecting Certified farm produce to the
Market Place via a Digital Platform” with the objective of increase in income for the
farmers/processors and facilitating safe food for the consumers</p>
 <p class="heading"><b>Challenges in the identification, procurement, and export of quality and certified food
products</b> </p>
                    <ul class="alignment">
                        <li>Sourcing of quality &amp; certified produce is a real pain point for the buyers and similarly finding
premium buyers is a pain point for the producers. Exporters, importers, and domestic
premium buyers are looking for digital connectivity for procuring quality products
conforming to international standards such as Global G.A.P, IndG.A.P, Organic NPOP,
Organic NOP, FSSC22000, ISO 22000, BRC Global Food, Fair Trade, Rain Forest alliance, Social
Accountability International, etc.</li>
                        <li>Awareness of the export documentation for Agri commodities.</li>
                    </ul>
                    
                    <p class="heading">Technology can play a crucial role in facilitating the visibility of both suppliers and buyers. Both
will have global access beyond borders. This can reduce the role of middlemen and thereby
facilitate income increase for the suppliers and reduced cost to the buyers.</p>
<p class="heading">The focus is on not only the export market but also the domestic premium market which
is ready to pay a price for quality &amp; safe produce.</p>

                   
                    <h5 class="mt-2 mb-3"><b>How the Platform works</b></h5>
                    <ul class="alignment">
                        <li>Food safety-certified suppliers can upload information about the origin, production
methods, certifications and quality of their products</li>
                        <li>Buyers can access this information to ensure compliances with food safety standards and
other regulatory requirements. This traceability and transparency helps build trust between
suppliers and buyers and promotes responsible sourcing practices</li>
                        <li>In the next phase, an echo system will be created in such a way that suppliers can be digitally
audited and monitored online by the buyers, which will include a mini data storage device
that is linked to the product-related data shared with applications like QR code, etc., which
will serve as a digital identifier on a physical product.</li>
                        <li>Face-to-face video communication between the certified producers and the buyers to facilitate trade deals.</li>
                        <li>Update on Export and Import documentation on Agri Commodities.</li>
                    </ul>
                    <p class="heading">Overall, KrishiGAP platform provide a digital infrastructure that connects suppliers and buyers,
enabling increased visibility, transparency, efficiency, increase in income to the framers/processors ,
safe food to the consumers ,improved supply chain and customer satisfaction</p>
                </div>
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
</body>

</html>