<?php
    $title='Moifier un produit';
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
    require_once('verificateur.voir_detail.php');
    if(is_post()){
        require_once('verificateur.voir_detail.php');
    }
    
    ?>
<?php require_once('menu_bar.php');?>
<section class="p-6 mx-auto ">
    <div class="flex gap-10">
        <div class="w-[35%]">
        <div class="flex mt-1 gap-10">
            <img class="rounded object-cover " src="../admin/image_produits_db/<?php echo $image_produit ?>">          
        </div>
        </div>
        <div>
           
            <div class="mb-5 flex gap-40">
                <h1 class=" font-semibold text-xl">
                <?php echo $titre ?>
                </h1>
                <p class="text-blue-500 text-xl ">
                   <?php echo $categorie?>
                </p>
            </div>
            <p class="w-[50%] mb-8">
              <?php echo $description ?>
            </p>
            <div class="flex gap-2">
                <p class="w-[100px] "><img class="rounded-xl" src="images/iphone.jpg" alt=""></p>
                <p class="w-[100px] "><img class="rounded-xl" src="images/iphone.jpg" alt=""></p>
                <p class="w-[100px] "><img class="rounded-xl" src="images/iphone.jpg" alt=""></p>
                <p class="w-[100px] "><img class="rounded-xl" src="images/iphone.jpg" alt=""></p>
            </div>
        </div>
    </div>
    
</section>