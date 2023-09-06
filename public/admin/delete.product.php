
<?php
require_once('../../database/db.php'); 
 if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupart = $bdd->prepare('SELECT *FROM produits WHERE id = ?');
    $recupart->execute(array($getid));
    if($recupart->rowCount() > 0){
        $deletart = $bdd->prepare('DELETE FROM produits WHERE id = ? ');
        $deletart->execute(array($getid));
        echo '<script>alert("Produit supprimé avec succès");</script>';
        echo '<script>window.location.href="product.php";</script>';
        exit;
 }
 else{
    echo '<script>alert("Aucun produit trouvé");</script>';
    echo '<script>window.location.href="product.php";</script>';
    exit;
 }

}else{
    echo '<script>alert("Aucun id trouve");</script>';
    echo '<script>window.location.href="product.php";</script>';
    exit;
 }
