<!DOCTYPE html>
<html>
<head>
	<title>Practice Page 1</title>
	<link rel="stylesheet" href="CSSpractice1.css">
</head>

<div class="nav">
<ul>
	<li><a href="home.php">Home</a></li>
	<li><a href="home.php"><img src="randomlink.png" width="200" height="100" alt="WRM logo"></a></li>
	<li><input type="search" name="search" placeholder="Search..."></li>
	<!--There's a differece between placeholder and value! <li><input type="search" name="search" value="Search..."></li>-->
</ul>
</div>

<div class="wrap">
<div class="holder">
<div class="event"><p>Here's some random text.</p></div>
<div class="event"><p>Here's another event.</p></div>
</div>
</div>

<div class="wrap">
<div class="holder">
<div class="button"><a href="somelink.php">Purchase</a></div>
<div class="button"><a href="anotherlink.php">Donate</a></div>
</div>
</div>



<form method="post" action="<?php echo htmlspecialchars($_SESSION["PHP_SELF"]); ?>">
<span class="searchTwo"><input type="search" name="searchTwo" placeholder="Another search..."></span>
<input type="submit" name="search_btn" value="Search">
</form>

<div class="grid">
	<li>1</li>
	<li>2</li>
	<li>3</li>
	<li>4</li>
	<li>1</li>
	<li>2</li>
	<li>3</li>
	<li>4</li>
</div>