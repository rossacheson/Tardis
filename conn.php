
<?php

$conn = @mysql_connect("localhost","rdadesig_2710","-5*^BJ*kfG%B");
if ($conn==false)
{
echo "failed";
}

mysql_select_db("rdadesig_tardis",$conn);

?>