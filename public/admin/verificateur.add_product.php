<?php
 require_once('../../database/db.php');

 //On submission, the values are retrieved from $_POST and stored in variables
 $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
 $contenu = isset($_POST['contenu']) ? $_POST['contenu'] : '';
   if(isset($_POST['submit'])){
    $titre=htmlspecialchars($_POST['titre']);
    $contenu=htmlspecialchars($_POST['contenu']);
    $categorie=htmlspecialchars($_POST['categorie']);
   
   }

    if( empty($_POST['titre']) AND  empty($_POST['titre'])){
        //si l'utilisateur clique sur le bouton d'envoie verifie si tous les champs ne sont pas vide
        $_SESSION['flash_message']="Veillez remplir tous les champs !!";
        
    }
   elseif( empty($_POST['titre'])){
        $_SESSION['flash_message']="Veillez saisir le titre du produit!!"; 
    }
   elseif( empty($_POST['contenu'])){
        $_SESSION['flash_message']="Veillez ajouter du contenu!!";  
    }
    elseif($_POST['categorie']=='select'){
        $_SESSION['flash_message']="Veillez selectionner la categorie!!";  
    }
    else{
        $query = $bdd->prepare('INSERT INTO produits (titre,contenu,cat_id) VALUES(?,?,?)');
        $query->execute(array($titre,$contenu,$categorie));
        echo '<script>alert("Produit ajoute");</script>';
        echo '<script>window.location.href="add_product.php";</script>';
        exit;
    }

?>
