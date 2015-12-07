<?php

include ("conn.php");

$Product_id=$_POST["Product_id"]; 
$Store_id=$_POST["Store_id"];
$Add_amount=$_POST["Add_amount"];

$product_check="select * from inventore_amount where Product_ID =".$Product_id+"AND Store_ID=".$Store_id;
$result=mysql_query($product_check, $conn);

if($result!=null){
    mysql_query("UPDATE inventore_amount SET Inventory_Amount=Inventory_Amount+1 WHERE Product_ID =".$Product_id+" AND Store_ID=".$Store_id);
}

else{
    mysql_query("INSERT INTO inventore_amount(Product_ID,Store_ID,Inventory_Amount) VALUES ('{$Product_id}','{$Store_id}','{$Add_amount}')");

}
    
mysql_close($conn);   
?>