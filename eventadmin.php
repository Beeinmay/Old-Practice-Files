<!DOCTYPE html>
<html>
<head>
	<title>Event Creation</title>
	<link rel="stylesheet" href="CSSadmin.css">
</head>

<body>
<?php include "navigation.php"; ?>

<?php
	//connecting to database
	if (!isset($_SESSION)) { session_start(); }
	$db = mysqli_connect("localhost", "root", "", "testdata");
	

	$titleErr = $descErr = $dateErr = $timeErr = "";
	$title = $desc = $date = $time = "";
	$validatedEvent = True;
	
	//validation section
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		if (empty($_POST["title"])) { //is it empty?
			$titleErr = "Title is required";
			$validatedEvent = False;
		} else { // if it isn't, test it
			$title = test_input($_POST["title"]);
			
			$titleReq = "SELECT * FROM events WHERE eventTitle='$title'";
			$resultOfSearch = mysqli_query($db, $titleReq); 
			if (mysqli_num_rows($resultOfSearch) >= 1) {
				$titleErr = "This title is already taken.";
				$validatedEvent = False;
			}
		}
	
		if (empty($_POST["desc"])) {
			$descErr = "Description is required";
			$validatedEvent = False;
		} else {
			$desc = test_input($_POST["desc"]);
		}
		
		//try validating date and time if you have time
		//if you have IE 13+, use form input types "date" and "time"
		if (empty($_POST["date"])) {
			$dateErr = "Date is required";
			$validatedEvent = False; 
		} else {
			$date = test_input($_POST["date"]);
		}
		
		if (empty($_POST["time"])) {
			$timeErr = "Time is required";
			$validatedEvent = False;
		} else {
			$time = test_input($_POST["time"]);
		}
	}
	
	//separate testing function		
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	
	//already connected to database at beginning of this php section
	
	$db = mysqli_connect("localhost", "root", "", "testdata");
	
	if (isset($_POST['addEvent'])) {
		//'grooming' strings for mysql-delivery
		$title = mysql_real_escape_string($title);
		$desc = mysql_real_escape_string($desc);
		$date = mysql_real_escape_string($date);
		$time = mysql_real_escape_string($time);
		
		if ($validatedEvent == True) {
		//'command' to give to mysqli_query:
		$sql = "INSERT INTO events(eventTitle, eventDesc, eventDate, eventTime) VALUES ('$title', '$desc', '$date', '$time')"; 
		mysqli_query($db, $sql);
		}
	}
?>
	
<h1>The Form</h1>
<p><span class="error">* required field.</span></p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	Title of Event: 
	<input type="text" name="title" value="<?php echo $title;?>">
	<span class="error">* <?php echo $titleErr;?></span>
	<br><br>
	Description of Event:
	<textarea name="desc" rows="3" cols="25"><?php echo $desc;?></textarea>
	<span class="error">* <?php echo $descErr;?></span>
	<br><br>
	Date:
	<input type="date" name="date" value="<?php echo $date;?>">
	<span class="error">* <?php echo $dateErr;?></span>
	<br><br>
	Time (hh:mm):
	<input type="time" name="time" value="<?php echo $time;?>">
	<span class="error">* <?php echo $timeErr;?></span>
	<br><br>
	<input type="submit" name="addEvent" value="Add Event">
</form>

<?php
	echo "<h2>Event You Submitted:</h2>";
	echo "$title<br>$desc<br>$date<br>$time";
	
	if ($validatedEvent == True) {
		echo "<br><br>This is safe to send to the database.";
	}

?>

<h3>Current Events</h3>
<?php include "eventview.php"; ?>

</body>
</html>