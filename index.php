<?php
session_start();
if(!isset($_SESSION['user']))
{
	header("location: login.php");
}
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <script src = "https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Welcome to dashboard</title>
  </head>
  <body>
   <div class="container">
   <a href="logout.php" class="btn btn-warning">Logout</a>
   <h1>Welcome to Dashboard <?php echo $user_name; ?></h1>
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
   		<div class="form-btn">
   	    <a href="upload.php?user_id=<?php echo $user_id; ?>" class="btn btn-warning">Add Images</a>
   		</div>
   </div>
  </body>
</html>