<?php
	if (!isset($_SESSION)) {
		session_start();
	}
	$db = mysqli_connect("localhost", "root", "", "newtest");
	
	$message = "";
	
	if (isset($_POST['register'])) {
		$username = mysql_real_escape_string($_POST['username']);
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);
		$password2 = mysql_real_escape_string($_POST['password2']);
	}
	
	if ($password == $password2) {
		$password = md5($password);
		$sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
		mysqli_query($db, $sql);
		$message = "Welcome $username!";
		$_SESSION['username'] = $username;
		header("location: home.php");
	} else {
		$message = "Invalid passwords.";
	}
	
?>

<!DOCTYPE html>
<html>
<head>
</head>

<body>
	<?php include "navigation.php"; ?>

	<form method="post" action="newregister.php">
		<table>
		<tr>
			<td>Username:</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="email" name="email"></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td>Password Confirm:</td>
			<td><input type="password" name="password2"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="register" value="Register"></td>
		</tr>
		<tr>
			<p><?php echo $message; ?></p>
		</tr>
		</table>
		
	</form>

</body>


</html>