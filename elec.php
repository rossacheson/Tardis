

<?php
include("conn.php");

$sql="select * from product";
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