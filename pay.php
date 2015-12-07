<?php

include ("conn.php");

session_start();
ob_start();

$arr_paycart=$_SESSION["mycar"];

$Customer_ID=$_POST("Customer_ID");

$date=date("Y/m/d");

$salesperson=$_SESSION["sales_result"];

$get_orderID="select MAX(order_ID) from order";
$biggest_orderID=mysql_query($get_orderID, $conn);

if($biggest_orderID==null){
    mysql_query("INSERT INTO order(order_ID,salesperson,Customer_ID,date) VALUES ('1','{$salesperson}','{$Customer_ID}','{$date}')");
}
else{
    $orderID_insert=$biggest_orderID+1;
    mysql_query("INSERT INTO order(order_ID,salesperson,Customer_ID,date) VALUES ('{$orderID_insert}','{$salesperson}','{$Customer_ID}','{$date}')");   
}


$select_init_order_ID ="select order_ID from order where Customer_ID =0";
$order__init_ID=  mysql_query($select_init_order_ID,$conn);


global $total_money;
$total_money=0;

while(empty($arr_paycart))
{
    $Product_in_cart=array_pop($arr_paycart);
    
    $Product_in_cart_ID=$Product_in_cart["Product_ID"];
    $Product_in_cart_name=$Product_in_cart["name"];
    $Product_in_cart_num=$Product_in_cart["num"];
    
    $price="select price from product where Product_ID =".$Product_in_cart_ID;
    $price_paid=mysql_query($price, $conn);
    
    $product_paid=$price_paid*$Product_in_cart_num;
    $total_money=$total_money+$product_paid;
    
    $get_buyID="select MAX(buy_ID) from buy";
    $biggest_buyID=mysql_query($get_buyID, $conn);
    
    if($biggest_buyID==null){
         mysql_query("INSERT INTO buy(order_ID,buy_ID,Product_ID,price_paid,quantity) VALUES ('{$orderID_insert}','1','{$Product_in_cart_ID}','{$product_paid}','{$Product_in_cart_num}')");
    }
    
    else{
        $buyID_insert=$biggest_buyID+1;
         mysql_query("INSERT INTO buy(order_ID,buy_ID,Product_ID,price_paid,quantity) VALUES ('{$orderID_insert}','{$buyID_insert}','{$Product_in_cart_ID}','{$product_paid}','{$Product_in_cart_num}')");
    }

}

echo "Your order_ID is($orderID_insert)";
echo "The total money to pay is{$total_money}";







