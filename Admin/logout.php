<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['name']);

if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
echo"<script>window.location.href = 'index.php'</script>";
?>