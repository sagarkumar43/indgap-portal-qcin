<?php
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   session_start();
   error_reporting(0);
   $fpo_registration_id = $_SESSION['FPO_Registration_ID'];
   if ($fpo_registration_id == '') {
       header("Location: fpo-login.php");
   }
   include "connection.php";
   if (isset($_POST['Import'])) {
       $document_standard = $_POST['document_standard'];
       $doc_name = $_POST['doc_name'];
       $doc_desc = $_POST['doc_desc'];
       $doc_file = $_FILES['documents']['name'];
       $doc_file_temp = $_FILES['documents']['tmp_name'];
       if (strtolower(end(explode(".", $doc_file))) == "pdf") {
           move_uploaded_file($doc_file_temp, "assets/profile_documents/" . $doc_file);
           $query = mysqli_query($db, "INSERT INTO `fpo_food_safety_standard_docs` (`Id`, `FPO_Registration_ID`, `document_standard`, `document_name`, `document_desc`, `Profile_document`, `CreatedDate`) VALUES (NULL, '$fpo_registration_id', '$document_standard', '$doc_name', '$doc_desc', '$doc_file', CURRENT_TIMESTAMP);");
           if ($query) {
               echo "<script>alert('Document Upload Successfully')</script>";
               echo "<script>window.location.href = 'profile_document.php';</script>";
           } else {
               echo "<script>alert('Opps! Something Wrong , Try Again')</script>";
           }
       } else {
           echo "<script>alert('Document should be in PDF format')</script>";
       }
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>FPO Document Upload</title>
      <meta content="" name="description">
      <meta content="" name="keywords">
      <link href="assets/img/favicon.png" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
         rel="stylesheet">
      <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
      <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
      <link href="assets/css/style.css" rel="stylesheet">
   </head>
   <body style="background-image: url('images/fpo-bg2.jpg');background-repeat: repeat-y;background-position: center;">
      <?php include "fpo_header.php"; ?>
      <main id="main">
         <section id="hero">
            <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
               <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
               <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active" style="background: url(assets/img/slide/slider5.jpg)">
                     <div class="carousel-container">
                        <div class="carousel-content">
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item" style="background:url(assets/img/slide/slider2.jpg)">
                     <div class="carousel-container">
                        <div class="carousel-content">
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item" style="background:url(assets/img/slide/slide-1.jpg)">
                     <div class="carousel-container">
                        <div class="carousel-content">
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item" style="background:url(assets/img/slide/slide4.jpg)">
                     <div class="carousel-container">
                        <div class="carousel-content">
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
         <div class="container mt-5 mb-5">
            <div class="section-title">
               <h2>Food Safety Standards</h2>
            </div>
            <div class="form-1" id="UploadDocuments">
               <form action="" method="POST" enctype="multipart/form-data">
                  <div class="row" id="row1">
                     <div class="row justify-content-center">
                        <div class="col-md-3 form-group mt-3">
                           <label class="mb-2">Standard</label>
                           <select name="document_standard" class="form-control" required="">
                              <option value="00">Select Standard</option>
                              <option value="IndGAP">IndGAP</option>
                              <option value="GloabalGAP">GloabalGAP</option>
                              <option value="Organic NPOP">Organic NPOP</option>
                              <option value="Organic NOP">Organic NOP</option>
                              <option value="ISO22000">ISO22000</option>
                              <option value="BRC">BRC</option>
                              <option value="Others">Others</option>
                           </select>
                        </div>
                        <div class="col-md-3 form-group mt-3">
                           <label class="mb-2">Document Name</label>
                           <input type="text" class="form-control" name="doc_name" placeholder="Document Name"
                              required="">
                        </div>
                        <div class="col-md-3 form-group mt-3">
                           <label class="mb-2">Subject</label>
                           <input type="text" class="form-control" name="doc_desc" placeholder="Subject" required="">
                        </div>
                        <div class="col-md-3 form-group mt-3">
                           <label class="mb-2">Upload Document</label>
                           <input type="file" name="documents" id="file" class="border border-dark" required="" accept=".pdf,.doc,.csv,.xlsv">
                        </div>
                     </div>
                  </div>
                  <div class="text-center pt-4">
                     <button type="submit" id="submit" name="Import" class="btn btn-success mt-3"
                        data-loading-text="Loading...">Submit</button>
                  </div>
               </form>
            </div>
            <div class="container mt-5 mb-5">
               <div class="table-1">
                  <table class="table table-bordered">
                     <tr style="background-color: darkgreen;color: white;">
                        <th>S.No.</th>
                        <th>Document Standard</th>
                        <th>Document Name</th>
                        <th>Subject</th>
                        <th>View Document</th>
                        <th>Document Upload Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                     </tr>
                     <?php
                        $query = mysqli_query($db, "SELECT * FROM fpo_food_safety_standard_docs WHERE FPO_Registration_ID = '$_SESSION[FPO_Registration_ID]'");
                        if ($query) {
                            $count = 1;
                            while ($row = mysqli_fetch_array($query)) {
                                $StartDate = date_create($row['CreatedDate']);
                                $Date = date_format($StartDate, "d M Y");
                        ?>
                     <tr>
                        <td>
                           <?php echo $count; ?>
                        </td>
                        <td> <?php echo $row['document_standard']; ?> </td>
                        <td> <?php echo $row['document_name']; ?> </td>
                        <td> <?php echo $row['document_desc']; ?> </td>
                        <td class="img"> 
                           <a href="assets/profile_documents/<?php echo $row['Profile_document']; ?>"
                              target="_blank"><img src="images/download.png" style="width:40px; text-align: center;"></a>
                        </td>
                        <td>
                           <?php echo $Date; ?>
                        </td>
                        <td align="center"><a onclick="return confirm('Are you sure want to edit?')"
                           href="edit_profile_document.php?id=<?php echo $row['Id']; ?>"><i class="bi-pencil"></i></a></td>
                        <td align="center"><a onclick="return confirm('Are you sure want to delete?')"
                           href="delete_profile_document.php?deleteid=<?php echo $row['Id']; ?>"><i class="bi-trash"></i></a></td>
                     </tr>
                     <?php $count++;
                        }
                        } ?>
                  </table>
               </div>
            </div>
         </div>
      </main>
      <?php include "footer.php"; ?>
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
      <script src="assets/js/fpo.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
         integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
         crossorigin="anonymous"></script>
      <script>
         function add_document() {
            var count = 1;
            count = count + $('#UploadDocuments').length;
            document.querySelector('.row').insertAdjacentHTML(
               `afterend`, `<div class="row" id="row` + count + `"><div class="row justify-content-center"><div class="col-md-3 form-group mt-3">
                           <label class="mb-2">Document Standard</label>
                           <select name="document_standard[]" class="form-control">
                              <option value="00">Select Document Standard</option>
                              <option value="IndGAP">IndGAP</option>
                              <option value="GloabalGAP">GloabalGAP</option>
                              <option value="Organic NPOP">Organic NPOP</option>
                              <option value="Organic NOP">Organic NOP</option>
                              <option value="ISO22000">ISO22000</option>
                              <option value="BRC">BRC</option>
                              <option value="Others">Others</option>
                           </select>
                        </div><div class="col-md-3 form-group mt-3"><label class="mb-2">Document Name</label><input type="text" class="form-control" name="doc_name[]" placeholder="Document Name" required=""></div><div class="col-md-3 form-group mt-3"><label class="mb-2">Subject</label><input type="text" class="form-control" name="doc_desc[]" placeholder="Subject" required=""></div><div class="col-md-3 form-group mt-3"><label class="mb-2">Upload Document</label><input type="file" name="documents[]" id="file" class="border border-dark" required=""></div></div><div class="form-group mt-5 text-right"><abbr title="Delete"><button type="button" class="btn btn-danger" onclick="delete_document('row` + count + `');">Delete</button></abbr></div></div>`
            )
         }
         function delete_document(count) {
            $('#' + count).remove();
         }
      </script>
   </body>
</html>