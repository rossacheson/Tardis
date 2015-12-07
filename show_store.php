<?php
include ("conn.php");

$store_show="select Store_ID from store";
$store_show_result=mysql_query($store_show, $conn);

while($row = mysql_fetch_array($store_show_result))
  {
  echo $row['store_ID'];
  echo "<br />";
  }
