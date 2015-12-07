<?php
include ("conn.php");

$store_show="select Store_ID from store";
$store_show_result=mysql_query($store_show, $conn);

echo "Store ID:+{$store_show_result}";
