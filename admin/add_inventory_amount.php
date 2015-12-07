<?php

include ("conn.php");

$product_ID=$_POST["product_ID"]; 
$store_ID=$_POST["store_ID"];
$add_amount=$_POST["add_amount"];

$product_check="select * from inventory_amount where product_ID =".$product_ID+"AND store_ID=".$store_ID;
$result=mysql_query($product_check, $conn);

if($result!=null){
    mysql_query("UPDATE inventory_amount SET inventory_amt=inventory_amt+".$add_amount+" WHERE product_ID =".$product_ID+" AND store_ID=".$store_ID);
}

else{
    mysql_query("INSERT INTO inventory_amount(product_ID,store_ID,inventory_amt) VALUES ('{$product_ID}','{$store_ID}','{$add_amount}')");

}
    
mysql_close($conn);   
?>