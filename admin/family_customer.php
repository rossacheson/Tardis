<?php
include ("conn.php");

ob_start();

$Customer_id=$_POST["Customer_ID"]; 
$name=$_POST["name"];
$marriage_status=$_POST["marriage_status"];
$gender=$POST("gender");
$age_str=$POST("age");
$income_str=$POST("income");

$age=(int)$age_str;
$income=(float)$income_str;

$customer_check="select * from customer where Customer_ID =".$Customer_id;
$result=mysql_query($customer_check, $conn);

if($result!=null){
    echo "The customer has already existed!";
}

else{
    mysql_query("INSERT INTO family_customer(Customer_ID,name,marriage_status,gender,age,income) VALUES ('{$Customer_id}','{$name}','{$gender}','{$age}','{$income}')");
    mysql_query("INSERT INTO customer(Customer_ID,name) VALUES ('{$Customer_id}','{$name}')");
}

ob_clean();
mysql_close($conn);   
?>