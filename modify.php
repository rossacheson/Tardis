<?php

echo $_POST["select"];

?>


<?php


session_start();
ob_start();

$number=$_POST["select"];

$Product_ID=$_GET["id"];
$arr=$_SESSION["mycar"];
foreach($arr as$key=>$proId)
{
if($key==$Product_ID)
{
$uu=$arr[$Product_ID];
$uu["num"]=$number;
$arr[$Product_ID]=$uu;
}

}

echo $uu["num"];
$_SESSION["mycar"]=$arr;
ob_clean();
header("location:car.php");


?>