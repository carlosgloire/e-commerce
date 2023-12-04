<?php

require_once('../../database/db.php');
//Recuperer les produits apartir de l'id du produit
if(isset($_GET['id']) AND !empty($_GET['id']) ){
   $id = $_GET['id'];
   $recupproduct = $bdd->prepare('SELECT p.*,c.nom FROM produits p,categories c WHERE p.cat_id=c.cat_id AND  id = ?');
   $recupproduct->execute(array($id));
   $infos = $recupproduct->fetch();
   $titre=$infos['titre'];

}

?>