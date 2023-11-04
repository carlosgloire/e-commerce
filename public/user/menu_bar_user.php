
<?php 

require_once('../../html_partials/public.header.php');
require_once('../../database/db.php');

?>
    <header id="header" class="flex bg-white justify-between pl-10 py-4 pr-4 shadow-sm mb-1 border w-full" style="z-index: 10;position:fixed;">
        <a href="user.php"><img src="../produits/images/gs_logo.png" alt="logo glory shop" width="30px" title="Acceuil"></a>
        <div class="text-black gap-20 font-semibold">
            <a class="pr-8" href="../produits/user.php">ACCEUIL</a>
            <a class="pr-8" href="#">CATEGORIES</a>
            <a class="pr-8" href="#">APROPOS</a>
            
        </div>
        
         <div class="flex ">
         <form class="form-horizontal" action="search_2.php" method="post">
            <div class="flex gap-3">
                <input type="text" class="rounded  border-[1px] border-gray-500 bg-gray-100  px-3" name="search"  placeholder="Recherchez ici">
                <button type="submit" name="save" class="bg-blue-500 text-white px-2 mb-5 shadow-sm rounded text-center text-base hidden" >Submit</button>   
            </div>
         </form>
            <p class="pl-4"><img src="../produits/images/cart.png" alt="image cart" width="30px"></p>
            <p class="">2 Produits</p>
            <p class="pl-3">7200</p>

         </div>
     </header>

     <?php    
     require_once('../../html_partials/public.footer.php');
?>