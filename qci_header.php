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
            <li><a href="qci_profile.php">Home</a></li>
            <li><a href="assign.php">Assign</a></li>
            <li><a href="generated_code.php">Generate Code</a></li>
            <!-- <li><a href="#" class="btn-get-started animate__animated animate__fadeInUp logout-btn" data-bs-toggle="modal" data-bs-target="#myModal">Generate Code</a></li> -->
            <!-- <li><a href="#">Profile Summary</a></li>
            <li><a href="#">Food Safety Standard</a></li> -->
            <li><a href="qci_logout.php" class="btn-get-started animate__animated animate__fadeInUp logout-btn">Logout</a></li>
         </ul>
         <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
   </div>
</header>

