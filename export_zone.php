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
                    <div class="col-md-4">
                        <h5>Country</h5>
                        <div class="form-floating">
                            <select name="od" class="form-control" required="" id="compliances">
                                <option value="compliances">--Select Country--</option>
                                <option value="India" >India</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5>State</h5>
                        <div class="form-floating">
                            <select name="od" class="form-control" required="" id="compliances">
                                <option value="compliances">--Select State--</option>
                                <option value="North West" >North West</option>
                                <option value="South East" >South East</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5>&nbsp;</h5>
                         <!-- <button class="btn btn-primary w-100 py-3" type="submit" onclick="showdata()">Show Result</button> -->
                        <input type="submit" value="Show Result"  class="btn btn-primary w-100 py-3">
                    </div>
                   
                </div>
            </div>
        </section>
        <section class="import" id="import">
            <div class="container">
                <h2 class="text-center">AGRI EXPORT ZONE</h2>
                <div class="row mt-3">
                    <div class="col-md-3"><b>Document Name</b></div>
                    <div class="col-md-3"><b>Document</b></div>
                    <div class="col-md-3"><b>Document Source</b></div>
                    <div class="col-md-3"><b>Source Link</b></div>
                </div>
                <div class="row mt-4">
                    <!-- <div class="col-md-3">test</div>
                    <div class="col-md-3"><a href="#" target="_blank"><img src="assets/img/pdf.png" alt=""
                                style="width: 12%;"></a></div>
                    <div class="col-md-3">test</div>
                    <div class="col-md-3">
                        <p style="overflow-y: auto;">
                            <a href="https://drive.google.com/file/d/1G2jVDEsKuK1Wwby1ELYgUrDA64UeQEFt/view?usp=sharing"
                                target="_blank">https://drive.google.com/file/d/1G2jVDEsKuK1Wwby1ELYgUrDA64UeQEFt/view?usp=sharing</a>
                        </p>
                    </div> -->
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