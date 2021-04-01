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
	include('Select_Delete_Update_Insert_Search.php');
	if(!isset($_SESSION['username'])){
		header('location:http://localhost/phpCRUDsearch_REGISTERlogin_OOP/login.php');
	}elseif($_SESSION['username'] == 'admin'){
		header('location:http://localhost/phpCRUDsearch_REGISTERlogin_OOP/login.php');
	}else{
	

	}
?>
<body>
	
		<header>
		<div class="container">	
			<h2>AT LOGO</h2>
			<nav>
				<ul>
					<li><a href="register.php">Register</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="user.php">User</a></li>
					<li><a href="question.php">Questions</a></li>
				</ul>
			</nav>
		</div>
		</header>
		<div class="clearfix"></div>
<main>
	<div id="container2">
		<h1><?php if(isset($_SESSION['username'])){ echo $_SESSION['username']; }?></h1>
				<form method="POST" action="user.php">															 
					<h1>Listázás</h1>
				<p style="font-size:18px; font-weight:bold;"></p>
				<div><input type="text" name="search" placeholder="Search.." style="text-align:center;" autocomplete="off"></div>
				<div style="text-align:center;"><input type="submit" name="searchButton" value="Search" style="margin-bottom:30px;"></div>
				<div><input type="text" name="id" placeholder="Id" value="<?php echo $id; ?>" autocomplete="off"></div>
				<div><input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>" autocomplete="off"></div>
				<div><input type="text" name="brand" placeholder="Brand" value="<?php echo $brand; ?>" autocomplete="off"></div>
				<div><input type="text" name="cost" placeholder="Cost" value="<?php echo $cost; ?>" autocomplete="off"></div>
				<div><input type="text" name="quantity" placeholder="Quantity" value="<?php echo $quantity; ?>" autocomplete="off"></div>
				<div style="text-align:center;font-size:30px; margin:20px"><p id="error"> <?php echo $errorCRUD['first']; echo $errorCRUD['second']; echo $errorCRUD['third']; echo $success; echo $errorCRUD['id']; echo $errorCRUD['search']; echo $errorCRUD['search2'];?></p></div>
				<div style="margin-left:200px"><input type="submit" name="select" value="Select">
				<input type="submit" name="delete" value="Delete"> 
				<input type="submit" name="update" value="Update">
				<input type="submit" name="insert" value="Create"></div>
					<div class="rowInput , logout"><input type="submit" name="logout" value="Logout"></div>
				</form>
		</div>		
</main>
<?php
	require('footer.html');
?>