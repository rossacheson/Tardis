
<?php

$ID=$_GET["id"];

include("conn.php");
	
$query="select sum(inventory_amt) as inventory_sum from inventory_amount where product_ID='$ID'";
               
/*echo $Product_ID;*/
$result=mysql_query($query, $conn);
if(!$result) {
	die('Query Failed'. mysql_error());
} 
$inventory_number = mysql_result($result, 0);
//echo $inventory_number;
/*while($row=mysql_fetch_array($result))
{
  $inventory_number=$row["inventory_amt"];
}*/


if( $inventory_number>=$_POST["select"])
{
session_start();
ob_start();

$number=$_POST["select"];

$Product_ID=$_GET["id"];


$arr=$_SESSION["mycart"];
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
$_SESSION["mycart"]=$arr;
ob_clean();
header("location:cart.php");

}

else
{
echo "<p>Sorry, you selected ",$_POST["select"]," units, but we only have $inventory_number in stock</p>";
echo "<a href='cart.php'>Back to cart</a>";
}

?>