<?php 

$errors = ['fill' => '','gender' => '', 'password' => '','firstname' => ''];
$success = "";
$fName = $lName = $email = $username = $password = $password2 = "";

if(isset($_POST['submit']))
{
	$fName = htmlentities(mysqli_escape_string($conn, $_POST['firstname']));
	$lName = htmlentities(mysqli_escape_string($conn, $_POST['lastname']));
	$email = htmlentities(mysqli_escape_string($conn, $_POST['email']));
	$username = htmlentities(mysqli_escape_string($conn, $_POST['username']));
	$password = htmlentities(mysqli_escape_string($conn, $_POST['password']));
	$password2 = htmlentities(mysqli_escape_string($conn, $_POST['password2']));

	if(empty($fName) || empty($lName) || empty($email) || empty($username) || empty($password) ||  empty($password2))
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
			$gender = htmlentities(mysqli_escape_string($conn, $_POST['gender']));

			if($password != $password2)
			{
				$errors['password'] = 'Incorrect password';
			}
			else
			{
				$query = "SELECT FirstName FROM users WHERE FirstName = '$fName'";
				$command = mysqli_query($conn,$query);
				$row = mysqli_fetch_assoc($command);

				if($row > 0)
				{
					$errors['firstname'] = 'this username is already in use';	
				}
				else
				{
					if($username == "Admin" || $username == "admin")
					{
						$access = "admin";
						$query = "INSERT INTO users (FirstName,LastName,Email,Username,Password,Gender,Access) VALUES('$fName','$lName','$email','$username','$password','$gender','$access')";
						$command = mysqli_query($conn, $query);
						if($command)
						{
							$success = "Successfull";
							$fName = $lName = $email = $username = $password = $password2 = "";
						}
						else
						{
							/* nothing */
						}
					}
					else
					{
						$access = "user";
						$query = "INSERT INTO users (FirstName,LastName,Email,Username,Password,Gender,Access) VALUES('$fName','$lName','$email','$username','$password','$gender','$access')";
						$command = mysqli_query($conn, $query);
						if($command)
						{
							$success = "Successful";	
							$fName = $lName = $email = $username = $password = $password2 = "";
						}
						else
						{
							/* nothing */
						}
					}
					
				}
			mysqli_close($conn);
			}
		}		
	}
}

?>
