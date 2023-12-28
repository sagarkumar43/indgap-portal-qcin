<?php
session_start();

if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
error_reporting(0);
include("include/connection.php");
$statusId  = $_GET['BuyerInactive'];
$Update = "UPDATE `buyer_registration` SET Account_Status='Inactive' WHERE Buyer_Registration_ID = '$statusId'";
$Execute = mysqli_query($db,$Update);
if($Execute == TRUE)
{
    echo "<script>alert('Status Changed')</script>";
    echo '<script>window.location.href ="buyer_accounts.php"</script>';
}
else
{
    echo "<script>alert('Status not Changed')</script>";
    echo '<script>window.location.href ="buyer_accounts.php"</script>';
}
?>