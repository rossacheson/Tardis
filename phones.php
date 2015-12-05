<!DOCTYPE html>
<html lang='en'>
  <head>
	<meta charset="UTF-8">
    <title>Tardis Electronics</title>
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
		<div class="product_list">
			<?php
			include("conn.php");

			$sql="select * from product where product_kind='phone'";
			$result=mysql_query($sql, $conn);

			while($row=mysql_fetch_array($result))
			{
			?>
			<table width="343" height="152" border="1"style="float:left">
			  <tr>
			   <td width="203"height="35"><?php echo  $row["name"] ?></td>
			  </tr>
			  <tr>
			   <td height="28" align="center"><span style="color:red">$</span><?php echo "<font color=\"red\">" . $row["price"]  ?> <span style="color:white">$sfsdfsfgsdgfdg</span><a target="_blank" a href="buy.php?id=<?php echo $row["Product_ID"]?>&name=<?php
			echo $row["name"]?>">
					<img src="cart.png" height="39px" width="56px"/>
				</a>
			  </td>
			  </tr>

			  </table>

			<?php
			}
			?>
		</div>
	</section>
  </body>
</html>