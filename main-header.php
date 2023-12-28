<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
?>
<section id="topbar" class="d-flex align-items-center">

   <div class="container d-flex justify-content-center justify-content-md-between" style="max-width: 1320px;">

      <div class="contact-info d-flex align-items-center">

         <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>

         <i style="margin-left: 1.5rem!important;" class="bi bi-phone d-flex align-items-center ms-4"><span>+91-9898989898</span></i>

      </div>

      <div class="social-links d-none d-md-flex align-items-center">

         <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>

         <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>

         <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>

         <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>

      </div>

   </div>

</section>

<header id="header" class="d-flex align-items-center">

   <div class="container d-flex justify-content-between align-items-center" style="max-width: 1320px;">

      <div class="logo">

         <h1><a href="index.php"><img src="https://www.krishigap.com/img/krishi-gap-logo.png"></a></h1>

      </div>
      <?php 
         $fpo = "SELECT * FROM `about_website`";
         $exe = mysqli_query($db,$fpo);
         $read = mysqli_fetch_assoc($exe);
      ?>
          <div class="title-name" style="background-color: #fff;color: white;width: 300px;height: 70px;">
           
           </div>
      <div class="title-name" style="background-color: #318b01;color: white;width: 325px;height: 70px;">
            <h3 style="text-align: center;padding-top: 15px;"><?php echo $read['Heading']; ?></h3>
      </div>

   
      <div  style="border-radius: 20px;margin-right: 10px;background-color: #00a039;text-align:right;"><a href="https://www.krishigap.com/index.php"><button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation" style="color:#fff;">Krishi Gap</button></a></div>
      <nav id="navbar" class="navbar">
         <ul>
            
            <li><a href="index.php">Home</a></li>
            <!--<li><a href="#">About Us</a></li>-->
            <li><a href="what_we_do.php">What We Do</a></li>
            <!-- <li><a href="compliances.php">Export Documentation</a></li> -->
            <li class="dropdown">
               <a href="#"><span>Export Documentation</span> <i class="bi bi-chevron-down"></i></a>
               <ul>
                  <li><a href="export.php">Export</a></li>
                  <!-- <li><a href="import.php">Import</a></li> -->
                  <!-- <li><a href="export_zone.php">Agri Export Zones</a></li> -->
                  <li><a href="https://www.krishigap.com/other-option.php?nm=APEDA%20Export%20Zones&type=search" target="_blank" rel="noopener noreferrer">Agri Export Zones</a></li>
                  <li><a href="ExportDocuments/Export-Promotion-Scheme-APEDA.pdf" target="_blank">Export Promotion Scheme</a></li>
               </ul>
            </li>
            <!-- <li class="dropdown">
               <a href="#"><span>Useful links</span> <i class="bi bi-chevron-down"></i></a>
               <ul>
                  <li><a href="#">Drop Down 1</a></li>
                  <li><a href="#">Drop Down 2</a></li>
                  <li><a href="#">Drop Down 3</a></li>
                  <li><a href="#">Drop Down 4</a></li>
               </ul>
            </li> -->
            <li><a href="home.php" class="btn-get-started animate__animated animate__fadeInUp logout-btn">Login</a></li>
         </ul>
         <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
   </div>
</header>