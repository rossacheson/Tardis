<?php

include ("conn.php");
ob_start();

$Store_id=$_POST("Store_ID");

$store="select Store_ID from store where Store_ID =".$Store_id;
$store_result=mysql_query($store, $conn);


$salesperson="select name,employee_ID from employee where job_title='salesperson'and store_ID=".$Store_id;
$salesperson_result=  mysql_query($salesperson, $conn);

while($row = mysql_fetch_array($salesperson_result))
  {
  echo $row['salesperson_ID'];
  echo "<br />";
  }

ob_clean();

?>




