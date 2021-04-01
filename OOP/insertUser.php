<?php 
include('UserOOP.php'); //To use the Class -> user
include('database.php');

$UserObj = new User(); //new Object

$errors = ['fill' => '','gender' => '', 'password' => '','firstname' => ''];
$success = "";
$fName = $lName = $email = $username = $password = $password2 = "";

if(isset($_POST['submit']))
{

$fName = $_POST['firstname'];
$lName = $_POST['lastname'];
$email =   $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

	if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password']) ||  empty($_POST['password2']))
	{
		$errors['fill'] = 'Please fill the form';
	}
	else
	{
		if(empty($_POST['gender']))
		{
			$errors['gender'] = 'Please select Gender';
		}
		else
		{
			$UserObj->setGender($_POST['gender']);
			$UserObj->setFirstName($_POST['firstname']);
			$UserObj->setLastName($_POST['lastname']);
			$UserObj->setEmail($_POST['email']);
			$UserObj->setUsername($_POST['username']);
			$passTrueOrNo = $UserObj->setPasswordForInsert($_POST['password'],$_POST['password2']);
			
			if($passTrueOrNo == false)
			{
				$errors['password'] = 'Incorrect password';
			}
			else
			{
				$UserObj->InsertUser($UserObj->getUsername());
				$success = "Successful";
				$fName = $lName = $email = $username = $password = $password2 = "";
			}
		}		
	}
}

?>
