<?php
	require('header.html');
    include('selectUser.php'); 
?>	
<main>
	<div id="container2">
		<h1>Login</h1>
			<form method="POST" action="login.php">
				<div class="rowInput"><input type="text" name="username" placeholder="Username" value="" autocomplete="off" value=""></div>

				<div class="rowInput"><input type="password" name="password" placeholder="Password" value="" autocomplete="off" value="?>"></div>
				
				<div class="rowInput" style="text-align:center; margin:15px 0px">
					<label style="font-size:30px; color:red;"><?php echo $errorS['first']; echo $errorS['second'];  ?></label>
				</div>

				<div class="box" style="padding-bottom:20px;"><input type="submit" name="login" value="Login"></div>
			</form>
	</div>		
</main>
<?php
	require('footer.html');
?>