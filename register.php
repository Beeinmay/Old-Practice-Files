<?php
	if (!isset($_SESSION)) {
	session_start();
	}
	
	//connect to database
	$db = mysqli_connect("localhost", "root", "", "testdata");
	
	if (isset($_POST['register_btn'])) {
		$username = mysql_real_escape_string($_POST['username']);
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);
		$password2 = mysql_real_escape_string($_POST['password2']);
		
		if ($password == $password2) {
			// create user
			$password = md5($password); //hash password before storing for security purposes
			$sql = "INSERT INTO user(username, email, password) VALUES('$username', '$email', '$password')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			header("location: login.php"); //redirect to home page
		} else {
			//failed
			$_SESSION['message'] = "The two passwords do not match";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register, login and logout user php mysql</title>
	<link rel="stylesheet" href="CSSregister.css">
</head>
<body>
<?php include "navigation.php"; ?>

<form method="post" action="register.php">
	<table>
		<tr>
			<td>Username:</td>
			<td><input type="text" name="username" class="textInput"></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="email" name="email" class="textInput"></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password" class="textInput"></td>
		</tr>
		<tr>
			<td>Password again:</td>
			<td><input type="password" name="password2" class="textInput"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="register_btn" value="Register"></td>
		</tr>
	</table>
</form>
		<p><a href="login.php">Already a member? Log in!</a></p>
		<p class="note">Note: Test project only needs employee-exclusive login. Registration page shouldn't actually exist. Data can be defined by accessing http://localhost/phpmyadmin/ but must exclude hashing from login page.</p>
</body>
</html>