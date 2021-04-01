<?php

$hostDB = 'localhost';
$usernameDB = 'root';
$passwordDB = '';
$databaseDB = 'php_project_user';

$conn = mysqli_connect($hostDB,$usernameDB,$passwordDB,$databaseDB) or die("Connection failed");

?>