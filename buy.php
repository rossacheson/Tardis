<?php

session_start();
ob_start();

$Product_ID=$_GET['id'];

@$name=$_GET['name'];
$arr=$_SESSION["mycart"];

if(is_array($arr))
{
if(array_key_exists($Product_ID,$arr))
{
$uu=$arr[$Product_ID];
$uu["num"]=$uu["num"];
$arr[$Product_ID]=$uu;
}
else
{
$arr[$Product_ID]=array("Product_ID"=>$Product_ID,"name"=>$name,"num"=>1);
}
}
else
{
$arr[$Product_ID]=array("Product_ID"=>$Product_ID,"name"=>$name,"num"=>1);

}

$_SESSION["mycart"]=$arr;
ob_clean();
header("location:cart.php")

?>
