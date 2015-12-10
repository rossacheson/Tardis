<!DOCTYPE html>
<html lang='en'>
  <head>
	<meta charset="UTF-8">
    <title>Tardis Electronics - Add Family</title>
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
		<h2>Family Customer Addition</h2>
		<?php
		include ("../conn.php");

		//ob_start();

	$customer_ID=$_POST["customer_ID"]; 
		$name=$_POST["name"];
		$marriage_status=$_POST["marriage_status"];
		$gender=$_POST["gender"];
		if($gender !='female' && $gender!='male')
		{
			die( "you can only type \"female\" or \"male\"");
		}
		$age_str=$_POST["age"];
		if($age_str >=120)
		{
			die( "Hello, grandmom, we'll need proof of your age.");
		}
		$income_str=$_POST["income"];

		$age=(int)$age_str;
		$income=(float)$income_str;

		$customer_check="select * from customer where customer_ID ='$customer_ID'";
		$result=mysql_query($customer_check, $conn);

		if(mysql_num_rows($result) != 0){
			echo "A customer with the username $customer_ID already exists!!";
		}
		else{
			mysql_query("INSERT INTO customer(customer_ID,name) VALUES ('$customer_ID','$name')");
			mysql_query("INSERT INTO family_customer(customer_ID,marriage_status,gender,age,income) VALUES ('$customer_ID','$marriage_status','$gender','$age','$income')");
			echo "$customer_ID added as a new family customer";
		}

		//ob_clean();
		mysql_close($conn); 
		?>
	</section>
  </body>
</html>
