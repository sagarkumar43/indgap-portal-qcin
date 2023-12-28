<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   include ("include/connection.php");
   if ($_SESSION['super_email'] == '' || $_SESSION['super_email'] == NULL) header('location:index.php');
   ?>
<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-sidenav-color="light" data-sidenav-user="true">
   <head>
      <meta charset="utf-8" />
      <title>FPO Export</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
      <meta content="Coderthemes" name="author" />
      <link rel="shortcut icon" href="assets/images/favicon.ico">
      <link href="assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
      <link href="assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
      <link href="assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
      <link href="assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
      <link href="assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
      <link href="assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
      <script src="assets/js/hyper-config.js"></script>
      <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="app-style" />
      <style>
         table.dataTable.nowrap td {
         white-space: inherit!important;
         }
      </style>
   </head>
   <body>
      <div class="wrapper">
         <?php include ("include/header.php"); ?>
         <?php include ("include/navbar.php"); ?>
         <div class="content-page">
            <div class="content">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
                           <h4 class="mb-0 text-gray -800">FPO Assing to CB User</h4>
                           <a href="add_assign_FPO_to_CB.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add New</a>
                        </div>
                     </div>
                  </div>
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
                                             <th>FPO User List</th>
                                             <th>Assign to CB User</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php
                                             $query = mysqli_query($db, "SELECT * from `fpo_user_to_assign_cb` where `DeletedStatus` ='0' ORDER BY User_Assing_ID DESC");
                                             if ($query) {
                                                 $count = 1;
                                                 while ($row = mysqli_fetch_array($query)) {
                                             ?>
                                          <tr>
                                             <td><?php echo $count; ?></td>
                                             <td><?php
                                                $FPO_User_ID = explode(",", $row['FPO_User_ID']);
                                                foreach ($FPO_User_ID as $FPO_User_ID1) {
                                                    $query1 = mysqli_query($db, "SELECT FPOExporterName from `fpo_registration` where `DeletedStatus` ='0' AND FPO_Registration_ID ='$FPO_User_ID1'");
                                                    $alpha++;
                                                    $row1 = mysqli_fetch_assoc($query1);
                                                    echo $row1['FPOExporterName'];
                                                    echo '<br>';
                                                }
                                                ?></td>
                                             <td>
                                                <?php
                                                   $CB_User = explode(",", $row['CB_User']);
                                                   foreach ($CB_User as $CB_User1) {
                                                       $query2 = mysqli_query($db, "SELECT Name from `cb_users` where `DeletedStatus` ='0' AND cb_user_id ='$CB_User1'");
                                                       
                                                       $row2 = mysqli_fetch_assoc($query2);
                                                       echo  $row2['Name'];
                                                       echo '<br>';
                                                   }
                                                   ?>
                                             </td>
                                             <td>
                                                <abbr title="Edit"><a href="edit_fpo_assign_to_cb.php?id=<?php echo $row['User_Assing_ID']; ?>" onclick="return confirm('Are you sure you want Edit this record ?')"><button type="button" class="btn btn-success"><i class="mdi mdi-grease-pencil"></i> </button></a></abbr>
                                                <abbr title="Delete"><a href="delete_fpo_assign_to_cb.php?id=<?php echo $row['User_Assing_ID']; ?>" onclick="return confirm('Are you sure you want Delete this record ?')"><button type="button" class="btn btn-danger"><i class="mdi mdi-trash-can"></i> </button></a></abbr>
                                             </td>
                                          </tr>
                                          <?php $count = $count + 1;
                                             }
                                             } ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php include ("include/footer.php"); ?>
         </div>
      </div>
      <script src="assets/js/vendor.min.js"></script>
      <script src="assets/vendor/highlightjs/highlight.pack.min.js"></script>
      <script src="assets/js/hyper-syntax.js"></script>
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
      <script src="assets/js/pages/demo.datatable-init.js"></script>
      <script src="assets/js/app.min.js"></script>
   </body>
</html>