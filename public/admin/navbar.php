<?php 
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('verificateur.admin.php');
?>

<nav class="bg-white shadow-lg h-full col-span-1 border" >
    <aside class="grid gap-4 mt-6 ">
        <a class="pl-20 pt-[4px] pb-[4px] hover:bg-gray-300  text-xl" id="dashboard-link" href="#">Dashboard</a>
        <a class="pl-20 pt-[4px] pb-[4px] hover:bg-gray-300  text-xl" id="product-link" href="#" >Produits</a>
        <a class="pl-20 pt-[4px] pb-[4px] hover:bg-gray-300  text-xl" id="statistics-link" href="#">Statistics</a>
        <a class="pl-20 pt-[4px] pb-[4px] hover:bg-gray-300  text-xl" id="help-link" href="#">Aide</a>
        <form action="" method="post" class="ml-20">
           <button name="logout" class="bg-gray-700 text-white px-3 rounded-2xl  hover:bg-gray-500">Se Déconnecter</button>   
        </form> 
    </aside>   
</nav>
<?php require_once('stayActive.php'); ?>
<?php require_once('../../html_partials/footer.html.php'); ?>


  