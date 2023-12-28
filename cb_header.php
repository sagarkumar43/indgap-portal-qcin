<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
?>
<!--<section id="topbar" class="d-flex align-items-center" style="max-width: none;margin: 0px auto;border-radius: 0px;">-->
<!--   <div class="container d-flex justify-content-center justify-content-md-between">-->
<!--      <div class="contact-info d-flex align-items-center">-->
<!--         <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>-->
<!--         <i class="bi bi-phone d-flex align-items-center ms-4"><span>+91-9898989898</span></i>-->
<!--      </div>-->
<!--      <div class="social-links d-none d-md-flex align-items-center">-->
<!--         <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>-->
<!--         <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>-->
<!--         <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>-->
<!--         <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>-->
<!--      </div>-->
<!--   </div>-->
<!--</section>-->
<header id="header" class="d-flex align-items-center">
   <div class="container d-flex justify-content-between align-items-center">
      <div class="logo">
          <a href="index.php"><img src="assets/img/All_LOGO_WITH_R-01-removebg-preview.png"></a>
      <a href="index.php"><img src="assets/img/padd logoo.png" style="width:25%"></a>
      <a href="index.php"><img src="assets/img/IndGAP Logo-03.png"></a>
      </div>
      <nav id="navbar" class="navbar">
         <ul>
            <!-- <li><a href="cbprofile.php">Home</a></li> -->
            <li><a href="cb_boxstatus.php">Home</a></li>
            <?php if($_SESSION["cb_Name"] =='Reviewer' || $_SESSION["cb_Name"] =='Quality Manager' || $_SESSION["cb_Name"] =='Director' || $_SESSION["cb_Name"] =='Inspector')  {} else {?>
            <li><a href="cb_profile_summary.php">Submit Details</a></li>
            <?php } ?>
            
            <!-- <li><a href="#">Food Safety Standard</a></li> -->
            <li><a href="cblogout.php" class="btn-get-started animate__animated animate__fadeInUp logout-btn">Logout</a></li>
         </ul>
         <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
   </div>
</header>