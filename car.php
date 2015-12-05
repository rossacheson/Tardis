<?php
session_start();
$arr=$_SESSION["mycar"];
?>

<table width="600" height="37" border="1">

<tr>
<td width="96">Product_ID</td>
<td width="158">name</td>
<td width="154">number</td>
<td width="177">delete</td>

</tr>
<?php
foreach($arr as $a)
{
?>
<tr>
<td width="96"><?php echo @$a["Product_ID"]?></td>
<td width="158"><?php echo $a["name"]?></td>
<td width="154"><?php echo $a["num"]?>
<form name="form1" enctype="multipart/form-data" method="post" action="modify.php?id=<?php echo @$a[Product_ID]?>">
<label>
<select name="select">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
</label>
<label>
<input type="submit" name="Submit" value="modify">
</label>
</form>
</td>


<td width="177"><a href="delete.php?id=<?php echo @$a[Product_ID]?>">delete</a></td>





</tr>
<?php
}
?>
</table>
</form>
<a href="elec.php">

