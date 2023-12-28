<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
$host = 'localhost';
$username = 'tmdicai_kgap_premiummarket_user';
$password = '[*%-7Azxy^3K';
$database = 'tmdicai_krishigap_premiummarket';
$db = mysqli_connect($host, $username, $password, $database);
if ($db->connect_error) {
   echo "Not connected, error: " . $mysqli_connection->connect_error;
}

?>
