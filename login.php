<?php
	require('header.html');
	include('database.php');
	include('selectUser.php');
?>	
<main>
	<div id="container2">
		<h1>Login</h1>
			<form method="POST" action="login.php">
				<div class="rowInput"><input type="text" name="username" placeholder="Username" value="<?php echo $username ?>" autocomplete="off"></div>

				<div class="rowInput"><input type="password" name="password" placeholder="Password" value="<?php echo $password ?>" autocomplete="off"></div>
				
				<div class="rowInput" style="text-align:center; margin:20px 0px">
					<label style="font-size:30px; color:black;"><?php echo $errorS['first']; echo $errorS['second']; ?></label>
				</div>

				<div class="box" style="text-align:center; padding-bottom:20px;"><input type="submit" name="login" value="Login"></div>
			</form>
	</div>		
</main>
<?php
	require('footer.html');
?>