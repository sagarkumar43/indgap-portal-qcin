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
$delete = $_GET['id'];

$delete_query = "DELETE FROM `own_production` WHERE Id='$delete'";
$execute = mysqli_query($db,$delete_query);
if($execute == TRUE)
{
    echo "<script>alert('Successfully Deleted.')</script>";
    echo "<script>window.location.href='view-production.php'</script>";
}
else
{
    echo "<script>alert('Sorry Can't Delete, Try Again.')</script>";
}


?>