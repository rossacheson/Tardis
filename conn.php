
<?php

$conn = @mysql_connect("localhost","rdadesig_2710","-5*^BJ*kfG%B");
if ($conn==false)
{
echo "failed to connect to MySQL";
}

mysql_select_db("rdadesig_tardis",$conn);

?>