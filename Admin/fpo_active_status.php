<?php
session_start();
error_reporting(0);

if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
include("include/connection.php");
$statusId  = $_GET['active'];
$Update = "UPDATE `fpo_registration` SET Account_Status='Active' WHERE FPO_Registration_ID = '$statusId'";
$Execute = mysqli_query($db,$Update);
if($Execute == TRUE)
{
    echo "<script>alert('Status Changed')</script>";
    echo '<script>window.location.href ="fpo_accounts.php"</script>';
}
else
{
    echo "<script>alert('Status not Changed')</script>";
    echo '<script>window.location.href ="fpo_accounts.php"</script>';
}
?>