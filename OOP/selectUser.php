<?php
session_start();
include('database.php');
include('UserOOP.php');

$errorS =['first' => '', 'second' => ''];
$username = $password = "";

if(isset($_POST['login']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(empty($_POST['username']) || empty($_POST['password']))
	{
		$errorS['first'] = 'Please fill the form';
	}
	else
	{
		$ObjUser = new User();

		$ObjUser->setUsername($_POST['username']);
		$ObjUser->setPassword(md5($_POST['password']));

		if($ObjUser->LoginUser() == true)
		{
			//setcookie('username',$usernameCookie, time() + 86400); // 86400 = 1 day
			//var_dump($ObjUser->getUserId().' '.$ObjUser->getUsername().' '.$ObjUser->getAccess());
			$_SESSION['UserId'] = $ObjUser->getUserId();
			$_SESSION['Username'] = $ObjUser->getUsername();
			$_SESSION['Access'] = $ObjUser->getAccess();
		}	
		else
		{
			$errorS['second'] = 'Incorrect Username or Password';	
		}	

	}
	$conn = null;
}

?>
