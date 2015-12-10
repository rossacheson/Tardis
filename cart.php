<?php
session_start();
$arr=@$_SESSION["mycart"];
?>

<!DOCTYPE html>
<html lang='en'>
  <head>
	<meta charset="UTF-8">
    <title>Tardis Electronics - Cart</title>
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
		<h2>Cart</h2>
		<table width="600" height="37" border="1" class = "col-xs-12 col-lg-9">
			<tr>
				<td width="158">Name</td>
				<td width="154">Number</td>
				<td width="177">Delete</td>
			</tr>
			<?php
			foreach($arr as $a)
			{
			?>
			<tr>
				<td width="158"><?php echo $a["name"]?></td>
				<td width="154"><?php echo $a["num"]?>
				<form name="form1" enctype="multipart/form-data" method="post" action="modify.php?id=<?php echo @$a[product_ID]?>">
					 <label>
						<select name="select1">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
						</select>
					</label>
					<label>
						 <select name="select2">
								 <option value="0">0</option>
								 <option value="1">1</option>
								 <option value="2">2</option>
								 <option value="3">3</option>
								 <option value="4">4</option>
								 <option value="5">5</option>
								 <option value="6">6</option>
								 <option value="7">7</option>
								 <option value="8">8</option>
								 <option value="9">9</option>
						  </select>
					 </label>
					 <label>
						<select name="select3">
								 <option value="1">1</option>
								 <option value="2">2</option>
								 <option value="3">3</option>
								 <option value="4">4</option>
								 <option value="5">5</option>
								 <option value="6">6</option>
								 <option value="7">7</option>
								 <option value="8">8</option>
								 <option value="9">9</option>
								 <option value="0">0</option>
						</select>
					</label>
					<label>
						<input type="submit" name="Submit" value="modify">
					</label>
				</form>
				</td>
				<td width="177"><a href="delete.php?id=<?php echo @$a[product_ID]?>">delete</a></td>
			</tr>
			<?php
			}
			?>
			</table>
			</form>
			<br>
			<p><a href="pay.html"><img src="images/tardis_checkout.png" class ="checkout_button" alt="Checkout"/></a></p>
	</section>
  </body>
</html>

