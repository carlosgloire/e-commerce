<?php 
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('verificateur.admin.php');
?>

<nav class="bg-white shadow-lg h-full col-span-1" >
    <aside class="grid gap-4 mt-6">
        <a class="pl-20 pt-[4px] pb-[4px] hover:bg-gray-300 font-semibold text-xl" id="dashboard-link" href="#">Dashboard</a>
        <a class="pl-20 pt-[4px] pb-[4px] hover:bg-gray-300 font-semibold text-xl" id="product-link" href="#" >Produits</a>
        <a class="pl-20 pt-[4px] pb-[4px] hover:bg-gray-300 font-semibold text-xl" id="statistics-link" href="#">Statistics</a>
        <a class="pl-20 pt-[4px] pb-[4px] hover:bg-gray-300 font-semibold text-xl" id="help-link" href="#">Aide</a>
    </aside>   
</nav>
<?php require_once('stayActive.php'); ?>
<?php require_once('../../html_partials/footer.html.php'); ?>


  