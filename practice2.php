<!DOCTYPE html> 
<html>
<head>
	<title>Another ticket test page.</title>
</head>

<body>
	<?php
	$nameErr = $addressErr = $emailErr = $numOfTickErr = "";
	$name = $address = $email = $numOfTick = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		if (empty($_POST["name"])) {
			$nameErr = "Name is required";
		} else {
			$name = test_input($_POST["name"]);
			//do not confuse $_POST["name"] with $name --> $name is still blank and is being defined here!
			if (!preg_match("/^[a-zA-Z]*$/", $name)) {
				$nameErr = "only letters and white space allowed";
		}
		}
		
	
		if (empty($_POST["email"])) {
			$emailErr = "email required";
		} else {
			$email = test_input($_POST["email"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
			}
		}
			//if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		
		if (empty($_POST["numOfTick"])) {
			$numOfTickErr = "please indicate number of tickets"; 
			} else {
			$numOfTick = test_input($_POST["numOfTick"]);
		}
	}
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>

</body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
Name: <input type="text" name="name" value="<?php echo $name; ?>">
<span class="error">*<?php echo $nameErr;?></span>
<br><br>
Email: <input type="text" name="email" value="">
<span class="error">*<?php echo $emailErr;?></span>
<br><br>
Number of Tickets:
<input type="number" name="numOfTick" min="1" max="5">
<span class="error">*<?php echo $numOfTickErr;?></span>
<br><br>
<input type="submit" name="orderForm" value="Purchase tickets">

</form>
</body>
</html>

<?php
	echo $name;
	echo "<br><br>";
	echo $email;
	echo "<br>";
	echo $numOfTick;
?>