<?php

$Product_ID=$_GET['id'];
include("conn.php");
	
$query="select inventory_amt  from inventory_amount where product_ID='$Product_ID'";

$result=mysql_query($query, $conn);
if(!$result) {
	die('Query Failed'. mysql_error());
} 
$inventory_number = mysql_result($result, 0);
if( $inventory_number==0)
{
	echo "Sorry, out of stock. ";
	echo "<p>Find more attracting product at here <a href='cart.php'>Back to cart</a></p>";
}
	




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
$arr[$Product_ID]=array("product_ID"=>$Product_ID,"name"=>$name,"num"=>1);
}
}
else
{
$arr[$Product_ID]=array("product_ID"=>$Product_ID,"name"=>$name,"num"=>1);

}

$_SESSION["mycart"]=$arr;
ob_clean();
header("location:cart.php")

?>
