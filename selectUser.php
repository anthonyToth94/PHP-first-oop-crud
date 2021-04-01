<?php

$errorS =['first' => '', 'second' => ''];
$username = $password = "";

if(isset($_POST['login']))
{
	$username = htmlentities(mysqli_escape_string($conn, $_POST['username']));
	$password = htmlentities(mysqli_escape_string($conn, $_POST['password']));

	if(empty($username) || empty($password))
	{
		$errorS['first'] = 'Please fill the form';
	}
	else
	{

		$query = "SELECT Username, Password, Access FROM users WHERE Username = '$username' AND Password = '$password'";
		$command = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($command);

			
		if($row > 0)
		{
			session_start();
			$_SESSION['username'] = $username;	
			//setcookie('username',$usernameCookie, time() + 86400); // 86400 = 1 day
			if($row['Access'] == "admin" )
			{
				header('location:admin.php');

			}
			else
			{
				header('location:user.php');
				
			}
		}
		else
		{
			$errorS['second'] = 'Incorrect Username or Password';	
		}
		
	}
	mysqli_free_result($command);
	mysqli_close($conn);
}

?>