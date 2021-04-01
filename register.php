<?php
	require('header.html');
	include('database.php');
	include('insertUser.php');
?>		<main>
		<div id="container2">
			<h1>Register</h1>
			<form method="POST" action="register.php">
				<div class="rowInput"><input type="text" name="firstname" placeholder="First Name*" autocomplete="off" ></div>
				<div class="rowInput"><input type="text" name="lastname" placeholder="Last Name*" autocomplete="off" ></div>
				<div class="rowInput"><input type="email" name="email" placeholder="Email*" autocomplete="off" ></div>
				<div class="rowInput"><input type="text" name="username" placeholder="Username*" autocomplete="off"></div>
				<div class="rowInput"><input type="password" name="password" placeholder="Password*" autocomplete="off" ></div>
				<div class="rowInput"><input type="password" name="password2" placeholder="Confirm Password*" autocomplete="off" ></div>
				<div class="rowInput"><b>Male&nbsp</b><input type="radio" name="gender" value="Male"><b>Female&nbsp</b><input type="radio" name="gender" value="Female">
				
				<div class="rowInput" style="text-align:center;"><span style="font-size:25px"><?php 
				echo $errors['fill']; echo $errors['gender']; echo $errors['password']; echo $errors['firstname']; echo $success; 
				?></span></div>
				<div id="submitButton"><input type="submit" name="submit" value="Submit"></div>
			</form>
		</div>
		</main>
<?php

	require('footer.html');
?>