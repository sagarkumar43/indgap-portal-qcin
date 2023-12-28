<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
session_start();
unset($_SESSION['cb_user_id']);
unset($_SESSION['cb_Name']);
unset($_SESSION['cb_Email']);
unset($_SESSION['cb_Mobile']);
header("Location: index.php");
?> 
