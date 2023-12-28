<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
?>
<section id="topbar" class="d-flex align-items-center" style="max-width: none;margin: 0px auto;border-radius: 0px;">
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
<header id="header" class="d-flex align-items-center">
   <div class="container d-flex justify-content-between align-items-center">
      <div class="logo">
      <a href="index.php"><img src="https://www.krishigap.com/img/krishi-gap-logo.png"></a>
      </div>
      <nav id="navbar" class="navbar">
         <ul>
            <li><a href="profile2.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="collection-center.php">Collection Center</a></li>
            <li class="dropdown">
               <a href="#"><span>Production</span></a>
               <ul>
               <li><a href="view-production.php">Own Production</a></li>
               <li><a href="own-production.php">Consolidated Figure</a></li>
               </ul>
            </li>
            <li><a href="crop-calender.php">Commodity Calender</a></li>
            <li><a href="profile_document.php">Food Safety Standards</a></li>
            <li><a href="buyer-search.php">Buyer Search</a></li>
            <li class="dropdown">
               <a href="#"><span>Useful links</span> <i class="bi bi-chevron-down"></i></a>
               <ul>
                  <li><a href="view_registration_details.php">FPO Registration Details</a></li>
                  <li><a href="view-farmer.php">Farmers</a></li>
                  <!-- <li><a href="own-production.php">Own Production</a></li> -->
                  <li><a href="fpo_profile_edit.php">My Profile</a></li>
                  <li><a href="csv-files.php">CSV Files</a></li>
                  <li><a href="extra_details.php">Extra Details</a></li>
                  <li><a href="#">Drop Down 3</a></li>
                  <li><a href="#">Drop Down 4</a></li>
               </ul>
            </li>
            <li><a href="logout.php" class="btn-get-started animate__animated animate__fadeInUp logout-btn">Logout</a></li>
         </ul>
         <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
   </div>
</header>