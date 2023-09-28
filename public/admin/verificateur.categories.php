<?php
 //Recuperer l'id du produit
    require_once('../../database/db.php');
    require_once('verificateur.admin.php');
    if(isset($_GET['cat_id']) AND !empty($_GET['cat_id']) ){
       $id = $_GET['cat_id'];
       $recupproduct = $bdd->prepare('SELECT *FROM categories WHERE cat_id = ?');
       $recupproduct->execute(array($id));
       $infos = $recupproduct->fetch();
       $nom=$infos['nom'];
      
    }

?>