<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Title Here</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    .col-md-2 {
    flex: 69 0 auto;
    width: 28.666667%;
    display: flex;
    contain: size;
}
.col-sm-10 {
    flex: 0 0 auto;
    width: 77.333333%;
    text-align: -webkit-right;
}
.form-control {
    display: block;
    
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
/* *, ::after, ::before {
    box-sizing: border-box;
    margin: 2px;
} */

  </style>



</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+91-9898989898</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="profile.php">Logo Here</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="profile.php">Profile</a></li>
          <li><a href="collection-center.php">Collection Center</a></li>
          <li><a href="view-production.php">Production</a></li>
          <li><a href="crop-calender.php">Crop Calender</a></li>
          <li><a href="view-revenue.php">Revenue </a></li>
          <li><a href="view-farmer.php">Farmers</a></li>
          <!-- <li><a href="view-fig.php">FIGs</a></li> -->
          <li><a href="buyer-search.php">Buyer Search</a></li>
          <li class="dropdown">
            <a href="#"><span>Useful links</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a href="buyer-interface.php" class="btn-get-started animate__animated animate__fadeInUp logout-btn">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->



  <main id="main">


    <div class="slider img">
      <img src="assets/img/slide/slider.jpg">
    </div>

    <div class="container mt-5 mb-5">

      

      <div class="section-title">
        <h2>What are you looking for</h2>
      </div>

    <div class="form-1">


      <form class="php-email-form"  style=" width: 100%;">
        
        <div class="row">
            <div class="form-group">
                <label class="form-group col-md-2 col-sm-2">Category <span style="color:red;">*</span></label>
                          
                  <div class="col-sm-10">
                      <table id="">
                      <tbody><tr>
                          <td><input id="" type="radio" name="" value="1" checked="checked"><label for="">
                            <label class="radio-inline radio-label"><img src="images/Fruits.png" class="cat" style="width:40px;border-radius: 50%;">&nbsp;Fruits</label>
                        </label></td><td><input id="" type="radio" name="" value="2" >
                            <label for=""><label class="radio-inline radio-label"><img src="images/Vegetables.png" class="cat" style="width:40px;border-radius: 50%;">&nbsp;Vegetables</label>
                        </label></td><td><input id="" type="radio" name="" value="3" >
                            <label for=""><label class="radio-inline radio-label"><img src="images/Cereal-Crop.png" class="cat" style="width:40px;border-radius: 50%;">&nbsp;Cereals &amp; Millets</label>
                        </label></td><td><input id="" type="radio" name="" value="4" >
                            <label for=""><label class="radio-inline radio-label"><img src="images/pluse.png" class="cat" style="width:40px;border-radius: 50%;">&nbsp;Pulses</label></label></td>
                      </tr><tr>
                          <td><input id="" type="radio" name="" value="5">
                            <label for="">
                            <label class="radio-inline radio-label"><img src="images/Oil-Seed.png" class="cat" style="width:40px;border-radius: 50%;">&nbsp;Oilseeds</label></label></td><td>
                                <input id="" type="radio" name="" value="6" ><label for=""><label class="radio-inline radio-label"><img src="images/spice.png" class="cat" style="width:40px;border-radius: 50%;">&nbsp;Spices</label>
                            </label></td><td><input id="" type="radio" name="" value="8" >
                                <label for="">
                                    <label class="radio-inline radio-label"><img src="images/nuts.png" class="cat" style="width:40px;border-radius: 50%;">&nbsp;Nuts &amp; Seeds</label></label></td><td><input id="" type="radio" name="" value="7" >
                                        <label for=""><label class="radio-inline radio-label"><img src="images/others.png" class="cat" style="width:40px;border-radius: 50%;">&nbsp;Others</label></label></td>
                      </tr>
                  </tbody>
                </table>
               
                </div> 
                                 
                          </div>
            
            
                                    <!-- end form group -->
                                    <div class="col-sm-3 form-group mt-3">
                                      <label class="">Crop <span style="color:red;">*</span></label>
                                    </div>
                                    <div class="col-sm-3 form-group mt-3">
                                            <select name="" id="" class="form-control">
                                              <option value="0">Select Crop</option>
                                              <option value="91">Apple</option>
                                              <option value="376">Apricot</option>
                                              <option value="5">Avocado</option>
                                              <option value="81">Banana</option>
                                              <option value="326">Blackberry</option>
                                              <option value="377">Blueberry</option>
                                              <option value="345">Chikku</option>
                                              <option value="331">Coconut</option>
                                              <option value="379">Custard Apple</option>
                                              <option value="380">Dates</option>
                                              <option value="381">Durian</option>
                                              <option value="320">Falsa</option>
                                              <option value="382">Fig</option>
                                              <option value="282">Gooseberry</option>
                                              <option value="335">Grapes</option>
                                              <option value="313">Guava</option>
                                              <option value="443">Kokum</option>
                                              <option value="383">Lychee</option>
                                              <option value="333">Mango</option>
                                              <option value="73">Melon</option>
                                              <option value="304">Mulbery</option>
                                              <option value="39">Musk Melon</option>
                                              <option value="384">Orange</option>
                                              <option value="66">Papaya</option>
                                              <option value="386">Peach</option>
                                              <option value="385">Pear</option>
                                              <option value="387">Pineapple</option>
                                              <option value="259">Pomegranate</option>
                                              <option value="350">Sandpaper</option>
                                              <option value="388">Starfruit</option>
                                              <option value="339">Strawberry</option>
                                              <option value="145">Watermelon</option>
                                              <option value="389">Wood Apple</option>
                                      
                                          </select>
                                          </div>
                                          <div class="col-sm-3 form-group mt-3">
                                             
                                        <input name="" type="text" maxlength="50" id="" class="form-control" placeholder="Enter Variety"> 
                                      </div>
                                      <div class="col-sm-3 form-group mt-3">
                                            <input name="" type="text" maxlength="50" id="" class="form-control" placeholder="Enter Quantity">    
     
                                    </div>
                                    <div class="col-sm-3 form-group mt-3">
                                      <!-- <label class="">Crop <span style="color:red;">*</span></label> -->
                                    </div>
                                    <div class="col-sm-3 form-group mt-3">
                                      <input name="" type="text" maxlength="50" id="" class="form-control" placeholder="Enter Grade">    
                                  
                                    </div>
                                    <div class="col-sm-3 form-group mt-3">                                       
                                  <input name="" type="text" maxlength="50" id="" class="form-control" placeholder="Enter Size"> 
                                </div>
                                <div class="col-sm-3 form-group mt-3">
                                      <input name="" type="text" maxlength="50" id="" class="form-control" placeholder="Enter Weight">    
                              </div>
                              <div class="col-sm-3 form-group mt-3">
                                <label class="">State <span style="color:red;">*</span></label>
                              </div>
                              <div class="col-md-9 form-group mt-3">
                              <select name=""  id="" class="form-control">
                                <option selected="selected" value="0">Select State</option>
                                <option value="27">Andhra Pradesh</option>
                                <option value="15">Arunachal Pradesh</option>
                                <option value="13">Assam</option>
                                <option value="10">Bihar</option>
                                <option value="21">Chhatisgarh</option>
                                <option value="6">Delhi</option>
                                <option value="25">Goa</option>
                                <option value="23">Gujarat</option>
                                <option value="5">Haryana</option>
                                <option value="3">Himachal Pradesh</option>
                                <option value="2">Jammu, J&amp;K</option>
                                <option value="11">Jharkhand</option>
                                <option value="26">Karnataka</option>
                                <option value="29">Kerala</option>
                                <option value="9">Madhya Pradesh</option>
                                <option value="24">Maharashtra</option>
                                <option value="19">Manipur</option>
                                <option value="14">Meghalaya</option>
                                <option value="16">Mizoram</option>
                                <option value="17">Nagaland</option>
                                <option value="22">Odisha</option>
                                <option value="4">Punjab</option>
                                <option value="7">Rajasthan</option>
                                <option value="20">Sikkim</option>
                                <option value="30">Srinagar, J&amp;K</option>
                                <option value="28">Tamil Nadu</option>
                                <option value="31">Telangana</option>
                                <option value="18">Tripura</option>
                                <option value="1">Uttar Pradesh</option>
                                <option value="8">Uttarakhand</option>
                                <option value="12">West Bengal</option>
                        
                            </select>
                            </div>
                            <div class="col-sm-3 form-group mt-3">
                              <label class="">District <span style="color:red;">*</span></label>
                            </div>
                            <div class="col-md-9 form-group mt-3">
                            <select name="" id="" class="form-control">
                              <option value="0">--Select District--</option>
                      
                          </select>
                          </div>
                          <div class="col-sm-3 form-group mt-3">
                            <label class="">Collect Center <span style="color:red;">*</span></label>
                          </div>
                          <div class="col-md-9 form-group mt-3">
                            <select name="" id="" class="form-control">
                              <option value="0">--Select Collection Centre--</option>
                      
                          </select>
                        </div>
                        <div class="col-sm-3 form-group mt-3">
                          <label class="">Product Inspaction Terms <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-9 form-group mt-3">
                          <input name="" type="text" maxlength="50" id="" class="form-control" placeholder="Product Inspaction Terms">    
                         
                      </div>
                      <div class="col-sm-3 form-group mt-3">
                        <label class="">Product Delivery  <span style="color:red;">*</span></label>
                      </div>
                      <div class="col-md-9 form-group mt-3">
                        <input name="" type="text" maxlength="50" id="" class="form-control" placeholder="Product Delivery">    
                       
                    </div>
                    <div class="col-sm-3 form-group mt-3">
                      <label class="">Food Safety Certificate  <span style="color:red;">*</span></label>
                    </div>
                    <div class="col-md-9 form-group mt-3">
                      <input name="" type="file"  id="" class="form-control" placeholder="Food Safety Certificate ">    
                     
                  </div>
                        <div class="form-group">  
                          <div class="col-md-12 text-center">
                           <p style=" margin-top: 3px; font-size: 12px; font-weight: 600;" class="pull-left">Asterisk <span class="redcolor">(*)</span> are Mandatory</p>
                      
                              <button type="submit" name="" value="Search" id="" class="btn btn-primary"> <a href="view-what-are-you-doing.php" class="text-white">Search</a> </button>
                         </div>
                     
                        </div> 
                                  
                                    
                                    

     </div>                       
      </form>


    </div>
    </div>



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
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
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
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
