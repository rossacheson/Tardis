<?php

include ("conn.php");
ob_start();

$store_id=$_POST("store_ID");

$salesperson="select employee_ID from employee where job_title='salesperson'and store_ID=".$store_id;
$salesperson_result=  mysql_query($salesperson, $conn);

while($row = mysql_fetch_array($salesperson_result))
  {
  echo $row['salesperson_ID'];
  echo "<br />";
  }

ob_clean();

?>




