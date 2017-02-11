<?php
	$DBhost = "db415607913.db.1and1.com";
	$DBuser = "dbo415607913";
	$DBpass = "langis123";
	$DBName = "db415607913";
	mysql_connect($DBhost,$DBuser,$DBpass) or die("Unable to connect to database");
	
	// RSVP Table
	mysql_select_db($DBName) or die("Unable to select database $DBName");
	
	$sqlquery = "SELECT * FROM rsvps WHERE rsvpStatus = 1 ORDER BY rsvpId desc";

	
	echo "<div>";
	$results = mysql_query($sqlquery);
	while($row = mysql_fetch_array( $results )) {
		echo "<div>";

			echo "<div><h4>" . $row['rsvpName'] . "</h4>";
			echo "</div>"; 
			
		echo "</div>";
	}
		
	echo "</div>";
	
	
	
	echo("<br/>");
	echo("<br/>");
	
	
	$sqlquery = "SELECT * FROM rsvps WHERE rsvpStatus = 0 ORDER BY rsvpId desc";

	$addedHeader = false;
	
	$results = mysql_query($sqlquery);
	while($row = mysql_fetch_array( $results )) {
	
		if($addedHeader == false)
		{
			echo("<h2>Who's Not Coming</h2>");
			echo "<div>";
			
			$addedHeader = true;
		}
		
		echo "<div>";

				echo "<div><h4>" . $row['rsvpName'] . "</h4>";
				echo "</div>"; 
			
		echo "</div>";
	}
	
	if($addedHeader == true)
		echo "</div>";
	
	
	
	mysql_close();	
?>