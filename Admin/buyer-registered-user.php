<?php
session_start();

if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
error_reporting(0);
    include("include/connection.php");
    if($_SESSION['email']=='' || $_SESSION['email']==NULL)
    header('location:index.php');
?>
<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-sidenav-color="light" data-sidenav-user="true">

    
<!-- Mirrored from coderthemes.com/hyper_2/modern/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Oct 2022 04:56:09 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Buyer Registered Users</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Datatables css -->
        <link href="assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

        <!-- Theme Config Js -->
        <script src="assets/js/hyper-config.js"></script>

        <!-- Icons css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="app-style" />
    </head>

    <body>
        <!-- Begin page -->
        <div class="wrapper">

            
            <!-- ========== Topbar Start ========== -->
            <?php include("include/header.php"); ?>
            <!-- ========== Topbar End ========== -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include("include/navbar.php"); ?>
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
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Buyer Registered Users</h4>
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
                                                <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Contact Person Name</th>
                                                            <th>Phone No.</th>
                                                            <th>Landline No.</th>
                                                            <th>Email</th>
                                                            <th>Designation</th>
                                                            <th>Company Name</th>
                                                            <th>Company Website</th>
                                                            <th>Company Address</th>
                                                            <th>Business Activities</th>
                                                            <th>State</th>
                                                            <th>Buyer Type</th>
                                                            <th>GST No.	</th>
                                                            <th>GST Document</th>
                                                            <th>PAN No.</th>
                                                            <th>PAN Document</th>
                                                            <th>FSSAI No.</th>
                                                            <th>FSSAI Status</th>
                                                            <th>FSSAI Document</th>
                                                            <th>IEC No.</th>
                                                            <th>IEC Document</th>
                                                            <th>Registration Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                           $buyer = "SELECT *,concat(Retailer_gst,Wholesaler_gst,processor_gst,exporter_gst) as GST,concat(Retailer_gst_file,Wholesaler_file,processor_gst_file,exporter_gst_file) as GSTDocuments,concat(Retailer_pan,Wholesaler_pan,processor_pan,exporter_pan) as PAN_Cards,concat(Retailer_pan_file,Wholesaler_pan_file,processor_pan_file,exporter_pan_file) as PAN_Documents, concat(Retailer_fssai,Wholesaler_fssai,processor_fssai,exporter_fssai) as FSSAI,concat(Retailer_fssai_status,Wholesaler_fssai_status,processor_fssai_status,exporter_fssai_status) as FSSAI_Status,concat(Retailer_fassai_file,Wholesaler__fassai,processor_fssai_file,exporter_fssai_file) as FSSAI_Files, concat(Retailer_iec,Wholesaler_iec,processor_iec,exporter_iec) as IEC,concat(Retailer_iec_file,Wholesaler_iec_file,processor_iec_file,exporter_iec_file) as IEC_Files FROM `buyer_registration` ORDER BY Buyer_Registration_ID DESC";
                                                           $execute = mysqli_query($db, $buyer);
                                                           $count = 1;
                                                           while($read = mysqli_fetch_assoc($execute))
                                                           {
                                                               $StartDate = date_create($read['CreatedDate']);
                                                               $Date = date_format($StartDate,"d M Y");
                                                        ?>
                                                    <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td class="whitespace-nowrap"><?php echo $read['ContactPersonName']; ?></td>
                                                <td class="whitespace-nowrap"><?php echo $read['MobileNo']; ?></td>
                                                <td class="whitespace-nowrap"><?php echo $read['LandlineNo']; ?></td>
                                                <td class="whitespace-nowrap"><?php echo $read['Email']; ?></td>
                                                <td class="whitespace-nowrap"><?php echo $read['Designation']; ?></td>
                                                <td class="whitespace-nowrap"><?php echo $read['CompanyName']; ?></td>
                                                <td class="whitespace-nowrap"><?php echo $read['CompanyWeb']; ?></td>
                                                <td class="whitespace-nowrap"><?php echo $read['CompanyAddress']; ?></td>
                                                <td class="whitespace-nowrap"><?php echo $read['BusinessActivities']; ?></td>
                                                <td class="whitespace-nowrap"><?php echo $read['State']; ?></td>
                                                <td class="whitespace-nowrap"><?php echo $read['BuyerType']; ?></td>
                                                <td class="whitespace-nowrap"><?php echo $read['GST'] ?></td>
                                                <td class="whitespace-nowrap">
                                                    <a href="../BuyerRegistrationCertificates/GST/<?php echo $read['GSTDocuments']; ?>" target="_blank"><img src="../images/download.png" style="width:40px; text-align: center;"></a>
                                                </td>
                                                <td class="whitespace-nowrap"><?php echo $read['PAN_Cards']; ?></td>
                                                <td class="whitespace-nowrap">
                                                    <a href="../BuyerRegistrationCertificates/PAN/<?php echo $read['PAN_Documents']; ?>" target="_blank"><img src="../images/download.png" style="width:40px; text-align: center;"></a>
                                                </td>
                                                <td class="whitespace-nowrap"><?php echo $read['FSSAI']; ?></td>
                                                <td class="whitespace-nowrap"><?php echo $read['FSSAI_Status']; ?></td>
                                                <td class="whitespace-nowrap">
                                                    <a href="../BuyerRegistrationCertificates/FSSAI/<?php echo $read['FSSAI_Files']; ?>" target="_blank"><img src="../images/download.png" style="width:40px; text-align: center;"></a>
                                                </td>
                                                <td class="whitespace-nowrap"><?php echo $read['IEC']; ?></td>
                                                <td class="whitespace-nowrap">
                                                    <a href="../BuyerRegistrationCertificates/IEC/<?php echo $read['IEC_Files']; ?>" target="_blank"><img src="../images/download.png" style="width:40px; text-align: center;"></a>
                                                </td>
                                                <td class="whitespace-nowrap"><?php echo $Date; ?></td>
                                                            <td>
                                                                <abbr title="Edit"><a href="#"><button type="button" class="btn btn-success"><i class="mdi mdi-grease-pencil"></i> </button></a></abbr>

                                                                <abbr title="Delete"><a href="#"><button type="button" class="btn btn-danger"><i class="mdi mdi-trash-can"></i> </button></a></abbr>
                                                            </td>
                                                    </tr>
                                                         <?php $count++; } ?>
                                                    </tbody>
                                                </table>                                          
                                            </div> <!-- end preview-->
                                        </div> <!-- end tab-content-->
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div> <!-- end row-->
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include("include/footer.php"); ?>
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
                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body p-0">
                <div data-simplebar class="h-100">
                    <div class="card mb-0 p-3">
                        <h5 class="mt-0 font-16 fw-bold mb-3">Choose Layout</h5>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input id="customizer-layout01" name="data-layout" type="radio" value="vertical" class="form-check-input">
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
                                    <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal" class="form-check-input">
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
                                        <input class="form-check-input" type="radio" name="data-theme" id="layout-color-light"
                                            value="light">
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
                                        <input class="form-check-input" type="radio" name="data-theme" id="layout-color-dark"
                                            value="dark">
                                        <label class="form-check-label p-0 avatar-md w-100 bg-black" for="layout-color-dark">
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
                                    <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-dark"
                                        value="dark">
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
                                        <input class="form-check-input" type="radio" name="data-sidenav-size" id="leftbar-size-full" value="full">
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
                                <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed" value="fixed">
                                <label class="btn btn-light w-sm" for="layout-position-fixed">Fixed</label>

                                <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable" value="scrollable">
                                <label class="btn btn-light w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                            </div>
                        </div>

                        <div id="sidebar-user">
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <label class="font-16 fw-bold m-0" for="sidebaruser-check">Sidebar User Info</label>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" name="sidebar-user" id="sidebaruser-check">
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

        <!-- Datatable Demo Aapp js -->
        <script src="assets/js/pages/demo.datatable-init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>

<!-- Mirrored from coderthemes.com/hyper_2/modern/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Oct 2022 04:56:15 GMT -->
</html>
