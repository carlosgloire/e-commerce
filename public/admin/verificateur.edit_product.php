<?php
error_reporting(0);

$msg = "";
 require_once('../../database/db.php');
 require_once('verificateur.admin.php');
 //Recuperer l'id du produit
 if(isset($_GET['id']) AND !empty($_GET['id']) ){
    $getid = $_GET['id'];
    $recupproduct = $bdd->prepare('SELECT *FROM produits WHERE id = ?');
    $recupproduct->execute(array($getid));
    $infos = $recupproduct->fetch();
    $titre=$infos['titre'];
    $description=$infos['contenu'];
    $prix=$infos['prix'];
    $image=$infos['filename'];
    $stock=$infos['stock'];
 }

 if(isset($_POST['modify'])){
    $titre = htmlspecialchars($_POST['titre']);
    $contenu = htmlspecialchars($_POST['contenu']);
    $categorie1=htmlspecialchars($_POST['categorie']);
    $price=htmlspecialchars($_POST['prix']);
    $stock=htmlspecialchars($_POST['stock']);
      // Handle file upload
      if (!empty($_FILES['uploadfile']['name'])) {
        $filename = $_FILES['uploadfile']['name'];
        $filesize = $_FILES['uploadfile']['size'];
        $filetype = $_FILES['uploadfile']['type'];
        $tempname = $_FILES['uploadfile']['tmp_name'];
        $folder = "./user_images/" . $filename;
        $allowedExtensions = ['png', 'jpg', 'jpeg'];
        $pattern = '/\.(' . implode('|', $allowedExtensions) . ')$/i';

        if (!preg_match($pattern, $filename)) {
            $_SESSION['flash_message'] = "Votre fichier doit être au format 'jpg', 'jpeg' ou 'png'.";
        } elseif (!move_uploaded_file($tempname, $folder)) {
            $_SESSION['flash_message'] = "Erreur lors de l'envoi du fichier.";
        }
    } else {
        $requete = $bdd->query("SELECT filename FROM produits WHERE id = $getid ");
        $photo = $requete->fetch();
        $filename = $photo['filename']; // If no file is uploaded, keep the previous file name 
    }
	$allowed_formats= array('jpg','jpeg','png');
    if(empty($titre) || empty($contenu) || empty($price))
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
            $updtadeproduct = $bdd->prepare('UPDATE produits SET titre = ?, filename = ?,  contenu = ? ,cat_id = ?,stock = ?, prix = ? WHERE id=?');
            $updtadeproduct->execute(array($titre,$filename,$contenu,$categorie1,$stock,$price,$getid));  
            echo '<script>alert("Produit modifie");</script>';
            echo '<script>window.location.href="product.php";</script>';
            exit;            
    }
    }
?>