<?php 
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('verificateur.admin.php');
?>
<nav class=" bg-white shadow-lg h-full col-span-1">
    <aside class="grid gap-4 mt-6">
        <a href="Dashboard.php"  class="bg-gray-300">Tableau de bord</a>
        <a href="produits.php  <?= $_SERVER['SCRIPT_NAME'] === 'produits.php' ? 'bg-gray-300': '' ?>">Produits</a>
        <a href="#">Statistics</a>
        <a href="#">Aide</a>
    </aside>   
</nav>
<?php require_once('../../html_partials/footer.html.php'); ?>

  