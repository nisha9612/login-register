<?php
require_once 'config.php';
session_start();
if(!isset($_SESSION['user']))
{
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Register Form</title> <!--Change the text to "Register"-->
  </head>
  <body>
  <div class="container">

   	<?php

if(isset($_POST['submit']))
{
    $user_name = $_POST['user_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$user_type = 'user';

	$password_hash = password_hash($password,PASSWORD_DEFAULT);
	$created_at = date('Y-m-d H:i:s');


	$errors = array();

	if(empty($user_name) OR empty($email) OR empty($password) OR empty($confirm_password))
	{
		array_push($errors,'All fields are required');
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
	   array_push($errors,'Email is not valid');

	}
	if(strlen($password) < 8)
	{
	   array_push($errors,'Password must be atleast 8 characters');

	}
	if($password !== $confirm_password)
	{
	   array_push($errors,"Password doesn't match");

	}
	$select_query = "select * from registration where email = '$email'";
	$select_query_run = mysqli_query($conn,$select_query);
	$select_query_numrows = mysqli_num_rows($select_query_run);
	if($select_query_numrows > 0)
	{
      array_push($errors,'Email already registered!');
	}
	if(count($errors) > 0)
	{
	  foreach($errors as $error)
	  {
        echo "<div class='alert alert-danger'>$error</div>";
	  }
	}else{
	  	//insert query here

	  	$registration_query ="INSERT into `registration`(`user_type`,`username`,`email`,`password`,`confirm_password`,`created_at`,`deleted`) VALUES ('".$user_type."','".$user_name."','".$email."','".$password_hash."','".$password_hash."','".$created_at."','0')";

	  	$registration_query_run = mysqli_query($conn,$registration_query);
	  	if($registration_query_run)
	  	{
            echo "<div class ='alert alert-danger'>Your registered successfully</div>";
            header("location: login.php");

	  	}else{
            die('something went wrong');
	  	}
	  }
}



?>
   	<form action="register.php" method="post">
   		<h1>Registration Form</h1>
   		<div class="form-group">
   			<input type="text" class="form-control" name="user_name" placeholder="Enter Your Username">
   		</div>
      <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Enter Your Email">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Enter Your Password">
      </div>
   		<div class="form-group">
   			<input type="password" class="form-control" name="confirm_password" placeholder="Enter Your Confirm Password">
   		</div>
   		<div class="form-btn">
   			<input type="submit" class="btn btn-primary" name="submit" value="Register">
   		</div>
   	</form>

   </div>


  </body>
</html>
