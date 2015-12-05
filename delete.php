<?php
session_start();
ob_start();
$Product_ID=$_GET["id"];
$arr=$_SESSION["mycar"];
foreach($arr as$key=>$proId)
{
if($key==$Product_ID)
{
unset($arr[$key]);
}
}
$_SESSION["mycar"]=$arr;
ob_clean();
header("location:car.php");
?>

