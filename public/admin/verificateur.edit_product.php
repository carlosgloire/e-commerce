<?php
error_reporting(0);

$msg = "";
 require_once('../../database/db.php');
 //Recuperer l'id du produit
 if(isset($_GET['id']) AND !empty($_GET['id']) ){
    $getid = $_GET['id'];
    $recupproduct = $bdd->prepare('SELECT *FROM produits WHERE id = ?');
    $recupproduct->execute(array($getid));
    $infos = $recupproduct->fetch();
    $titre=$infos['titre'];
    $description=$infos['contenu'];
    $prix=$infos['prix'];
 }


 if(isset($_POST['modify'])){
    $titre = htmlspecialchars($_POST['titre']);
    $contenu = htmlspecialchars($_POST['contenu']);
    $categorie1=htmlspecialchars($_POST['categorie']);
    $price=htmlspecialchars($_POST['prix']);
     $filename = $_FILES["uploadfile"]["name"];
	$filesize = $_FILES["uploadfile"]["size"];
	$filetype = $_FILES["uploadfile"]["type"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./image_produits_db/" . $filename;
	$allowed_formats= array('jpg','jpeg','png');
    if(empty($_POST['titre'])&& empty($_POST['contenu']))
    {
        $_SESSION['flash_message']="Veillez completer tous les champs!!"; 
    }
    elseif( empty($_POST['titre'])){
        $_SESSION['flash_message']="Veillez saisir le titre du produit!!"; 
    }
   elseif( empty($_POST['contenu'])){
        $_SESSION['flash_message']="Veillez ajouter du contenu!!";  
    }
    else{
        if (! move_uploaded_file($tempname, $folder)) {
            $_SESSION['flash_message']="ERREUR!";   
        } 
            $updtadeproduct = $bdd->prepare('UPDATE produits SET titre = ?, filename = ?,  contenu = ? ,cat_id = ?, prix = ? WHERE id=?');
            $updtadeproduct->execute(array($titre,$filename,$contenu,$categorie1,$price,$getid));  
            echo '<script>alert("Produit modifie");</script>';
            echo '<script>window.location.href="product.php";</script>';
            exit;            
    }
    }
?>