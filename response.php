<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
session_start();
error_reporting(0);
$FPO_Registration_ID=$_SESSION['FPO_Registration_ID'];
if ($_SESSION['FPO_Registration_ID'] == '') {
    header("Location: fpo-login.php");
}
include "connection.php";
$CommodityCategory = $_POST['input_Category'];
if(!empty($CommodityCategory)){
    $query = "SELECT CommodityName, Category FROM own_production WHERE Category='$CommodityCategory' AND FPO_Registration_ID='$FPO_Registration_ID' GROUP BY CommodityName";
    // $query = "SELECT * FROM `production` WHERE CommodityCategory='$CommodityCategory' AND DeletedStatus='0' AND FPO_Registration_ID='$FPO_Registration_ID'";
    $result = $db->query($query);

    if($result->num_rows > 0){
        echo '<option value="">Select Commodity</option>';
        while($row = $result->fetch_assoc()){
            echo '<option value="'.$row['CommodityName'].'">'.$row['CommodityName'].'</option>';
        }
    }
    else{
        echo '<option value="">Commodity is not available</option>';
    }
}
?>