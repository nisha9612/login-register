<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "login-register";

$conn = mysqli_connect($hostname,$username,$password,$dbname);

if(!$conn)
	{
		 die('something went wrong');

	}



?>