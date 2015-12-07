<?php

include ("conn.php");
ob_start();

$Store_id=$_POST("Store_ID");

$salesperson="select employee_ID from employee where job_title='salesperson'and store_ID=".$Store_id;
$salesperson_result=  mysql_query($salesperson, $conn);

while($row = mysql_fetch_array($salesperson_result))
  {
  echo $row['salesperson_ID'];
  echo "<br />";
  }

ob_clean();

?>




