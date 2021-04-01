<?php 

class User
{
	private $userid;
	private $firstName;
	private $lastName;
	private $email;
	private $username;
	private $password;
	private $gender;
	private $access;
	public static $count;
  
	//----- User Id -----
	public function setUserId($userid)
	{
		$this->userid = $userid;
	}
	public function getUserId()
	{
		return $this->userid;
	}
	//---- First Name ----
	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
	}
	public function getFirstName()
	{
		return $this->firstName;
	}
	//---- Last Name ----
	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
	}

	public function getLastName()
	{
		return $this->lastName;
	}
	//---- Email ----
	public function setEmail($email)
	{
		if(strpos($email, '@') > -1) //azt jelenti -1, hogy benne van valahol a stringben
		{
			$this->email = $email;
		}  
		/*  											vagy ez is jó
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$this->email = $email;
		}
		else
		{
			return false;
		}
		*/	
	}

	public function getEmail()
	{
		return $this->email;
	}
	//---- Username ----	
	public function setUsername($username)
	{
		$userName = trim($username);
		if(preg_match('/^[a-zA-Z0-9]{6,12}$/',$userName))
		{
			$this->username = $username;
			return true;
		}	
		else
		{
			return false;
		}
	}
	public function getUsername()
	{
		return $this->username;
	}
	//---- Password ----
	public function setPassword($password)
	{
			$this->password = $password;
	}
	public function setPasswordForInsert($password,$password2)
	{
		if($password == $password2)
		{
				$this->password = md5($password);
				return true;
		}
		else
		{
			return false;
		}
	}
	public function getPassword()
	{
		return $this->password;
	}
	//---- Gender ----
	public function setGender($gender)
	{
		$this->gender = $gender;
	}
	public function getGender()
	{
		return $this->gender;
	}
	//---- Access ----
	public function setAccess($access)
	{
		$this->access = $access;
	}
	public function getAccess()
	{
		return $this->access;
	}
	//--- GetOnline ---
	public function getCount()
	{
		//if(session == van) online .self::$count++;
		return self::$count;
	}
	public function InsertUser($username)//Check admin or not
	{
		include('database.php');
		if($username == "Admin" || $username == "admin")
		{
			$this->setAccess("admin");
			$query = "INSERT INTO users (FirstName,LastName,Email,Username,Password,Gender,Access) VALUES(:FirstName,:LastName,:Email,:Username,:Password,:Gender,:Access)";
			$commad = $conn->prepare($query);
			$commad->execute(array(                      
				'FirstName'=>$this->getFirstName(),
				'LastName'=>$this->getLastName(),
				'Email'=>$this->getEmail(),
				'Username'=>$this->getUsername(),
				'Password'=>$this->getPassword(),
				'Gender'=>$this->getGender(),
				'Access'=>$this->getAccess()	
			));
		}
		else
		{
			$this->setAccess("user");
			$query = "INSERT INTO users (FirstName,LastName,Email,Username,Password,Gender,Access) VALUES(:FirstName,:LastName,:Email,:Username,:Password,:Gender,:Access)";
			$commad = $conn->prepare($query);
			$commad->execute(array(
				'FirstName'=>$this->getFirstName(),
				'LastName'=>$this->getLastName(),
				'Email'=>$this->getEmail(),
				'Username'=>$this->getUsername(),
				'Password'=>$this->getPassword(),
				'Gender'=>$this->getGender(),
				'Access'=>$this->getAccess()	
			));
		}	
		$conn = null;
	}

	public function LoginUser()
	{
		include('database.php');
		$query = "SELECT * FROM users WHERE Username = :Username AND Password = :Password";
		$command = $conn->prepare($query);
		$command->execute([
			'Username'=>$this->getUsername(),
			'Password'=>$this->getPassword()
		]);
		$row = $command->fetch(PDO::FETCH_ASSOC);
		if($row > 0)
		{	
			$this->setUserId($row['Id']);
			$this->setFirstName($row['FirstName']);
			$this->setLastName($row['LastName']);
			$this->setEmail($row['Email']);
			$this->setUsername($row['Username']);
			$this->setPassword($row['Password']);
			$this->setGender($row['Gender']);
			$this->setAccess($row['Access']);
			if($this->getAccess() == "Admin" || $this->getAccess() == "admin")
			{
				header('location:admin.php');
			}
			else
			{
				header('location:user.php');
			}
			return true;
		}
		else
		{
			return false;
		}
	}
}


?>