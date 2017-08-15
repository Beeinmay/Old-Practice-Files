<?php
if (!isset($_SESSION)) {
session_start();
}

$db = mysqli_connect("localhost", "root", "", "testdata");

$eventSet = $db->query("SELECT * FROM events");

if ($eventSet->num_rows != 0) {
	while ($rows = $eventSet->fetch_assoc()) {
		$title = $rows['eventTitle'];
		
		echo "<p>$title</p>";
	}
}

?>