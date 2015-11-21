<?php
	$select = $_POST["select"];
	$from = $_POST["from"];
	$where = $_POST["where"];

	if ($select == "" || $from == "")
	{
		die('Please provide input in select and from fields.');
	}

	$mysqli = new mysqli("localhost", "demo", "password", "demotue");
	if ($mysqli->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	

	$queryString = "select $select from $from";
	if ($where != "") {
		$queryString .= " where $where";
	}
	
	/* Select queries return a resultset */
	if ($result = $mysqli->query($queryString)) {
	    
		echo "<table border='1px' style='border-collapse: collapse;'>";

	    while ($row = $result->fetch_assoc()) {
	    	
			echo "<tr>";
           foreach($row as $key=>$value)
			{			    
			    echo "<td>$value</td>";			    
        	}
        	echo "</tr>";
        }
        echo "</table>";


	    /* free result set */
	    $result->close();
	}
?>