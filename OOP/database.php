<?php

$dsn = "mysql:host=localhost;dbname=php_project_user";
	try
	{
		$conn = new PDO($dsn,'root','');
		//echo 'Connected';
	}
	catch(Exception $e)
	{
		die("Error: ".$e->getMessage());
	}

?>
