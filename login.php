<?php
require_once 'config.php';
session_start();
if(isset($_SESSION['user']))
{
	header("location: index.php");
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

if(isset($_POST['login']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	$errors = array();

	if(empty($user_name) OR empty($email) OR empty($password) OR empty($confirm_password))
	{
		array_push($errors,'All fields are required');
	}

	$select_query = "select * from registration where email = '$email'";
	$select_query_run = mysqli_query($conn,$select_query);
	$select_query_numrows = mysqli_fetch_array($select_query_run,MYSQLI_ASSOC);
	if($select_query_numrows)
	{
		
       if(password_verify($password,$select_query_numrows["password"]))
       {
       	     session_start();
       	     $_SESSION['user'] = 'yes';
             $_SESSION['user_id'] = $select_query_numrows['id'];
             $_SESSION['user_name'] = $select_query_numrows['username'];
             header("location: index.php?id=" . $select_query_numrows['id']);
             die();
       }
       else{
       	    echo "<div class='alert alert-danger'>Password does not match</div>";
       }
	}else{
       	    echo "<div class='alert alert-danger'>Email does not match</div>";
       }
}

?>
   	<form action="login.php" method="post">
   		<h1>Login</h1>
      <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Enter Your Email">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Enter Your Password">
      </div>
   		<div class="form-btn">
   			<input type="submit" class="btn btn-primary" name="login" value="Login">
   	        <p>Don't have an account? <a href="register.php">Register now</a>.</p>

   		</div>
   	</form>
   </div>
  </body>
</html>
