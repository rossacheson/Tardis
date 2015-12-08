<?php
include ("conn.php");
echo "sfe";

$customer_ID=$_POST["customer_ID"];
echo $customer_ID;
$salesperson_ID=$_POST["salesperson_ID"];
$date=date("Y/m/d");
echo $salesperson_ID;
echo $date;



  $get_transactionID="select max(transaction_ID) as max_transaction from transaction ";
    $transaction_ID=mysql_query($get_transactionID, $conn);
	/*$sdf=$transaction_ID+1;*/
	while($row=mysql_fetch_array($transaction_ID))
			{
				$transaction_number=$row["max_transaction"];
    echo  $transaction_number;
			}
			$transaction_insert=$transaction_number+1;
			
			
			
			
			mysql_query("INSERT INTO transaction(transaction_ID,salesperson,customer_ID,date) VALUES ($transaction_insert,'$salesperson_ID','$customer_ID','$date')");

  $get_buyID="select max(buy_ID) as max_buy from buy ";
    $buy_ID=mysql_query($get_buyID, $conn);
	/*$sdf=$transaction_ID+1;*/
	while($row=mysql_fetch_array($buy_ID))
			{
				$buy_number=$row["max_buy"];
    echo  $buy_number;
			}
			$buy_insert=$buy_number+1;
			
			
			
			
			
session_start();
ob_start();
$arr=$_SESSION["mycart"];


$total_money=0;

foreach ($arr as $a) {
    $Product_in_cart_ID=$a["product_ID"];
    $Product_in_cart_name=$a["name"];
    $Product_in_cart_num=$a["num"];

    $price="select price from product where product_ID ='$Product_in_cart_ID'";
	
    $price_paid=mysql_query($price, $conn);
  while($row=mysql_fetch_array($price_paid))
			{
				$price_transaction=$row["price"];

			}
  
  
  
    
    $product_paid=$price_transaction*$Product_in_cart_num;
    $total_money=$total_money+$product_paid;
    
   
    
    mysql_query("INSERT INTO buy(transaction_ID,buy_ID,product_ID,price_paid,quantity) VALUES ($transaction_insert,$buy_insert,'{$Product_in_cart_ID}','{$product_paid}','{$Product_in_cart_num}')");
    
}


session_destroy();
ob_clean();

echo "The total money to pay is {$total_money}";
?>








