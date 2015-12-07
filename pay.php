<?php

include ("conn.php");

session_start();
ob_start();

$arr_paycart=$_SESSION["mycar"];

$Customer_ID=$_POST("Customer_ID");

$date=date("Y/m/d");

$salesperson=$_SESSION["sales_result"];

mysql_query("INSERT INTO order(order_ID,salesperson,Customer_ID,date) VALUES ('','{$Store_id}','{$date}')");

mysql_query("UPDATE order SET order_ID=order_ID+1 WHERE Customer_ID =".$Customer_ID);//assign an orderID

$select_init_order_ID ="select order_ID from order where Customer_ID =0";//suppose there is an initial record in table "order"
$order__init_ID=  mysql_query($select_init_order_ID,$conn);


// I read Ziyi's buy.php and I think if the session element "mycar" is an array which stores records of different Products?
//And the $arr[$Product_ID] is the arrat that stores PID, name,numbers of a certain product?
// So is is this an array that stores array inside? 

global $total_money;//use global type to make the change of total_money not be restricted inside the "while"
$total_money=0;

while(empty($arr_paycart))
{
    $Product_in_cart=array_pop($arr_paycart);//return a row of a certian product and delete it from the array
    
    $Product_in_cart_ID=$Product_in_cart["Product_ID"];
    $Product_in_cart_name=$Product_in_cart["name"];
    $Product_in_cart_num=$Product_in_cart["num"];
    
    $price="select price from product where Product_ID =".$Product_in_cart_ID;
    $price_paid=mysql_query($price, $conn);
    
    $product_paid=$price_paid*$Product_in_cart_num;
    $total_money=$total_money+$product_paid;//calculate the total money
    
    mysql_query("UPDATE buy SET buy_ID=buy_ID+1 WHERE Product_ID =".$Product_id);//initialize the buy_ID as 0 then add 1 each time

    //do the insert after I solve the problem of buy_ID,order_ID

}

echo "The total money to pay is{$total_money}";








