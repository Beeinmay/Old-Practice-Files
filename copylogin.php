<?php
if (!isset($_SESSION)) { session_start(); }
$db = mysqli_connect("localhost", "root", "", "testdata");

//login
if (isset($_POST['login_btn'])) {
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	
	$password = md5($password);
	
	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	
	$result = mysqli_query($db, $sql);
	
	if (mysqli_num_rows($result) == 1) {
		//you logged in.
		//define $_SESSION['username'] and use that to create effect in nav 		
	} else {
		$_SESSION['message'] = "username/password combination incorrect";
	}
}

?>

//registration
<?php
	//session started

	if (isset($_POST['register_btn'])) {
		$username = mysql_real_escape_string($_POST['username']);
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);
		$password2 = mysql_real_escape_string($_POST['password2']);
		
	//registering
	if ($password == $password2) {
		$password = md5($password);
		$sql = "INSERT INTO user(name, email, password) VALUES('$username', '$email', '$password')";
		mysqli_query($db, $sql);
		//can have header here --> header("location: home.php");
	} else {
		//message can be here
	}
}
?>

//logout
<?php
	session_start();
	session_destroy();
	unset($_SESSION['username']);
	header("location: home.php");
?>

	
//sharing information
<?php
	$eventSet = $db->query("SELECT * FROM events");
	
	if ($eventSet->num_rows != 0) {
		while ($rows = $eventSet->fetch_assoc()) {
			$title = $rows['title'];
			
			echo $title;
		}
	} else {
	}
?>

//text area in form
<textarea name="desc" rows="4" cols="5">values here</textarea>

//to start form validation
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
}
?>

//to start sending something to database from form
<?php
if (isset($_POST['nameOfForm'])) {
}

?>


//pagination is similar to a mini nav bar on a page

//not sure what to do for search field... maybe a search form that returns something like:
<?php
	$eventSet = $db->query("SELECT * FROM events WHERE eventTitle='$title'");
	
	if ($eventSet->num_rows != 0) {
		while ($rows = $eventSet->fetch_assoc()) {
			$title = $rows['eventTitle'];
			echo $title;
		}
	}
?>

//updating information
<?php
$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
$sql = "UPDATE tableFromDataBase SET item='definition' WHERE id=4";
?>

