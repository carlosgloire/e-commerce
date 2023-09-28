
<?php 
$title='Menu';
require_once('../../html_partials/public.header.php');
require_once('../../database/db.php');

?>
    <header id="header" class="flex bg-white justify-between px-20 py-4 shadow-sm mb-1 border">
        <div class="text-black text-xl gap-20 font-semibold">
            ADMIN
        </div>
        
         <div class="flex ">
         <form class="form-horizontal" action="search_admin.php" method="post">
            <div class="flex gap-3">
                <input type="text" class="rounded  border-[1px] border-gray-500 bg-gray-100  px-3" name="search"  placeholder="Recherchez ici">
                <button type="submit" name="save" class="bg-blue-500 text-white px-2 mb-5 shadow-sm rounded text-center text-base hidden" >Submit</button>   
            </div>
         </form>
            <p class="pl-4"><img src="images/cart.png" alt="image cart" width="30px"></p>
            <p class="">2 Produits</p>
            <p class="pl-3">7200</p>

         </div>
     </header>

     <?php    
     require_once('../../html_partials/public.footer.php');
?>