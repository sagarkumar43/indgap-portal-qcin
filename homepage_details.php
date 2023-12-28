<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>About - Eterna Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Eterna - v4.7.0
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <!-- <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a
                        href="mailto:contact@example.com">contact@example.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </section> -->

    <!-- ======= Header ======= -->
    <?php include "main-header.php"; ?>
    <!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <!-- <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>About Us</li>
                    </ol> -->
                    <?php 
                            $select = "SELECT * FROM `about_website`";
                            $exe = mysqli_query($db,$select);
                            $read = mysqli_fetch_assoc($exe)
                        ?>
                <h1 class="text-center"><?php echo $read['Heading']; ?></h1>
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-lg-6">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="">
                    </div> -->
                    <div class="col-lg-12 pt-4 pt-lg-0 content">
                        <p class="text-justify"><?php echo $read['details']; ?></p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Counts Section ======= -->
        <!-- <section id="counts" class="counts">
            <div class="container">

                <div class="row no-gutters">

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Happy Clients</strong> consequuntur quae qui deca rode</p>
                            <a href="#">Find out more &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Projects</strong> adipisci atque cum quia aut numquam delectus</p>
                            <a href="#">Find out more &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="bi bi-headset"></i>
                            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Hours Of Support</strong> aut commodi quaerat. Aliquam ratione</p>
                            <a href="#">Find out more &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Hard Workers</strong> rerum asperiores dolor molestiae doloribu</p>
                            <a href="#">Find out more &raquo;</a>
                        </div>
                    </div>

                </div>

            </div>
        </section> -->
        <!-- End Counts Section -->

        <!-- ======= Clients Section ======= -->
        <!-- <section id="clients" class="clients">
            <div class="container">

                <div class="section-title">
                    <h2>Clients</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section> -->
        <!-- End Clients Section -->

        <!-- ======= Testimonials Section ======= -->
        <!-- <section id="testimonials" class="testimonials">
            <div class="container">

                <div class="section-title">
                    <h2>Testimonials</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                            <h3>Saul Goodman</h3>
                            <h4>Ceo &amp; Founder</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                risus at semper.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="testimonial-item mt-4 mt-lg-0">
                            <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                            <h3>Sara Wilsson</h3>
                            <h4>Designer</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                legam anim culpa.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="testimonial-item mt-4">
                            <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                            <h3>Jena Karlis</h3>
                            <h4>Store Owner</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam
                                duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="testimonial-item mt-4">
                            <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                            <h3>Matt Brandon</h3>
                            <h4>Freelancer</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat
                                minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore
                                labore illum veniam.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="testimonial-item mt-4">
                            <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                            <h3>John Larson</h3>
                            <h4>Entrepreneur</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam
                                culpa fore nisi cillum quid.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="testimonial-item mt-4">
                            <img src="assets/img/testimonials/testimonials-6.jpg" class="testimonial-img" alt="">
                            <h3>Emily Harison</h3>
                            <h4>Store Owner</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Eius ipsam praesentium dolor quaerat inventore rerum odio. Quos laudantium adipisci
                                eius. Accusamus qui iste cupiditate sed temporibus est aspernatur. Sequi officiis ea et
                                quia quidem.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section> -->
        <!-- End Testimonials Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include "footer.php";?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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

</body>

</html>