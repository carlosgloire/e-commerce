<?php 
    require_once('../../functions.php');
    require_once('verificateur.admin.php');
?>

<nav class="bg-white shadow-lg col-span-1 border pt-12" >
    <aside class="grid gap-4 ">
        <a class="pl-20 pt-[4px] pb-[4px] hover:bg-gray-300 cursor-pointer  text-xl" id='dashboard-link' >Dashboard</a>
        <a class="pl-20 pt-[4px] pb-[4px] hover:bg-gray-300 cursor-pointer  text-xl" id='product-link' >Produits</a>
        <a class="pl-20 pt-[4px] pb-[4px] hover:bg-gray-300 cursor-pointer  text-xl" id='statistics-link' >Statistics</a>
        <form action="" method="post" class="ml-20">
           <button name="logout" class="bg-[#1d2238] text-white px-3 rounded  ">Se Déconnecter</button>   
        </form> 
    </aside>   
</nav>


  