<?php
error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$filesize = $_FILES["uploadfile"]["size"];
	$filetype = $_FILES["uploadfile"]["type"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./image/" . $filename;
	$name=htmlspecialchars($_POST['name']);
	$allowed_formats= array('jpg','jpeg','png');
    if(empty($_POST['uploadfile']) AND empty($_POST['name'])){
		echo '<script>alert("Veillez comleter tous les champs");</script>';
		echo '<script>window.location.href="index.php";</script>';
		exit;
	}
	elseif($filesize > 200000){
		echo '<script>alert("Votre photo ne doit pas depasser 2Mb");</script>';
		echo '<script>window.location.href="index.php";</script>';
		exit;
	}
	elseif(! in_array($filetype,$allowed_formats)){
		echo '<script>alert("Veillez choisir le fichier au format JPG,JPEG et PNG");</script>';
		echo '<script>window.location.href="index.php";</script>';
		exit;
	}
	else{
		$db = new PDO('mysql:host=localhost; dbname=geeksforgeeks', 'root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
   
	   // Get all the submitted data from the form
	   $sql = $db->prepare('INSERT INTO image (filename,name) VALUES(?,?)');
	   $sql->execute(array($filename,$name));
   
	   // Now let's move the uploaded image into the folder: image
	   
	   if (move_uploaded_file($tempname, $folder)) {
		   echo '<script>alert("image ajoute");</script>';
		   echo '<script>window.location.href="display.php";</script>';
		   exit;
	   } else {
		   echo "<h3> Failed to upload image!</h3>";
	   }
	}
    
}
?>