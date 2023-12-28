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
    <title>Cluster View Details</title>
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
    <link rel="stylesheet" href="http://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
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
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a
                        href="mailto:contact@example.com">contact@example.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+91-9898989898</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <h1><a href="buyer-profile.php">Logo Here</a></h1>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="buyer-profile.php">Home</a></li>
                    <li><a href="buyer-looking.php">About</a></li>
                    <li><a href="buyer-looking.php">Contact us</a></li>
                    <li class="dropdown">
                        <a href="#"><span>Useful links</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li>
                    <li><a href="home.php"
                            class="btn-get-started animate__animated animate__fadeInUp logout-btn">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide 1 -->
                    <div class="carousel-item active" style="background: url(assets/img/slide/slide-1.jpg)">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown" style="color:#fff !important;">Welcome
                                    to <span>Market Linkage Farm Produce</span></h2>
                                <a href="#" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item" style="background: url(assets/img/slide/slide-4.jpg)">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated fanimate__adeInDown" style="color:#fff !important;">Welcome
                                    to <span>Market Linkage Farm Produce</span></h2>
                                <a href="#" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
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
    <!-- End Hero -->

    <main id="main">
        <!-- ======= Featured Section ======= -->
        <section id="featured" class="featured">
            <div class="container">
                <div class="row">
                    <div class="container mt-5 mb-5">
                        <div class="section-title">
                            <h2>View Cluster Details</h2>
                        </div>
                        <!-- <div class="text-right">
                                <a href="add-cluster-farmer-details.php" class="btn btn-success mb-2">Add Cluster Farmer's Details</a>
                             </div> -->
                        <div class="table-1" style="overflow: auto;">
                            <table class="table table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th>S.No. </th>
                                        <th>Collection Center</th>
                                        <th>Season</th>
                                        <th>Variety Name</th>
                                        <th>Total Qty ( in MT )</th>
                                        <th>Qty Sold ( in MT )</th>
                                        <th>Qty Balance ( in MT )</th>
                                        <th>Food Safty Certification</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $select = "SELECT * FROM `cluster_production` ORDER BY CollectionCenter DESC LIMIT 5";
                                        $execute = mysqli_query($db,$select);
                                        $count = 1;
                                        while($read = mysqli_fetch_assoc($execute))
                                        {
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $read['CollectionCenter']; ?></td>
                                        <td><?php echo $read['SeasonName']; ?></td>
                                        <td><?php echo $read['VarietyName']; ?></td>
                                        <td><?php echo $read['TotalQtyInMT']; ?></td>
                                        <td><?php echo $read['QtySoldInMT']; ?></td>
                                        <td><?php echo $read['QtyBalanceInMT']; ?></td>
                                        <td><?php echo $read['FoodSaftyCertification']; ?></td>
                                    </tr>
                                    <?php $count++; } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="section-title">
                        <a href="index.php" class="btn btn-success mb-2">For More Details to Login here</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Featured Section -->
    </main><!-- End #main -->



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
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        </p>
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
                Design &amp; Developed by <a href="https://aretesoftwares.com/">Aretesoftwares.com</a>
            </div>
        </div>
    </footer>
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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="http://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
        $(document).ready( function () {
    $('#example').DataTable();
} );
    </script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>