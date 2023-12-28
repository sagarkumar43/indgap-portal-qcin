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
 
$User_Assing_ID = $_GET['id'];
$query = mysqli_query($db, "UPDATE `fpo_user_to_assign_cb` SET `DeletedStatus` ='1' where User_Assing_ID ='$User_Assing_ID'");
if ($query) {
    echo "<script>alert('Successfully Deleted'); window.location = 'fpo_assign_to_cb.php';</script>";
} else {
    echo "<script>alert('Successfully Not Deleted'); window.location = 'fpo_assign_to_cb.php';</script>";
} ?>