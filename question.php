<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<meta charset="utf8">
	<meta name="Description" content="Here you can register for the website";>
	<meta name="Keywords" content="CRUD, Register, Website, Project">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php 
	include('database.php');
	include('logout.php'); 
?>
<body>
	
		<header>
		<div class="container">	
			<h2>AT LOGO</h2>
			<nav>
				<ul>
					<li><a href="register.php">Register</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="question.php">Questions</a></li>
				</ul>
			</nav>
		</div>
		</header>
		<div class="clearfix"></div>
<main>
	<div id="container2">
				<form method="POST" action="question.php">															 
				<h1>If you have any questions</h1>
				<?php include('comment.php'); ?>
				<div><input type="text" name="commentbox" autocomplete="off"></div>
				<div><input type="submit" name="comment" value="Comment"></div></div>
				</form>
		</div>		
</main>
<?php
	require('footer.html');
?>