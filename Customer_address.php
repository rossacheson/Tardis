<?php
include ("conn.php");
ob_start();

$Customer_id=$_POST["Customer_ID"]; 
$street=$_POST["street"];
$city=$_POST["city"];
$state=$POST("state");
$zipcode=$POST("zipcode");

$customer_check="select * from customer_address where Customer_ID =".$Customer_id;
$result=mysql_query($customer_check, $conn);

if($result!=null){
    echo "The customer has already existed!";
}

else{
    mysql_query("INSERT INTO customer_address(Customer_ID,street,city,state,zipcode) VALUES ('{$Customer_id}','{$street}','{$city}','{$state}','{$zipcode}')");

}

ob_clean();
mysql_close($conn);   
?>