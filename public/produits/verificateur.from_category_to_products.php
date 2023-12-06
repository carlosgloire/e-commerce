<?php

 require_once('../../database/db.php');
 //Recuperer les produits apartir de l'id du produit
 if(isset($_GET['cat_id']) AND !empty($_GET['cat_id']) ){
        $id = $_GET['cat_id'];
        $_SESSION['cat_id']=$id;
        $recupproduct = $bdd->prepare('SELECT *FROM categories WHERE cat_id = ?');
        $recupproduct->execute(array($id));
        $infos = $recupproduct->fetch();
        $_SESSION['nom']=$infos['nom'];
       
     }
 
 

?>
