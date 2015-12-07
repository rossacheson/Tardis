<?php
session_start();
ob_start();
$product_ID=$_GET["id"];
$arr=$_SESSION["mycart"];
foreach($arr as$key=>$proId)
{
if($key==$product_ID)
{
unset($arr[$key]);
}
}
$_SESSION["mycart"]=$arr;
ob_clean();
header("location:cart.php");
?>

