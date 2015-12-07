<?php
include ("../conn.php");
//ob_start();

$customer_ID=$_POST['customer_ID']; 
$name=$_POST["name"];
$business_category=$_POST["business_category"];
$company_gross_annual_income_str=$_POST["company_gross_annual_income"];

$company_gross_annual_income=(int)$company_gross_annual_income_str;

$customer_check="select * from customer where customer_ID ='$customer_ID'";
$result=mysql_query($customer_check, $conn);

if(mysql_num_rows($result) != 0){
    echo "The customer has already existed!";
}
else{
	echo "Adding customer";
	mysql_query("INSERT INTO customer(customer_ID,name) VALUES ('$customer_ID','$name')");
    mysql_query("INSERT INTO business_customer(customer_ID,business_category,company_gross_annual_income) VALUES ('$customer_ID','$business_category','$company_gross_annual_income')");
}
//ob_clean();
mysql_close($conn);   
?>