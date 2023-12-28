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
      <title>FPO Registration Details</title>
      <meta content="" name="description">
      <meta content="" name="keywords">
      <link href="assets/img/favicon.png" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
      <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
      <link href="assets/css/style.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
   </head>
   <body>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <style>
         @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Roboto+Slab:wght@400;700&display=swap');
         html {
         height: 100%;
         min-height:800px;
         }
         body {
         background: url('https://acpldemo.co.in/fpo/assets/img/login-bg_1.jpg1');
         background-size:cover;
         background-repeat:no-repeat;
         text-align: center;
         font-family: 'Noto Sans', sans-serif;
         -webkit-touch-callout: none;
         -webkit-user-select: none;
         -khtml-user-select: none;
         -moz-user-select: none;
         -ms-user-select: none;
         user-select: none;
         }
         h1{
         font-weight:400;
         padding-top:0;
         margin-top:0;
         font-family: 'Roboto Slab', serif;
         }
         #svg_form_time {
         height: 15px;
         max-width: 80%;
         margin: 40px auto 20px;
         display: block;
         }
         #svg_form_time circle,
         #svg_form_time rect {
         fill: white;
         }
         .button {
         background: rgb(237, 40, 70);
         border-radius: 5px;
         padding: 15px 25px;
         display: inline-block;
         margin: 10px;
         font-weight: bold;
         color: white;
         cursor: pointer;
         box-shadow:0px 2px 5px rgb(0,0,0,0.5);
         }
         .disabled {
         display:none;
         }
         section {
         padding: 50px ;
         max-width: 900px;
         margin: 30px auto;
         background:white;
         background:rgba(255,255,255,0.9);
         backdrop-filter:blur(10px);
         box-shadow:0px 2px 10px rgba(0,0,0,0.3);
         border-radius:5px;
         transition:transform 0.2s ease-in-out;
         }
         input {
         width: 100%;
         margin: 7px 0px;
         display: inline-block;
         padding: 12px 25px;
         box-sizing: border-box;
         border-radius: 5px;
         border: 1px solid lightgrey;
         font-size: 1em;
         font-family:inherit;
         background:white;
         }
         p{
         text-align:justify;
         margin-top:0;
         }
      </style>
      <script>
         $( document ).ready(function() {
         var base_color = "rgb(230,230,230)";
         var active_color = "rgb(237, 40, 70)";
         var child = 1;
         var length = $("section").length - 1;
         $("#prev").addClass("disabled");
         $("#submit").addClass("disabled");
         $("section").not("section:nth-of-type(1)").hide();
         $("section").not("section:nth-of-type(1)").css('transform','translateX(100px)');
         var svgWidth = length * 200 + 24;
         $("#svg_wrap").html(
           '<svg version="1.1" id="svg_form_time" xmlns="" xmlns:xlink="" x="0px" y="0px" viewBox="0 0 ' +
             svgWidth +
             ' 24" xml:space="preserve"></svg>'
         );
         function makeSVG(tag, attrs) {
           var el = document.createElementNS("", tag);
           for (var k in attrs) el.setAttribute(k, attrs[k]);
           return el;
         }
         for (i = 0; i < length; i++) {
           var positionX = 12 + i * 200;
           var rect = makeSVG("rect", { x: positionX, y: 9, width: 200, height: 6 });
           document.getElementById("svg_form_time").appendChild(rect);
           var circle = makeSVG("circle", {
             cx: positionX,
             cy: 12,
             r: 12,
             width: positionX,
             height: 6
           });
           document.getElementById("svg_form_time").appendChild(circle);
         }
         var circle = makeSVG("circle", {
           cx: positionX + 200,
           cy: 12,
           r: 12,
           width: positionX,
           height: 6
         });
         document.getElementById("svg_form_time").appendChild(circle);
         $('#svg_form_time rect').css('fill',base_color);
         $('#svg_form_time circle').css('fill',base_color);
         $("circle:nth-of-type(1)").css("fill", active_color);
         $(".button").click(function () {
           $("#svg_form_time rect").css("fill", active_color);
           $("#svg_form_time circle").css("fill", active_color);
           var id = $(this).attr("id");
           if (id == "next") {
             $("#prev").removeClass("disabled");
             if (child >= length) {
               $(this).addClass("disabled");
               $('#submit').removeClass("disabled");
             }
             if (child <= length) {
               child++;
             }
           } else if (id == "prev") {
             $("#next").removeClass("disabled");
             $('#submit').addClass("disabled");
             if (child <= 2) {
               $(this).addClass("disabled");
             }
             if (child > 1) {
               child--;
             }
           }
           var circle_child = child + 1;
           $("#svg_form_time rect:nth-of-type(n + " + child + ")").css(
             "fill",
             base_color
           );
           $("#svg_form_time circle:nth-of-type(n + " + circle_child + ")").css(
             "fill",
             base_color
           );
           var currentSection = $("section:nth-of-type(" + child + ")");
           currentSection.fadeIn();
           currentSection.css('transform','translateX(0)');
          currentSection.prevAll('section').css('transform','translateX(-100px)');
           currentSection.nextAll('section').css('transform','translateX(100px)');
           $('section').not(currentSection).hide();
         });
         
         });
      </script>
      <main id="main">
         <div class="slider img">
            <img src="assets/img/slide/slider.jpg">
         </div>
      <div id="svg_wrap"></div>
       <h1 style="margin-top: -30px;">FPO Registration Details</h1>
      <section>
         <h3>FPO-Exporter</h3>
         <div class="row">
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Name</label>
               <input type="text" placeholder="Name" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Address</label>
               <input type="text" placeholder="Address" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">State</label>
               <input type="text" placeholder="State" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">District</label>
               <input type="text" placeholder="District" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Contact Person</label>
               <input type="text" placeholder="Contact Person" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Mobile Number</label>
               <input type="text" placeholder="Mobile Number" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Landline Number</label>
               <input type="text" placeholder="Landline Number" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Email ID</label>
               <input type="text" placeholder="Email ID" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Password</label>
               <input type="text" placeholder="Password" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Number of famers registered</label>
               <input type="text" placeholder="Number of famers registered" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Number of active farmers</label>
               <input type="text" placeholder="Number of active farmers" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Bussiness activity Promotion</label>
               <input type="text" placeholder="Bussiness activity Promotion" />
            </div>
            <div class="col-md-6 form-group mt-3">
               <label class="mb-2" style="float: left;">Crops Cultivated (Season - Rabi / Karif )</label>
               <input type="text" placeholder="Crops Cultivated (Season - Rabi / Karif )" />
            </div>
            <div class="col-md-6 form-group mt-3">
               <label class="mb-2" style="float: left;">Area Extent (Ha)</label>
               <input type="text" placeholder="Area Extent (Ha)" />
            </div>
         </div>
      </section>
      <section>
         <h3>Gross Revenue</h3>
         <div class="row">
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Crop Name</label>
               <input type="text" placeholder="Crop Name" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Varity</label>
               <input type="text" placeholder="Varity" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Quantity (MT)</label>
               <input type="text" placeholder="Quantity (MT)" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Revenue (in Lakhs)</label>
               <input type="text" placeholder="Revenue (in Lakhs)" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Market Place</label>
               <input type="text" placeholder="Market Place" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Average Price</label>
               <input type="text" placeholder="Average Price" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Customer</label>
               <input type="text" placeholder="Customer" />
            </div>
         </div>
      </section>
      <section>
         <h3>Warehouse</h3>
         <div class="row">
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Year of Establishment</label>
               <input type="text" placeholder="Year of Establishment" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Area(in Sqft)</label>
               <input type="text" placeholder="Area(in Sqft)" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Capacity(in mt)</label>
               <input type="text" placeholder="Capacity(in mt)" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Owned or Leased </label>
               <input type="text" placeholder="Owned or Leased " />
            </div>
            <div class="col-md-8 form-group mt-3">
               <label class="mb-2" style="float: left;">AccredationStatus (yes/no)- is yes then upload </label>
               <input type="text" placeholder="AccredationStatus (yes/no)- is yes then upload " />
            </div>
            <div class="col-md-6 form-group mt-3">
               <label class="mb-2" style="float: left;">Average Price</label>
               <input type="text" placeholder="Average Price" />
            </div>
            <div class="col-md-6 form-group mt-3">
               <label class="mb-2" style="float: left;">Customer</label>
               <input type="text" placeholder="Customer" />
            </div>
         </div>
      </section>
      <section>
         <h3>Credit Facility</h3>
         <div class="row">
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Bank</label>
               <input type="text" placeholder="Bank" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Facility Type </label>
               <input type="text" placeholder="Facility Type" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Amount Released</label>
               <input type="text" placeholder="Amount Released" />
            </div>
            <div class="col-md-6 form-group mt-3">
               <label class="mb-2" style="float: left;">Amount outstanding(in lakhs) </label>
               <input type="text" placeholder="Amount outstanding(in lakhs) " />
            </div>
            <div class="col-md-6 form-group mt-3">
               <label class="mb-2" style="float: left;">Operation Status (Regular/Irregular )</label>
               <input type="text" placeholder="Operation Status (Regular/Irregular )" />
            </div>
         </div>
      </section>
      <section>
         <h3>Market Linkage</h3>
         <div class="row">
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Harvest Month </label>
               <input type="text" placeholder="Harvest Month " />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Quntaty Expected(in mt) </label>
               <input type="text" placeholder="Quntaty Expected(in mt)" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Product Image </label>
               <input type="text" placeholder="Product Image " />
            </div>
            <div class="col-md-6 form-group mt-3">
               <label class="mb-2" style="float: left;">Price Expected Per mt</label>
               <input type="text" placeholder="Price Expected Per mt" />
            </div>
            <div class="col-md-6 form-group mt-3">
               <label class="mb-2" style="float: left;">Product Dilivery Location</label>
               <input type="text" placeholder="Product Dilivery Location" />
            </div>
            <div class="col-md-12 form-group mt-3">
               <label class="mb-2" style="float: left;">Food Saftey Certificate(yes/no) - is yes then name of certificate and upload</label>
               <input type="text" placeholder="Food Saftey Certificate(yes/no) - is yes then name of certificate and upload" />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Term and Conditions </label>
               <input type="text" placeholder="Term and Conditions " />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Other Documents Upload </label>
               <input type="file" placeholder="Other Documents Upload " />
            </div>
            <div class="col-md-4 form-group mt-3">
               <label class="mb-2" style="float: left;">Video</label>
               <input type="text" placeholder="Video" />
            </div>
         </div>
      </section>
      <div class="button" id="prev">&larr; Previous</div>
      <div class="button" id="next">Next &rarr;</div>
      <div class="button" id="submit">Submit</div><br><br>
    </main>
      <footer id="footer">
         <div class="footer-top">
            <div class="container">
               <div class="row">
                  <div class="col-lg-3 col-md-6 footer-links">
                     <h4 style="text-align: left;">Useful Links</h4>
                     <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Link-1</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Link-2</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Link-3</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Link-4</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Link-5</a></li>
                     </ul>
                  </div>
                  <div class="col-lg-3 col-md-6 footer-contact">
                     <h4 style="text-align: left;">Contact Us</h4>
                     <p>
                        XYZ <br>
                        New Delhi, 110055<br>
                        India <br><br>
                        <strong>Phone:</strong> +91-9898989898<br>
                        <strong>Email:</strong> info@example.com<br>
                     </p>
                  </div>
                  <div class="col-lg-6 col-md-6 footer-info">
                     <h3 style="text-align: left;">About</h3>
                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                     <div class="social-links mt-3" style="float: left;">
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
   </body>
</html>