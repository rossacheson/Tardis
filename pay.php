<!DOCTYPE html>
<html lang='en'>
  <head>
	<meta charset="UTF-8">
    <title>Tardis Electronics - Confirmation</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/tardis.css">
	<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="favicon/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="favicon/favicon-194x194.png" sizes="194x194">
	<link rel="icon" type="image/png" href="favicon/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="favicon/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="favicon/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="favicon/manifest.json">
	<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="apple-mobile-web-app-title" content="Tardis">
	<meta name="application-name" content="Tardis">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="favicon/mstile-144x144.png">
	<meta name="theme-color" content="#ffffff">
  </head>
  <body>
	<header>
		<img src="images/TardisBanner1.png" class ="banner" alt="Tardis Electronics"/>
		<nav>
			<ul>
			  <li><a href="index.html">Home Page</a></li>
			  <li><a href="laptops.php">Laptops</a></li>
			  <li><a href="tvs.php">TVs</a></li>
			  <li><a href="phones.php">Phones</a></li>
			  <li><a href="accessories.php">Accessories</a></li>
			  <li><a href="cart.php">Cart</a></li>
			</ul>
		</nav>
	</header>
	<section class="maincontent">
		<?php
include ("conn.php");


$customer_ID=$_POST["customer_ID"];
if(!$customer_ID)
{
	echo "<P><a href='index.html'>Back to homepage</a></p>";
		die ("Please type you ID" );

}

    $get_cusID="select *  from customer where customer_ID='$customer_ID'";
    $cus_ID=mysql_query($get_cusID, $conn);
	
	if(!$cus_ID)
	{
		  echo "<P><a href='index.html'>Back to homepage</a></p>";
			die( "We do not have this customer in our records");
		}
		
		
$transaction_insert=1;

$salesperson_ID=$_POST["salesperson_ID"];
if(!$salesperson_ID)
{
	echo "<P><a href='index.html'>Back to homepage</a></p>";
		die ("please choose a salesperson");

}


 $get_saID="select * from employee where job_title='Salesperson' and employee_ID='$salesperson_ID' ";
    $sa_ID=mysql_query($get_saID, $conn);
	if(!$sa_ID)
	{
		echo "<P><a href='index.html'>Back to homepage</a></p>";
			die( "we do not have this salesperson");
		}


$systemdate=DATE("Y/m/d");


  $get_transactionID="select max(transaction_ID) as max_transaction from transaction ";
    $transaction_ID=mysql_query($get_transactionID, $conn);
	/*$sdf=$transaction_ID+1;*/

		while($row=mysql_fetch_array($transaction_ID))
	{
		if($row["max_transaction"])
		{
				$transaction_number=$row["max_transaction"];
			$transaction_insert=$transaction_number+1;
	    }
				
	}

			
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
    
    $get_buyID="select max(buy_ID) as max_buy from buy ";
    $buy_ID=mysql_query($get_buyID, $conn);
	
	while($row=mysql_fetch_array($buy_ID))
			{
				$buy_number=$row["max_buy"];
				echo  $buy_number;
			}
			$buy_insert=$buy_number+1;
	if($total_money)
	{
    mysql_query("INSERT INTO buy(buy_ID,product_ID,price_paid,quantity) VALUES ($buy_insert,'$Product_in_cart_ID','$price_transaction','$Product_in_cart_num')");
    
    mysql_query("INSERT INTO transaction(transaction_ID, buy_ID,salesperson,customer_ID,date) VALUES ($transaction_insert,$buy_insert,'$salesperson_ID','$customer_ID','$systemdate')");
	}
}

session_destroy();
ob_clean();
if($total_money==0)
{
	echo "You did have any products in your cart";
	echo "<P><a href='index.html'>Back to homepage</a></p>";
}
if($total_money!=0)
{
	echo "The total money to pay is {$total_money} dollars";
    echo "<P><a href='index.html'>Back to homepage</a></p>";
}

?>

	</section>
  </body>
</html>