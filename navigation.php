<!DOCTYPE html>
<html>
<head>
<style>
/* NAVIGATION */

body {
	padding: 0;
	margin: 0;
}

#nav {	
	width: 100%;
	list-style: none;
	margin: 0;
	padding: 0;
	text-align: center;
	
	background-color: #888;
	font-family: courier	
}

#nav li {
	display: inline;
}

#nav li a {
	display: inline-block;
	margin: 0px 20px 0px 20px;
	
	font-weight: bold;
	text-transform: uppercase;
	text-decoration: none;
	color: #333;
}

#nav li a:hover {
	color: #fff;
}

#nav img {
	margin: 0;
	padding: 0;
	padding-top: 27px;
	vertical-align: -20px;
}

#nav img:hover {
	overflow: visible;
	width: 355px;
	height: 120px;
}

#nav ul:last-of-type {
	padding-bottom: 22px;
}

/* styling still search box */

input[type=search] {
	width: 100px;
	border: 2px solid #ccc;
	border-radius: 6px;
	padding: 5px;
	margin-left: 30px;
	
	background-color: #eee;
}

#login {
	float: right;
	color: #fff;
	padding: 20px 20px 0px 0px;
}
</style>
</head>

<body>
	<div id="nav">
	<div id="login">
	<?php
		//connect to database
		if(!isset($_SESSION)) { session_start(); }
		$db = mysqli_connect("localhost", "root", "", "testdata");
	
		//display username if possible
		if (empty($_SESSION['username'])) {
		echo "<a href='login.php'>Log In</a>";
		} else { //session started
		echo "Logged in as ".$_SESSION['username'].". <a href='admin.php'>Administration</a> || <a href='logout.php'>Log Out</a>";
		}
	?>
	</div>
	<br><br>
	<ul>
		<li><a href="home.php">Home</a></li>
		<li><a href="location.php">Location</a></li>
		<li><a href="hours.php">Hours + Admission</a></li>
		<li><a href="home.php"><img src="Logos\WRMLogo2.png" width="330" height="110" alt="WRM logo"></a></li>
		<li><a href="about.php">About</a></li>
		<li><a href="locomotives.php">Locomotives</a></li>
		<li><a href="rollingstock.php">Rolling Stock</a></li>
	</ul>
	<ul>
		<li><a href="eventpublic.php">Events</a></li>
		<li><a href="displays.php">Displays</a></li>
		<li><a href="shop.php">Shop</a></li>
		<li><a href="maintenanceofway.php">Maintenance of Way</a></li>
		<li><a href="otherequipment.php">Other Equipment</a></li>
		<li><input type="search" name="search" placeholder="Search..."></li>
	</ul>
	</div>
</body>
</html>