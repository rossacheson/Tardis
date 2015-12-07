<?php

include ("conn.php");
//ob_start();

$store_ID=$_POST["store_ID"];
echo "You entered $store_ID";
$salesperson="select name,employee_ID from employee where job_title='Salesperson' and store_ID='$store_ID'";
$salesperson_result= mysql_query($salesperson, $conn);

while($row = mysql_fetch_array($salesperson_result))
  {
  echo $row['employee_ID'];
  echo "<br />";
  }
//ob_clean();

?>




