<?php

include("conn.php");
ob_start();
session_start();

$Salesperson_ID=$_POST("Salesperson_ID");

$sales="select employee_ID,name from store where employee_ID =".$Salesperson_ID;
$sales_result=mysql_query($store, $conn);

session_register($sales_result);

ob_clean();
?>
