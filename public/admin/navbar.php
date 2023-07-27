<?php 
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('verificateur.admin.php');
?>

<nav class=" bg-white shadow-lg h-full col-span-1" >
    <aside class="grid gap-4 mt-6">
        <a id="dashboard-link" href="#">Tableau de bord</a>
        <a  id="product-link" href="#" >Produits</a>
        <a  id="statistics-link" href="#">Statistics</a>
        <a id="help-link" href="#">Aide</a>
    </aside>   
</nav>
<?php require_once('stayActive.php'); ?>
<?php require_once('../../html_partials/footer.html.php'); ?>

  