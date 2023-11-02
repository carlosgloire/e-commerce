
<?php
require_once('../../database/db.php');

 if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recup_id = $bdd->prepare('SELECT *FROM produits WHERE id = ?');
    $recup_id->execute(array($getid));
    if($recup_id->rowCount() > 0){
        $delete_product = $bdd->prepare('DELETE FROM produits WHERE id = ? ');
        $delete_product->execute(array($getid));
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
