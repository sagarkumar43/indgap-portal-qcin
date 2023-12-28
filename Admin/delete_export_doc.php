<?php
session_start();
error_reporting(0);

if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
include("include/connection.php");
if($_SESSION['email']=='' || $_SESSION['email']==NULL)
header('location:index.php');
$id = $_GET['delete'];
$delete = "UPDATE `export_document` SET DeletedStatus='1' WHERE Id='$id'";
$execute = mysqli_query($db,$delete);
if($execute == TRUE)
{
    echo "<script>alert('Successfully Deleted.')</script>";
    echo "<script>window.location.href='admin_export.php'</script>";
}
else
{
    echo "<script>alert('Sorry Can't Delete, Try Again.')</script>";
}


?>