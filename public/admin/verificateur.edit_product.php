<?php
 require_once('../../database/db.php');
 //Recuperer l'id du produit
 if(isset($_GET['id']) AND !empty($_GET['id']) ){
    $getid = $_GET['id'];
    $recupproduct = $bdd->prepare('SELECT *FROM produits WHERE id = ?');
    $recupproduct->execute(array($getid));
    $infos = $recupproduct->fetch();
    $title=$infos['titre'];
    $description=$infos['contenu'];
 }

 if(isset($_POST['modify'])){
    $titre = htmlspecialchars($_POST['titre']);
    $contenu = htmlspecialchars($_POST['contenu']);
    $categorie1=htmlspecialchars($_POST['categorie']);
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
    $updtadeproduct = $bdd->prepare('UPDATE produits SET titre = ?,  contenu = ? ,cat_id = ? WHERE id=?');
    $updtadeproduct->execute(array($titre,$contenu,$categorie1,$getid));  
    echo '<script>alert("produit modifié avec succès");</script>';
    echo '<script>window.location.href="product.php";</script>';
    exit;
    }
    }
?>