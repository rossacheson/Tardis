<?php
include ("conn.php");

$store_show="select store_ID from store";
$store_show_result=mysql_query($store_show, $conn);

while($row = mysql_fetch_array($store_show_result))
  {
  echo "<tr>";
  echo $row['store_ID'];
  echo "</tr>";
  }
  
