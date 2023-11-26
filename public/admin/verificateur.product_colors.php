<?php
error_reporting(0);

$msg = "";
 require_once('../../database/db.php');
 require_once('verificateur.admin.php');
  $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
  $color = isset($_POST['color']) ? $_POST['color'] : ''; 
   if(isset($_POST['add'])){
    $titre=htmlspecialchars($_POST['titre']);
    $color=htmlspecialchars($_POST['color']);
    $produit=htmlspecialchars($_POST['produit']);
    $filename = $_FILES["uploadfile"]["name"];
	$filesize = $_FILES["uploadfile"]["size"];
	$filetype = $_FILES["uploadfile"]["type"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./images_similaires/" . $filename;
	$allowed_formats= array('jpg','jpeg','png','JPG','JPEG','PNG');
    if( empty($_FILES['uploadfile']) AND  empty($_POST['produit'])){
        //si l'utilisateur clique sur le bouton d'envoie verifie si tous les champs ne sont pas vide
        $_SESSION['flash_message']="Veillez remplir tous les champs"; 
    }
 
    elseif($_POST['categorie']=='select'){
        $_SESSION['flash_message']="Veillez selectionner la categorie!!";  
    }
    else{
        if (! move_uploaded_file($tempname, $folder)) {
            $_SESSION['flash_message']="ERREUR!!";  
        } 
        $query = $bdd->prepare('INSERT INTO images_similaires (titre,couleur,image,id) VALUES(?,?,?,?)');
        $query->execute(array($titre,$color,$filename,$produit));  
        echo '<script>alert("image similaire ajouté");</script>';
        echo '<script>window.location.href="product_colors.php";</script>';
        exit;
    }
   }
?>
