<?php 

$errorCRUD = ['first' => '','second' => '', 'third' => '','id' => '', 'search' => '', 'search2' => ''];
$success = '';
$id = $name = $brand = $cost = $quantity = "";

if(isset($_POST['searchButton']))
{
	$search = htmlentities(mysqli_escape_string($conn, $_POST['search']));
	if(empty($search))
	{
		$errorCRUD['search'] = 'Write it down what you want to search';
	}
	else
	{
		$query = "SELECT * FROM product WHERE Name LIKE'%$search%'";
		$command = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($command, MYSQLI_ASSOC);
		
		if($row > 0)
		{
			$id = $row['Id'];
			$name = $row['Name'];
			$brand = $row['Brand'];
			$cost = $row['Cost'];
			$quantity = $row['Quantity'];
		
		}
		else
		{
			$errorCRUD['search2'] = 'Not found this product';
			$id = $name = $brand = $cost = $quantity = "";	
		}	
		mysqli_free_result($command);
		mysqli_close($conn);
	}
}

if(isset($_POST['select']))
{
	$id = htmlentities(mysqli_escape_string($conn, $_POST['id']));
	$name = htmlentities(mysqli_escape_string($conn, $_POST['name']));
	$brand = htmlentities(mysqli_escape_string($conn, $_POST['brand']));
	$cost = htmlentities(mysqli_escape_string($conn, $_POST['cost']));
	$quantity = htmlentities(mysqli_escape_string($conn, $_POST['quantity']));

	if(empty($id)) 
	{
		$errorCRUD['id'] = 'Please select ID';
		$id = $name = $brand = $cost = $quantity = "";
	}
	else
	{
		$query = "SELECT * FROM product WHERE Id = '$id'";
		$command = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($command, MYSQLI_ASSOC);
		
		if($row > 0)
		{
			$id = $row['Id'];
			$name = $row['Name'];
			$brand = $row['Brand'];
			$cost = $row['Cost'];
			$quantity = $row['Quantity'];
		
		}
		else
		{
			$errorCRUD['second'] = 'Can not found';
			$id = $name = $brand = $cost = $quantity = "";	
		}
		mysqli_free_result($command);
		mysqli_close($conn);
	}
}

if(isset($_POST['delete']))
{
	$id = htmlentities(mysqli_escape_string($conn, $_POST['id']));
	$name = htmlentities(mysqli_escape_string($conn, $_POST['name']));
	$brand = htmlentities(mysqli_escape_string($conn, $_POST['brand']));
	$cost = htmlentities(mysqli_escape_string($conn, $_POST['cost']));
	$quantity = htmlentities(mysqli_escape_string($conn, $_POST['quantity']));

	if(empty($id)) 
	{
		$errorCRUD['id'] = 'Please select ID';
		$id = $name = $brand = $cost = $quantity = "";
	}
	else
	{
		$query = "DELETE FROM product WHERE Id = '$id'";
		$command = mysqli_query($conn,$query);
		
		if($command)
		{
			$success = 'Deleted';
			$id = $name = $brand = $cost = $quantity = "";
		}
		else
		{
			$errorCRUD['third'] = 'Can not found';	
		}
		mysqli_close($conn);
	}
	
}

if(isset($_POST['update']))
{
	$id = htmlentities(mysqli_escape_string($conn, $_POST['id']));
	$name = htmlentities(mysqli_escape_string($conn, $_POST['name']));
	$brand = htmlentities(mysqli_escape_string($conn, $_POST['brand']));
	$cost = htmlentities(mysqli_escape_string($conn, $_POST['cost']));
	$quantity = htmlentities(mysqli_escape_string($conn, $_POST['quantity']));

	if(empty($id) || empty($name) || empty($brand) || empty($cost) || empty($quantity)) 
	{
		$errorCRUD['id'] = 'Please select ID';
		$id = $name = $brand = $cost = $quantity = "";
	}
	else
	{
		$query = "UPDATE product SET Name = '$name', Brand = '$brand', Cost = '$cost', Quantity ='$quantity' WHERE Id = '$id'";
		$command = mysqli_query($conn,$query);
		
		if($command)
		{
			$success = 'Successful';
			$id = $name = $brand = $cost = $quantity = "";
		}
		else
		{
			$errorCRUD['third'] = 'Not found this product';	
		}
		mysqli_close($conn);
	}
}

if(isset($_POST['insert']))
{
	$name = htmlentities(mysqli_escape_string($conn, $_POST['name']));
	$brand = htmlentities(mysqli_escape_string($conn, $_POST['brand']));
	$cost = htmlentities(mysqli_escape_string($conn, $_POST['cost']));
	$quantity = htmlentities(mysqli_escape_string($conn, $_POST['quantity']));

	if(empty($name) || empty($brand) || empty($cost) || empty($quantity)) 
	{
		$errorCRUD['first'] = 'Please fill the form';
	}
	else
	{
		$query = "INSERT INTO product (Name,Brand,Cost,Quantity) VALUES ('$name','$brand','$cost','$quantity')";
		$command = mysqli_query($conn,$query);
		
		if($command)
		{
			$success = 'Successful';
			$id = $name = $brand = $cost = $quantity = "";
		}
		mysqli_close($conn);
	}
}

?>