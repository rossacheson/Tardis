
<?php

$conn = @mysql_connect("localhost","2710DM","2710");
if ($conn==false)
{
echo "failed";
}

mysql_select_db("tardis",$conn);

?>