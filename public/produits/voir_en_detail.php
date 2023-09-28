<?php
    require_once('verificateur.voir_detail.php');
?>
<?php
    $title=$titre;
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
    if(is_post()){
        require_once('verificateur.voir_detail.php');
    }
    
    ?>
<?php require_once('menu_bar.php');?>
<section class="p-6 mx-auto pt-20">
    <div class="flex gap-10 max-w-full">
        <div class="w-[50%]">
            <div class="flex mt-1 gap-10">
                <img class="rounded object-cover " src="../admin/image_produits_db/<?php echo $image_produit ?>">          
            </div>
        </div>
        <div class="w-[50%]">
           
            <div class="mb-5 flex justify-between">
                <h1 class=" font-semibold text-xl">
                <?php echo $titre ?>
                </h1>
                <p class="text-blue-500 text-xl ">
                   <?php echo $categorie?>
                </p>
            </div>
            <p class=" mb-8">
              <?php echo $description ?>
            </p>
           
            <div class="flex gap-1 w-[100%]">
            <?php 
         
            //Les images similaires au produit 
                    $query = $bdd->query("SELECT * FROM images_similaires  WHERE id=$getid ");
                    if($query->rowCount() > 0){
                        ?>
                           <p class="text-blue-500 "> Couleurs Disponible</p>
                        <?php
                        while($produit = $query->fetch(PDO::FETCH_ASSOC)){
                        ?>  
                            <div class="grid ">
                                <div class="flex mt-1 gap-10 ">
                                    <img class="rounded  object-cover " src="../admin/images_similaires/<?php echo $produit['image']?>">          
                                </div>
                                <div class="text-green-500">
                                    <?php echo $produit['couleur']?>
                                </div>
                            </div>
                           
                            <?php
                            }
                            }
                ?>
            </div>
            <div>
                <div class="flex gap-1">
                    <p class=" text-xl">
                        Prix: 
                    </p>
                    <p class="font-semibold text-xl">
                        <?php echo $prix. '$'; ?>
                    </p>
                </div>
                <div class="flex gap-1">
                    <p class=" text-xl">
                        Nombre en stock: 
                    </p>
                    <p class="font-semibold text-xl">
                        <?php echo $stock; ?>
                    </p>
                </div>
                <?php
                    if($categorie== 'Vetements'){
                        ?>
                            <div class="flex gap-1">
                    <p class=" text-xl">
                        Sizes: 
                    </p>
                    <p class="font-semibold text-xl mb-2">
                        <?php echo $size; ?>
                    </p>
                </div>
                        <?php
                    }
                ?>
                <p>
            
                </p>
                </p>
                <a class="bg-blue-500  text-white px-2 py-1 shadow-sm rounded text-center text-base flex  w-[120px] " href="acheter.php">
                    <div class=" gap-4 flex">
                        <p>Acheter</p>
                        <img src="../produits/images/cart2.jpg" alt="image cart" width="25px" height="20px">
                    </div>
                </a>
            </div>
        </div>
    </div>
    
</section>

