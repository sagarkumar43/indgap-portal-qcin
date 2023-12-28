<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
?>
<footer id="footer">
   <div class="footer-top">
      <div class="container">
         <div class="row">
            <!-- <div class="col-lg-3 col-md-6 footer-links">
               <h4>Useful Links</h4>
               <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Link-1</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Link-2</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Link-3</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Link-4</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Link-5</a></li>
               </ul>
            </div> -->
            <!--<div class="col-lg-3 col-md-6 footer-contact">-->
            <!--   <h4>Contact Us</h4>-->
            <!--   <p>House No 5-106/281B, Narsing Municipality Manchirevula K.V Ranga Reddy Hyderabad 500075 Telangana , India <br><br><strong>Phone:</strong> +91-9848034740<br><strong>Email:</strong> Kotela.nath@gmail.com<br></p>-->
            <!--</div>-->
            <!--<div class="col-lg-6 col-md-6 footer-info">-->
            <!--   <h3>About</h3>-->
            <!--   <p>-->
            <!--   </p>-->
            <!--   <div class="social-links mt-3">-->
            <!--      <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>-->
            <!--      <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>-->
            <!--      <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>-->
            <!--      <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>-->
            <!--      <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>-->
            <!--   </div>-->
            <!--</div>-->
         </div>
      </div>
   </div>
   <div class="container">
      <div class="copyright">
         Copyright 2022. All rights reserved.
      </div>
       <div class="credits">
         <!--Design & Developed by <a href="https://aretesoftwares.com/">Aretesoftwares.com</a>-->
         With design inputs by Krishigap Digital Solutions Pvt Ltd
      </div> 
   </div>
</footer>