<?php
error_reporting(0);

$msg = "";
 require_once('../../database/db.php');
 //Recuperer l'id du produit
 if(isset($_GET['id']) AND !empty($_GET['id']) ){
    $getid = $_GET['id'];
    $recupproduct = $bdd->prepare('SELECT p.*,c.nom FROM produits p,categories c WHERE p.cat_id=c.cat_id AND id = ?');
    $recupproduct->execute(array($getid));
    $infos = $recupproduct->fetch();
    $titre=$infos['titre'];
    $description=$infos['contenu'];
    $prix=$infos['prix'];
    $categorie= $infos['nom'];
    $image_produit=$infos['filename'];
 }

?>