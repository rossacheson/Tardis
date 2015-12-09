<!DOCTYPE html>
<html lang='en'>
  <head>
	<meta charset="UTF-8">
    <title>Tardis Electronics - Inventory</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/tardis.css">
	<link rel="apple-touch-icon" sizes="57x57" href="../favicon/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="../favicon/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../favicon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../favicon/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../favicon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="../favicon/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="../favicon/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="../favicon/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="../favicon/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="../favicon/favicon-194x194.png" sizes="194x194">
	<link rel="icon" type="image/png" href="../favicon/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="../favicon/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="../favicon/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="../favicon/manifest.json">
	<link rel="mask-icon" href="../favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="apple-mobile-web-app-title" content="Tardis">
	<meta name="application-name" content="Tardis">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="favicon/mstile-144x144.png">
	<meta name="theme-color" content="#ffffff">
  </head>
  <body>
	<header>
		<img src="../images/TardisBanner1.png" class ="banner" alt="Tardis Electronics"/>
		<nav>
			<ul>
			  <li><a href="../index.html">Customer Site</a></li>
			  <li><a href="add.html">Inventory</a></li>
			  <li><a href="business_customer.html">Add Business</a></li>
			  <li><a href="family_customer.html">Add Family</a></li>
			</ul>
		</nav>
	</header>
	<section class="maincontent">
		<h2>Result</h2>
		<?php
		include ("../conn.php");

	$product_ID=$_POST["product_ID"]; 
		$store_ID=$_POST["store_ID"];
		$add_amount=$_POST["add_amount"];

		$product_check="select * from inventory_amount where product_ID ='$product_ID' AND store_ID='$store_ID'";
		$result=mysql_query($product_check, $conn);

		if($result+$add_amount>0)
		{
			if($result!=null)
			{
			mysql_query("UPDATE inventory_amount SET inventory_amt=inventory_amt+$add_amount WHERE product_ID ='$product_ID' AND store_ID='$store_ID'");
			echo "<p>Added $add_amount units of $product_ID to store $store_ID</p>";
		}
		}
		if($result+$add_amount<0)
		{
			echo "Sorry, we don't have enough products";
		}
		
		

		else{
			mysql_query("INSERT INTO inventory_amount(product_ID,store_ID,inventory_amt) VALUES ('{$product_ID}','{$store_ID}','{$add_amount}')");

		}
			
		mysql_close($conn);    
		?>
	</section>
  </body>
</html>

