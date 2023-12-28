<?php

if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
session_start();
unset($_SESSION['super_admin_id']);
unset($_SESSION['super_email']);
header("Location: index.php");
// session_destroy();
// echo"<script>window.location.href = 'index.php'</script>";
?>