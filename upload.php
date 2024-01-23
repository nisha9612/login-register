<?php
require_once 'config.php';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src = "https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <title>Upload Images</title> <!--Change the text to "Register"-->
    <script>
    $(document).ready(function(){
    $('#uploadForm').ajaxForm({
        target:'#imagesPreview',
        beforeSubmit:function(){
            $('#uploadStatus').html('<img src="css/uploading.gif"/>');
        },
        success:function(){
            $('#images').val('');
            $('#uploadStatus').html('');
        },
        error:function(){
            $('#uploadStatus').html('<p>Upload failed! Please try again.</p>');
        }
    });
});
  </script>
  </head>
  <body>
  <div class="container">

   	<?php

if(isset($_POST['submit'])){ 

    // File upload configuration 
    $statusMsg = $insertValuesSQL = $errorMsg = "";
    $targetDir = "uploads/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    $created_at = date('Y-m-d H:i:s');

     
    $images_arr = array(); 
    foreach($_FILES['images']['name'] as $key=>$val){ 
        $image_name = $_FILES['images']['name'][$key]; 
        $tmp_name     = $_FILES['images']['tmp_name'][$key]; 
        $size         = $_FILES['images']['size'][$key]; 
        $type         = $_FILES['images']['type'][$key]; 
        $error         = $_FILES['images']['error'][$key]; 
         
        
        $fileName = basename($_FILES['images']['name'][$key]); 
        $targetFilePath = $targetDir . $fileName; 
         
        
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 

        if(in_array($fileType, $allowTypes)){     
            // Store images on the server 
            if(move_uploaded_file($_FILES['images']['tmp_name'][$key], $targetFilePath)){ 
                $images_arr[] = $targetFilePath; 
                $insertValuesSQL .= "('".$targetFilePath."', NOW()),"; 
                 $insert_query = "INSERT into `media`(`user_id`,`image_path`,`created_at`,`deleted`) VALUES ('".$user_id."','".$targetFilePath."','".$created_at."','0')";
                $insert_query_run = mysqli_query($conn,$insert_query); 
            } 
        } 
    } 
   
    // Generate gallery view of the images 
    if(!empty($images_arr)){ ?> 
        <ul> 
        <?php foreach($images_arr as $image_src){ ?> 
            <li><img src="<?php echo $image_src; ?>" alt=""></li> 
        <?php } ?> 
        </ul> 
    <?php } 
} 
?>
   	<form action="upload.php" id="uploadForm" enctype="multipart/form-data" method="post">
   		<h1>Add Images</h1>
   		<div class="form-group">
   			<input type="file" class="form-control" name="images[]" id="images" multiple>
   		</div>
   		<div class="form-btn">
   			<input type="submit" class="btn btn-primary" name="submit" value="Upload">
   		</div>
   	</form>
    <div class="form-btn">
        <a href="index.php?user_id=<?php echo $user_id; ?>" class="btn btn-warning">Back</a>
      </div>
    <div id="uploadStatus"></div>
   </div>


  </body>
</html>
