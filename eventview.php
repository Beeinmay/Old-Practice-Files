<?php
if (!isset($_SESSION)) {
	session_start();
}

$db = mysqli_connect("localhost", "root", "", "testdata");

//query database
$eventSet = $db->query("SELECT * FROM events");

//count returned rows
	if($eventSet->num_rows != 0) { //if there is data in 'events' table

	
		echo "<table>";
		while($rows = $eventSet->fetch_assoc()) {
			
			$title = $rows['eventTitle'];
			$desc = $rows['eventDesc'];
			$date = $rows['eventDate'];
			$time = $rows['eventTime'];
			
			//displaying results
			echo "<tr>";
			echo "<p>Title: $title</p>";
			echo "<p>Description: $desc</p>";
			echo "<p>Date: $date</p>";
			echo "<p>Time: $time</p>";
			echo "- - -<br>";
		}
		echo "</table>";
	}
	
	else {
		echo "No results.";
	}
?>