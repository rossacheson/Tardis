<!DOCTYPE html>
<html lang='en'>
  <head>
	<meta charset="UTF-8">
    <title>Tardis Electronics - Add Business</title>
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
			  <li><a href="../index.html">Main Site</a></li>
			  <li><a href="add.html">Add Inventory</a></li>
			  <li><a href="business_customer.html">Add Business</a></li>
			  <li><a href="family_customer.html">Add Family</a></li>
			</ul>
		</nav>
	</header>
	<section class="maincontent">
		<h2>Address Addition</h2>
		<?php
		include ("../conn.php");
		//ob_start();

		$customer_ID=$_POST["customer_ID"]; 
		$street=$_POST["street"];
		$city=$_POST["city"];
		$state=$_POST["state"];
		$zipcode=$_POST["zipcode"];

		$customer_check="select * from customer_address where customer_ID ='$customer_ID' and street='$street' and zipcode='$zipcode'";
		$result=mysql_query($customer_check, $conn);

		if(mysql_num_rows($result) != 0){
			echo "This customer address already exists!";
		}
		else{
			mysql_query("INSERT INTO customer_address(customer_ID,street,city,state,zipcode) VALUES ('$customer_ID','$street','$city','$state','$zipcode')");
			echo "Address added to database for $customer_ID";
		}

		//ob_clean();
		mysql_close($conn);
		?>
	</section>
  </body>
</html>
