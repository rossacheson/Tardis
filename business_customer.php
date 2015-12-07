<?php
include ("conn.php");
ob_start();

$Customer_id=$_POST["Customer_ID"]; 
$name=$_POST["name"];
$business_category=$_POST["business_category"];
$company_gross_annual_income_str=$POST("company_gross_annual_income");

$company_gross_annual_income=(float)$company_gross_annual_income_str;

$customer_check="select * from customer where Customer_ID =".$Customer_id;
$result=mysql_query($customer_check, $conn);

if($result!=null){
    echo "The customer has already existed!";
}

else{
    mysql_query("INSERT INTO business_customer(Customer_ID,name,business_category,company_gross_annual_income) VALUES ('{$Customer_id}','{$name}','{$business_category}','{$company_gross_annual_income}')");
    mysql_query("INSERT INTO business_customer(Customer_ID,name) VALUES ('{$Customer_id}','{$name}')");

ob_clean();
mysql_close($conn);   
?>
