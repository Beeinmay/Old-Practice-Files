<!DOCTYPE HTML>  
<html><head><style>
.error {color: #FF0000;}
</style></head>
 
<body>   
<?php
// define variables and set to empty values
$nameErr = $emailErr = $deliveryErr = "";
$name = $email = $comment = $delivery = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
  
  if (empty($_POST["delivery"])) {
    $deliveryErr = "";
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
?>
 
<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
   <br><br>
  Delivery (+ 5.00 CAD for mail):
  <input type="radio" name="delivery" <?php if (isset($delivery) && $delivery=="mail") echo "checked";?> value="mail">Mail
  <input type="radio" name="delivery" <?php if (isset($delivery) && $delivery=="email") echo "checked";?> value="email">Email
  <span class="error">* <?php echo $deliveryErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
 
<?php
echo "<h2>Your Input:</h2>";
echo "Your name is $name";
echo "<br>";
echo $email;
echo "<br>";
echo $comment;
?>
</body></html>
