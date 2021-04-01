<?php 
session_start();

if(isset($_POST['logout']))
{
	if(isset($_SESSION['username']))
	{
		session_unset($username);
		session_destroy();
	}
	header('location:register.php');
}

?>