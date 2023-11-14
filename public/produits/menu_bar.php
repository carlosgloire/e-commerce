
<?php 
$title='Menu';
require_once('../../html_partials/header.html.php');
require_once('../../database/db.php');

?>
    <header id="header" class="flex bg-[#010e27] justify-between pl-10 py-4 pr-4   w-full" style="z-index: 10;position:fixed;">
        <a href="home.php"><img src="images/Glory-shop.png" alt="logo glory shop" width="30px" title="Acceuil"></a>
        <div class="text-white gap-8 flex items-center">
            <a class="pr-8" href="home.php">ACCEUIL</a>
            <a class="pr-8" href="#">CATEGORIES</a>
            <a class="pr-8" href="#">APROPOS</a>
            <a href="../user/login.php">
            <img src="images/user_icon.png"   alt="Default image user" title="Connexion ou Inscription" width="35px">            </a>
        </div>
        
         <div class="flex items-center">
            <img src="images/search.png" alt="search icon" width="30px">
            <p class="pl-4"><img src="images/cart2.jpg" alt="image cart" width="30px"></p>
            <p class="text-white">2 Produits</p>
            <p class="pl-3 font-bold text-white">7200 $</p>

         </div>
     </header>

     <?php    
     require_once('../../html_partials/public.footer.php');
?>