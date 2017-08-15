<!DOCTYPE HTML>  
<html>
<head>
	<title>Purchase Tickets</title>
	<style>
	.error {color: #FF0000;}
	textarea#styled { vertical-align: text-top; }
	</style>
</head>
<body> 

<?php include "navigation.php"; ?>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $eventErr = $deliveryErr = "";
$name = $email = $event = $delivery = "";
$safeToSend = True;

//validation section
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
	$safeToSend = False;
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
	  $safeToSend = False;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
	$safeToSend = False;
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
	  $safeToSend = False;
    }
  }
  
  if (empty($_POST["event"])) {
	 $eventErr = "Please indicate your event";
	 $safeToSend = False;
  } else {
	$event = test_input($_POST["event"]);
  }
  
  if (empty($_POST["delivery"])) {
    $deliveryErr = "No delivery method chosen";
	$safeToSend = False;
  } else {
    $delivery = test_input($_POST["delivery"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


//connect to database
if (!isset($_SESSION)) { session_start(); }

$db = mysqli_connect("localhost", "root", "", "testdata");

if (isset($_POST['purchase_btn'])) {
	$name = mysql_real_escape_string($name);
	$email = mysql_real_escape_string($email);
	$event = mysql_real_escape_string($event);
	$delivery = mysql_real_escape_string($delivery);
	
	if ($safeToSend == True) {
	$sql = "INSERT INTO testpurchase(name, email, event, delivery) VALUES('$name', '$email', '$event', '$delivery')";
	mysqli_query($db, $sql);
	}
}
?>

<h2>THIS IS A TEST PAGE !!!</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Event:
  <input type="radio" name="event" <?php if (isset($event) && $event=="trainride") echo "checked";?> value="Train Ride">Train Ride
  <input type="radio" name="event" <?php if (isset($event) && $event=="anotherride") echo "checked";?> value="Another Ride">Another Ride
  <span class="error">* <?php echo $eventErr;?></span>
  <br><br>
  Delivery (+ 5.00 CAD for mail):
  <input type="radio" name="delivery" <?php if (isset($delivery) && $delivery=="mail") echo "checked";?> value="mail">Mail
  <input type="radio" name="delivery" <?php if (isset($delivery) && $delivery=="email") echo "checked";?> value="email">Email
  <span class="error">* <?php echo $deliveryErr;?></span>
  <br><br>
  <input type="submit" name="purchase_btn" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $event;
echo "<br>";
echo $delivery;
?>

</body>
</html>