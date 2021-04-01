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
	if(!isset($_SESSION['username'])){
		header('location:http://localhost/phpCRUDsearch_REGISTERlogin_OOP/login.php');
	}elseif($_SESSION['username'] != 'admin'){
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
					<li><a href="admin.php">Admin</a></li>
					<li><a href="question.php">Questions</a></li>
				</ul>
			</nav>
		</div>
		</header>
		<div class="clearfix"></div>

<main>

	<div id="container2">
	<h1> Admin </h1>
		<form method="POST" action="admin.php">
		<?php
			$query = "SELECT * FROM product";
			$command = mysqli_query($conn,$query);
			$row = mysqli_fetch_all($command, MYSQLI_ASSOC);  ?>  <!-- mysqli_fetch_all() <- ez kell ilyenkor -->

			<table cellspacing="0" align="center" cellpadding="10" border="1" style="width:100%;background-color:brown;border-color:black">
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Brand</th>
					<th>Cost</th>
					<th>Quantity</th>
					<th>Manage</th>
				</tr>
				<?php foreach($row as $index)	{ ?>
				<tr>
					<td><?php echo $index['Id']; ?></td>
					<td><?php echo $index['Name']; ?></td>
					<td><?php echo $index['Brand']; ?></td>
					<td><?php echo $index['Cost']; ?></td>
					<td><?php echo $index['Quantity']; ?></td>
					<td><a href="admin.php?delete=<?php echo $index['Id']; ?>" style="color:orange">Delete<?php } ?></td>
				</tr>
			</table>

		<div class="rowInput , logout" style="margin-top:20px"><input type="submit" name="logout" value="Logout"></div>
		</form>
	</div>		
</main>
<?php

if(isset($_GET['delete']))
{
	$id = htmlentities(mysqli_escape_string($conn, $_GET['delete'])); 
	$query = "DELETE FROM product WHERE id=$id";
	$command= mysqli_query($conn, $query);

	if($command)
	{
		header('location:admin.php');
	}
}

require('footer.html');
?>