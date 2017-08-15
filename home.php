<!DOCTYPE html>

<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="CSShome.css"> 
</head>

<body>
	<?php include "navigation.php"; ?>
	
	<div class="wrap">
		
	<div class="holder">
		<div class="event">
			<img src="#wow" width="100" height="100" alt="event">
			<h6>Event Name</h6>
			<p>Description Description Description Description Description Description Description Description Description Description </p>
			<p>13:00 - 18:00</p>
			<p>May 31, 2017 </p>
		</div>  
		<div class="event">
			<img src="#wow" width="100" height="100" alt="event">
			<h6>Event Name</h6>
			<p>Description Description Description Description Description Description Description Description Description Description </p>
			<p>13:00 - 18:00</p>
			<p>May 31, 2017 </p>
		</div>
		<div class="event">
			<img src="#wow" width="100" height="100" alt="event">
			<h6>Event Name</h6>
			<p>Description Description Description Description Description Description Description Description Description Description </p>
			<p>13:00 - 18:00</p>
			<p>May 31, 2017 </p>
		</div>   
		<div class="event image">
			<table>
				<tr>
					<td><img src="#wow" width="150" height="150" alt="event"></td>
				</tr>
				<tr>
					<td><img src="#wow" width="150" height="150" alt="event"></td>
				</tr>
			</table>
		</div>   
	</div>
	
	<div class="holder morebotspace">
		<div class="button">
			<a href="eventsgrid.php">EVENTS</a>
		</div>
		<div class="button">
			<a href="tickets.php">TICKETS</a>
		</div>
		<div class="button">
			<a href="register.php">REGISTER</a>
		</div>
		<div class="plan">
			<a href="plan.php">PLAN YOUR VISIT</a>
		</div>			
	</div>
	
	</div>
	<!-- to overwrite padding and margin values in navigation.php, add new style after:
	<style>
	body { padding: 500px; }
	</style>
	-->
	
</body>
</html>