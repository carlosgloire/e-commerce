<?php

//Recuperer l'id du categorie
   require_once('../../database/db.php');
   require_once('verificateur.admin.php');
    //Recuperer l'id du produit
    require_once('../../database/db.php');
    require_once('verificateur.admin.php');
    if(isset($_GET['id']) AND !empty($_GET['id']) ){
       $id = $_GET['id'];
       $recupproduct = $bdd->prepare('SELECT *FROM produits WHERE id = ?');
       $recupproduct->execute(array($id));
       $infos = $recupproduct->fetch();
     
      
    }


   if(isset($_POST['add'])){
    $filename = $_FILES["uploadfile"]["name"];
	$filesize = $_FILES["uploadfile"]["size"];
	$filetype = $_FILES["uploadfile"]["type"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./images_similaires/" . $filename;
	$allowed_formats= array('jpg','jpeg','png','JPG','JPEG','PNG');
    if( empty($_FILES['uploadfile']) ){
        //si l'utilisateur clique sur le bouton d'envoie verifie si tous les champs ne sont pas vide
        $_SESSION['flash_message']="Veillez ajouter une photo"; 
    }
 
  
    else{
        if (! move_uploaded_file($tempname, $folder)) {
            $_SESSION['flash_message']="ERREUR!!";  
        } 
        $query = $bdd->prepare('INSERT INTO images_similaires (image,id) VALUES(?,?)');
        $query->execute(array($filename,$id));  
       $_SESSION['flash_message']="Produit ajouté avec succès";
    }
   }
?>
