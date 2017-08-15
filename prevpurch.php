<style>
h1 { text-align: center; }
table { margin: auto; }
td { padding: 5px 15px 5px 15px; }
</style>

<h1>Previous Purchases</h1>
<?php
if (!isset($_SESSION)) { session_start(); }

//connect to the database
$db = mysqli_connect("localhost", "root", "", "testdata");

//query the databse
$resultSet = $db->query("SELECT * FROM testpurchase"); //!!!

//count the returned rows
if($resultSet->num_rows != 0) {
	
	echo "<table>";
	echo "<tr><td>Name</td>
		<td>Email</td>
		<td>Event</td>
		<td>Delivery</td></tr>";
		
	//turn the results into an array	
	while($rows = $resultSet->fetch_assoc()) { //!!!
		$name = $rows['name'];
		$email = $rows['email'];
		$event = $rows['event'];
		$delivery = $rows['delivery'];
		
		echo "<tr>";
		echo "<td>$name</td>";
		echo "<td>$email</td>";
		echo "<td>$event</td>";
		echo "<td>$delivery</td>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	echo "No results.";
}
?>