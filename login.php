<?php
	session_start();
	
	//connect to database
	$db = mysqli_connect("localhost", "root", "", "testdata");
	
	if (isset($_POST['login_btn'])) {
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);

		$password = md5($password); //remember we hashed password before storing last time
		$sql = "SELECT * FROM user WHERE username='$username' AND password= '$password'"; //!!!
		
		$result = mysqli_query($db, $sql);
		
		if (mysqli_num_rows($result) == 1) {
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			header("location: home.php"); //redirect to home page
		} else {
			$_SESSION['message'] = "Username/password combination incorrect";
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

<form method="post" action="login.php">
	<table>
		<tr>
			<td>Username:</td>
			<td><input type="text" name="username" class="textInput"></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password" class="textInput"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="login_btn" value="Login"></td>
		</tr>
	</table>
</form>
		
		<p>
		
		<?php //alt solution for below --> if(session_id() == '')
		if (empty($_SESSION['username'])) { 
		echo "<a href='register.php'>Not a member?</a>";
		} else { //session started
		echo "You are logged in. Welcome, ";
		echo $_SESSION['username'];
		echo "!";
		}
		?>
		</p>
</body>
</html>