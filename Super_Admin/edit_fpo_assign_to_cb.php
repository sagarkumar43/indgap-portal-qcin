<?php
   session_start();
   error_reporting(0);
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   include ("include/connection.php");
   if ($_SESSION['super_email'] == '' || $_SESSION['super_email'] == NULL) header('location:index.php');
   $User_Assing_ID = $_GET['id'];
   $query_edit = mysqli_query($db, "SELECT * FROM `fpo_user_to_assign_cb` where `DeletedStatus` ='0' AND User_Assing_ID ='$User_Assing_ID'");
   $row_edit = mysqli_fetch_array($query_edit);
   ?>
<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-sidenav-color="light"
   data-sidenav-user="true">
   <head>
      <meta charset="utf-8" />
      <title>FPO Registered Users</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
      <meta content="Coderthemes" name="author" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="assets/images/favicon.ico">
      <!-- Datatables css -->
      <link href="assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
      <link href="assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
         type="text/css" />
      <link href="assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet"
         type="text/css" />
      <link href="assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet"
         type="text/css" />
      <link href="assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet"
         type="text/css" />
      <link href="assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet"
         type="text/css" />
      <!-- Theme Config Js -->
      <script src="assets/js/hyper-config.js"></script>
      <!-- Icons css -->
      <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
      <!-- App css -->
      <link href="assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="app-style" />
      <!-- Multiple Select Options CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/bootstrap-select.css">
   </head>
   <style>
      .arrow-none:after {
      display: none;
      }
   </style>
   <body>
      <!-- Begin page -->
      <div class="wrapper">
         <!-- ========== Topbar Start ========== -->
         <?php include ("include/header.php"); ?>
         <!-- ========== Topbar End ========== -->
         <!-- ========== Left Sidebar Start ========== -->
         <?php include ("include/navbar.php"); ?>
         <!-- ========== Left Sidebar End ========== -->
         <!-- ============================================================== -->
         <!-- Start Page Content here -->
         <!-- ============================================================== -->
         <div class="content-page">
            <div class="content">
               <!-- Start Content-->
               <div class="container-fluid">
                  <!-- start page title -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
                           <h4 class="mb-0 text-gray -800">Edit Assign</h4>
                           <a href="fpo_assign_to_cb.php"
                              class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Back</a>
                        </div>
                     </div>
                  </div>
                  <!-- end page title -->
                  <div class="row">
                     <div class="col-12">
                        <div class="card">
                           <div class="card-body">
                              <div class="tab-content">
                                 <div class="tab-pane show active" id="scroll-horizontal-preview">
                                    <form method="POST" autocomplete="off">
                                       <div class="row">
                                          <div class="col-md-6 mt-2">
                                             <label class="form-label">FPO User List</label>
                                             <?php
                                                        $FPO_exe1 = mysqli_query($db,"SELECT * from `fpo_user_to_assign_cb` where `DeletedStatus` ='0' AND `User_Assing_ID` !='$User_Assing_ID'");
                                                        while($FpoUser1 = mysqli_fetch_array($FPO_exe1))
                                                                {
                                                                    $FpoUser2 .= $FpoUser1['FPO_User_ID'].',';
                                                                }
                                                                $FpoUser2 = rtrim($FpoUser2, ',');
                                                        ?>
                                             <select class="form-control selectpicker" name="FPO_User[]" multiple
                                                data-live-search="true"
                                                data-live-search-placeholder="Search"
                                                data-actions-box="true">
                                                <?php
                                                if($FpoUser2 !=''){
                                                               $fpo_user = "SELECT * FROM `fpo_registration` WHERE DeletedStatus='0' AND FPO_Registration_ID NOT IN($FpoUser2)";
                                                            }else{
                                                                $fpo_user = "SELECT * FROM `fpo_registration` WHERE DeletedStatus='0'";
                                                            }
                                                   
                                                   $FPO_exe = mysqli_query($db, $fpo_user);
                                                   while ($FpoUser = mysqli_fetch_assoc($FPO_exe)) {
                                                   ?>
                                                <option <?php if (in_array($FpoUser['FPO_Registration_ID'], explode(',', $row_edit['FPO_User_ID']))) {
                                                   echo 'selected';
                                                   } ?> value="<?php echo $FpoUser['FPO_Registration_ID'] ?>">
                                                   <?php echo $FpoUser['FPOExporterName'] ?>
                                                </option>
                                                <?php
                                                   } ?>
                                             </select>
                                          </div>
                                          <div class="col-md-6 mt-2">
                                             <label class="form-label">CB User List</label>
                                             <select class="form-control selectpicker" name="CB_User[]" multiple
                                                data-live-search="true"
                                                data-live-search-placeholder="Search"
                                                data-actions-box="true">
                                                <?php
                                                   $cb_users = "SELECT * FROM `cb_users` WHERE DeletedStatus='0'";
                                                   $CB_exe = mysqli_query($db, $cb_users);
                                                   while ($CBUser = mysqli_fetch_assoc($CB_exe)) {
                                                   ?>
                                                <option <?php if (in_array($CBUser['cb_user_id'], explode(',', $row_edit['CB_User']))) {
                                                   echo 'selected';
                                                   } ?>
                                                   value="<?php echo $CBUser['cb_user_id'] ?>">
                                                   <?php echo $CBUser['Name'] ?>
                                                </option>
                                                <?php
                                                   } ?>
                                             </select>
                                          </div>
                                          <div class="col-md-6"></div>
                                          <div class="col-md-12 mt-3 text-start">
                                             <input type="submit" name="save"
                                                class="btn btn-primary fs-5 rounded-pill" value="Update">
                                          </div>
                                       </div>
                                    </form>
                                    <?php
                                       if ($_POST['FPO_User'] != '' AND $_POST['CB_User'] != '') {
                                           $fpo = implode(',', $_POST['FPO_User']);
                                           $cb = implode(',', $_POST['CB_User']);
                                           $assign_user = "UPDATE `fpo_user_to_assign_cb` SET `FPO_User_ID`='$fpo', `CB_User`='$cb' WHERE `DeletedStatus` ='0' AND `User_Assing_ID` ='$User_Assing_ID'";
                                           $execute = mysqli_query($db, $assign_user);
                                           if ($execute == TRUE) {
                                               echo "<script>alert('User Assign Successfully Updated')</script>";
                                               echo "<script>window.location.href = 'fpo_assign_to_cb.php'</script>";
                                           } else {
                                               echo "<script>alert('User not added please try after some time')</script>";
                                           }
                                       }
                                       ?>
                                 </div>
                                 <!-- end preview-->
                              </div>
                              <!-- end tab-content-->
                           </div>
                           <!-- end card body-->
                        </div>
                        <!-- end card -->
                     </div>
                     <!-- end col-->
                  </div>
                  <!-- end row-->
               </div>
               <!-- container -->
            </div>
            <!-- content -->
            <!-- Footer Start -->
            <?php include ("include/footer.php"); ?>
            <!-- end Footer -->
         </div>
         <!-- ============================================================== -->
         <!-- End Page content -->
         <!-- ============================================================== -->
      </div>
      <!-- END wrapper -->
      <!-- Theme Settings -->
      <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
         <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
            <h5 class="text-white m-0">Theme Settings</h5>
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
               aria-label="Close"></button>
         </div>
         <div class="offcanvas-body p-0">
            <div data-simplebar class="h-100">
               <div class="card mb-0 p-3">
                  <h5 class="mt-0 font-16 fw-bold mb-3">Choose Layout</h5>
                  <div class="row">
                     <div class="col-4">
                        <div class="form-check card-radio">
                           <input id="customizer-layout01" name="data-layout" type="radio" value="vertical"
                              class="form-check-input">
                           <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout01">
                           <span class="d-flex h-100">
                           <span class="flex-shrink-0">
                           <span class="bg-light d-flex h-100 border-end flex-column p-1 px-2">
                           <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                           <span class="d-block border border-3 w-100 mb-1"></span>
                           <span class="d-block border border-3 w-100 mb-1"></span>
                           <span class="d-block border border-3 w-100 mb-1"></span>
                           <span class="d-block border border-3 w-100 mb-1"></span>
                           </span>
                           </span>
                           <span class="flex-grow-1">
                           <span class="d-flex h-100 flex-column">
                           <span class="bg-light d-block p-1"></span>
                           </span>
                           </span>
                           </span>
                           </label>
                        </div>
                        <h5 class="font-14 text-center text-muted mt-2">Vertical</h5>
                     </div>
                     <div class="col-4">
                        <div class="form-check card-radio">
                           <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal"
                              class="form-check-input">
                           <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout02">
                           <span class="d-flex h-100 flex-column">
                           <span class="bg-light d-flex p-1 align-items-center border-bottom">
                           <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                           <span class="d-block border border-3 ms-auto"></span>
                           <span class="d-block border border-3 ms-1"></span>
                           <span class="d-block border border-3 ms-1"></span>
                           <span class="d-block border border-3 ms-1"></span>
                           </span>
                           <span class="bg-light d-block p-1"></span>
                           </span>
                           </label>
                        </div>
                        <h5 class="font-14 text-center text-muted mt-2">Horizontal</h5>
                     </div>
                  </div>
                  <h5 class="my-3 font-16 fw-bold">Color Scheme</h5>
                  <div class="colorscheme-cardradio">
                     <div class="row">
                        <div class="col-4">
                           <div class="form-check card-radio">
                              <input class="form-check-input" type="radio" name="data-theme"
                                 id="layout-color-light" value="light">
                              <label class="form-check-label p-0 avatar-md w-100" for="layout-color-light">
                              <span class="d-flex h-100">
                              <span class="flex-shrink-0">
                              <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                              <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              </span>
                              </span>
                              <span class="flex-grow-1">
                              <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              </span>
                              </span>
                              </span>
                              </label>
                           </div>
                           <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                        </div>
                        <div class="col-4">
                           <div class="form-check card-radio">
                              <input class="form-check-input" type="radio" name="data-theme"
                                 id="layout-color-dark" value="dark">
                              <label class="form-check-label p-0 avatar-md w-100 bg-black"
                                 for="layout-color-dark">
                              <span class="d-flex h-100">
                              <span class="flex-shrink-0">
                              <span class="bg-light-lighten d-flex h-100 flex-column p-1 px-2">
                              <span class="d-block p-1 bg-light-lighten rounded mb-1"></span>
                              <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                              <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                              <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                              <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                              </span>
                              </span>
                              <span class="flex-grow-1">
                              <span class="d-flex h-100 flex-column">
                              <span class="bg-light-lighten d-block p-1"></span>
                              </span>
                              </span>
                              </span>
                              </label>
                           </div>
                           <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                        </div>
                     </div>
                  </div>
                  <div id="layout-width">
                     <h5 class="my-3 font-16 fw-bold">Layout Mode</h5>
                     <div class="row">
                        <div class="col-4">
                           <div class="form-check card-radio">
                              <input class="form-check-input" type="radio" name="data-layout-mode"
                                 id="layout-mode-fluid" value="fluid">
                              <label class="form-check-label p-0 avatar-md w-100" for="layout-mode-fluid">
                              <span class="d-flex h-100">
                              <span class="flex-shrink-0">
                              <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                              <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              </span>
                              </span>
                              <span class="flex-grow-1">
                              <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              </span>
                              </span>
                              </span>
                              </label>
                           </div>
                           <h5 class="font-14 text-center text-muted mt-2">Fluid</h5>
                        </div>
                        <div class="col-4" id="layout-boxed">
                           <div class="form-check card-radio">
                              <input class="form-check-input" type="radio" name="data-layout-mode"
                                 id="layout-mode-boxed" value="boxed">
                              <label class="form-check-label p-0 avatar-md w-100 px-2" for="layout-mode-boxed">
                              <span class="d-flex h-100 border-start border-end">
                              <span class="flex-shrink-0">
                              <span class="bg-light d-flex h-100 border-end flex-column p-1">
                              <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              </span>
                              </span>
                              <span class="flex-grow-1">
                              <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              </span>
                              </span>
                              </span>
                              </label>
                           </div>
                           <h5 class="font-14 text-center text-muted mt-2">Boxed</h5>
                        </div>
                        <div class="col-4" id="layout-detached">
                           <div class="form-check sidebar-setting card-radio">
                              <input class="form-check-input" type="radio" name="data-layout-mode"
                                 id="data-layout-detached" value="detached">
                              <label class="form-check-label p-0 avatar-md w-100" for="data-layout-detached">
                              <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-flex p-1 align-items-center border-bottom">
                              <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                              <span class="d-block border border-3 ms-auto"></span>
                              <span class="d-block border border-3 ms-1"></span>
                              <span class="d-block border border-3 ms-1"></span>
                              <span class="d-block border border-3 ms-1"></span>
                              </span>
                              <span class="d-flex h-100 p-1 px-2">
                              <span class="flex-shrink-0">
                              <span class="bg-light d-flex h-100 flex-column p-1 px-2">
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100"></span>
                              </span>
                              </span>
                              </span>
                              <span class="bg-light d-block p-1 mt-auto px-2"></span>
                              </span>
                              </label>
                           </div>
                           <h5 class="font-14 text-center text-muted mt-2">Detached</h5>
                        </div>
                     </div>
                  </div>
                  <h5 class="my-3 font-16 fw-bold">Topbar Color</h5>
                  <div class="row">
                     <div class="col-4">
                        <div class="form-check card-radio">
                           <input class="form-check-input" type="radio" name="data-topbar-color"
                              id="topbar-color-light" value="light">
                           <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-light">
                           <span class="d-flex h-100">
                           <span class="flex-shrink-0">
                           <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                           <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                           <span class="d-block border border-3 w-100 mb-1"></span>
                           <span class="d-block border border-3 w-100 mb-1"></span>
                           <span class="d-block border border-3 w-100 mb-1"></span>
                           <span class="d-block border border-3 w-100 mb-1"></span>
                           </span>
                           </span>
                           <span class="flex-grow-1">
                           <span class="d-flex h-100 flex-column">
                           <span class="bg-light d-block p-1"></span>
                           </span>
                           </span>
                           </span>
                           </label>
                        </div>
                        <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                     </div>
                     <div class="col-4">
                        <div class="form-check card-radio">
                           <input class="form-check-input" type="radio" name="data-topbar-color"
                              id="topbar-color-dark" value="dark">
                           <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-dark">
                           <span class="d-flex h-100">
                           <span class="flex-shrink-0">
                           <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                           <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                           <span class="d-block border border-3 w-100 mb-1"></span>
                           <span class="d-block border border-3 w-100 mb-1"></span>
                           <span class="d-block border border-3 w-100 mb-1"></span>
                           <span class="d-block border border-3 w-100 mb-1"></span>
                           </span>
                           </span>
                           <span class="flex-grow-1">
                           <span class="d-flex h-100 flex-column">
                           <span class="bg-dark d-block p-1"></span>
                           </span>
                           </span>
                           </span>
                           </label>
                        </div>
                        <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                     </div>
                  </div>
                  <div id="sidebar-color">
                     <h5 class="my-3 font-16 fw-bold">Sidebar Color</h5>
                     <div class="row">
                        <div class="col-4">
                           <div class="form-check sidebar-setting card-radio">
                              <input class="form-check-input" type="radio" name="data-sidenav-color"
                                 id="leftbar-color-light" value="light">
                              <label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-light">
                              <span class="d-flex h-100">
                              <span class="flex-shrink-0">
                              <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                              <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              </span>
                              </span>
                              <span class="flex-grow-1">
                              <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              </span>
                              </span>
                              </span>
                              </label>
                           </div>
                           <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                        </div>
                        <div class="col-4">
                           <div class="form-check sidebar-setting card-radio">
                              <input class="form-check-input" type="radio" name="data-sidenav-color"
                                 id="leftbar-color-dark" value="dark">
                              <label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-dark">
                              <span class="d-flex h-100">
                              <span class="flex-shrink-0">
                              <span class="bg-dark d-flex h-100 flex-column p-1 px-2">
                              <span class="d-block p-1 bg-light-lighten rounded mb-1"></span>
                              <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                              <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                              <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                              <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                              </span>
                              </span>
                              <span class="flex-grow-1">
                              <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              </span>
                              </span>
                              </span>
                              </label>
                           </div>
                           <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                        </div>
                        <div class="col-4">
                           <div class="form-check sidebar-setting card-radio">
                              <input class="form-check-input" type="radio" name="data-sidenav-color"
                                 id="leftbar-color-default" value="default">
                              <label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-default">
                              <span class="d-flex h-100">
                              <span class="flex-shrink-0">
                              <span class="bg-primary bg-gradient d-flex h-100 flex-column p-1 px-2">
                              <span class="d-block p-1 bg-light-lighten rounded mb-1"></span>
                              <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                              <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                              <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                              <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                              </span>
                              </span>
                              <span class="flex-grow-1">
                              <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              </span>
                              </span>
                              </span>
                              </label>
                           </div>
                           <h5 class="font-14 text-center text-muted mt-2">Brand</h5>
                        </div>
                     </div>
                  </div>
                  <div id="sidebar-size">
                     <h5 class="my-3 font-16 fw-bold">Sidebar Size</h5>
                     <div class="row">
                        <div class="col-4">
                           <div class="form-check sidebar-setting card-radio">
                              <input class="form-check-input" type="radio" name="data-sidenav-size"
                                 id="leftbar-size-default" value="default">
                              <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-default">
                              <span class="d-flex h-100">
                              <span class="flex-shrink-0">
                              <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                              <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              </span>
                              </span>
                              <span class="flex-grow-1">
                              <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              </span>
                              </span>
                              </span>
                              </label>
                           </div>
                           <h5 class="font-14 text-center text-muted mt-2">Default</h5>
                        </div>
                        <div class="col-4">
                           <div class="form-check sidebar-setting card-radio">
                              <input class="form-check-input" type="radio" name="data-sidenav-size"
                                 id="leftbar-size-compact" value="compact">
                              <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-compact">
                              <span class="d-flex h-100">
                              <span class="flex-shrink-0">
                              <span class="bg-light d-flex h-100 border-end  flex-column p-1">
                              <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              </span>
                              </span>
                              <span class="flex-grow-1">
                              <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              </span>
                              </span>
                              </span>
                              </label>
                           </div>
                           <h5 class="font-14 text-center text-muted mt-2">Compact</h5>
                        </div>
                        <div class="col-4">
                           <div class="form-check sidebar-setting card-radio">
                              <input class="form-check-input" type="radio" name="data-sidenav-size"
                                 id="leftbar-size-small" value="condensed">
                              <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-small">
                              <span class="d-flex h-100">
                              <span class="flex-shrink-0">
                              <span class="bg-light d-flex h-100 border-end  flex-column">
                              <span class="d-block p-1 bg-dark-lighten mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              </span>
                              </span>
                              <span class="flex-grow-1">
                              <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              </span>
                              </span>
                              </span>
                              </label>
                           </div>
                           <h5 class="font-14 text-center text-muted mt-2">Condensed</h5>
                        </div>
                        <div class="col-4">
                           <div class="form-check sidebar-setting card-radio">
                              <input class="form-check-input" type="radio" name="data-sidenav-size"
                                 id="leftbar-size-small-hover" value="sm-hover">
                              <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-small-hover">
                              <span class="d-flex h-100">
                              <span class="flex-shrink-0">
                              <span class="bg-light d-flex h-100 border-end  flex-column">
                              <span class="d-block p-1 bg-dark-lighten mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              <span class="d-block border border-3 w-100 mb-1"></span>
                              </span>
                              </span>
                              <span class="flex-grow-1">
                              <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              </span>
                              </span>
                              </span>
                              </label>
                           </div>
                           <h5 class="font-14 text-center text-muted mt-2">Hover View</h5>
                        </div>
                        <div class="col-4">
                           <div class="form-check sidebar-setting card-radio">
                              <input class="form-check-input" type="radio" name="data-sidenav-size"
                                 id="leftbar-size-full" value="full">
                              <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-full">
                              <span class="d-flex h-100">
                              <span class="flex-shrink-0">
                              <span class="d-flex h-100 border-end  flex-column">
                              <span class="d-block p-1 bg-dark-lighten mb-1"></span>
                              </span>
                              </span>
                              <span class="flex-grow-1">
                              <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              </span>
                              </span>
                              </span>
                              </label>
                           </div>
                           <h5 class="font-14 text-center text-muted mt-2">Full Layout</h5>
                        </div>
                     </div>
                  </div>
                  <div id="layout-position">
                     <h5 class="my-3 font-16 fw-bold">Layout Position</h5>
                     <div class="btn-group radio" role="group">
                        <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed"
                           value="fixed">
                        <label class="btn btn-light w-sm" for="layout-position-fixed">Fixed</label>
                        <input type="radio" class="btn-check" name="data-layout-position"
                           id="layout-position-scrollable" value="scrollable">
                        <label class="btn btn-light w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                     </div>
                  </div>
                  <div id="sidebar-user">
                     <div class="d-flex justify-content-between align-items-center mt-3">
                        <label class="font-16 fw-bold m-0" for="sidebaruser-check">Sidebar User Info</label>
                        <div class="form-check form-switch">
                           <input type="checkbox" class="form-check-input" name="sidebar-user"
                              id="sidebaruser-check">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="offcanvas-footer border-top p-3 text-center">
            <div class="row">
               <div class="col-6">
                  <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
               </div>
               <div class="col-6">
                  <button type="button" class="btn btn-primary w-100">Buy Now</button>
               </div>
            </div>
         </div>
      </div>
      <!-- Vendor js -->
      <script src="assets/js/vendor.min.js"></script>
      <!-- Code Highlight js -->
      <script src="assets/vendor/highlightjs/highlight.pack.min.js"></script>
      <script src="assets/js/hyper-syntax.js"></script>
      <!-- Datatables js -->
      <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
      <script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
      <script src="assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
      <script src="assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
      <script src="assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
      <script src="assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
      <script src="assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
      <script src="assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
      <script src="assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
      <script src="assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
      <script src="assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
      <script src="assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
      <!-- Multiple Select Option Js -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
      <script src="assets/js/bootstrap-select.js"></script>
      <!-- Datatable Demo Aapp js -->
      <script src="assets/js/pages/demo.datatable-init.js"></script>
      <!-- App js -->
      <script src="assets/js/app.min.js"></script>
   </body>
</html>