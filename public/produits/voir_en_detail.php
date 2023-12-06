<?php
    require_once('verificateur.voir_detail.php');
?>
<?php
    $title=$titre;
    require_once('../../html_partials/public.header.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
    if(is_post()){
        require_once('verificateur.voir_detail.php');
    }
    
    ?>
<?php require_once('menu_bar.php');?>

<section class="p-6 mx-auto pt-20 flex gap-10 max-w-full">
    <div class="w-[50%] ">
        <div class="">
        <?php require_once('slider_product_faces.php')?>
        </div>
    </div>
    <div class="w-[50%] ">
        <div class="grid"> 
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
            
            <div class=" w-[100%]">
                <?php 
                //Les images similaires au produit 
                    $query = $bdd->query("SELECT * FROM images_similaires  WHERE id=$getid ");
                    if($query->rowCount() > 0){
                        ?>
                            <div class="grid">
                                <p class="text-[#010e27] mb-2"> Couleurs Disponible</p>
                                <aside class="flex gap-3 " id="content">
                                    <div class="">
                                        <img class="rounded w-full h-full  object-cover " src="../admin/image_produits_db/<?php echo $image_produit ?>" style="width: 200px;height:200px">  
                                    </div>
                                
                                    <?php
                                    while($produit = $query->fetch(PDO::FETCH_ASSOC)){
                                        ?> 
                                            <div>
                                                <div class="  ">
                                                    <img class="rounded  object-cover " src="../admin/images_similaires/<?php echo $produit['image']?>"  style="width: 200px;height:200px">          
                                                </div>
                                            </div>
                                        <?php
                                    }
                                    ?>
                                </aside>
                            </div> 
                            <div class="pagination" id="pagination"></div>   
                        <?php        
                    }
                ?> 
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
                        <p class="font-semibold text-xl text-[#1d2238]">
                            <?php echo $stock; ?>
                        </p>
                    </div>
                    <?php
                        if($categorie== 'Vetements' OR $categorie=='Chaussures'){
                            ?>
                        <div class="grid gap-1">
                            <p class=" text-xl">
                                Sizes: 
                            </p>
                            <div class=" flex gap-3 flex-wrap text-xl mb-2">

                                <?php
                                $size_array = explode(', ', $size);
                                    // Utiliser la fonction max pour obtenir le nombre maximum de tailles parmi tous les enregistrements
                                    $max_size = count($size_array);
                                    
                                    // Créer des lignes pour chaque taille
                                    for ($i = 0; $i < $max_size; $i++) {
                                        ?>
                                            <p class="border px-2 text-[#1d2238]" ><?php echo $size_array[$i] ?></p>

                                        <?php
                                    }
                                     
                                ?>
                            </div>
                        </div>
                            <?php
                        }
                    ?>
                    <p>
                
                    </p>
                    </p>
                    <a class="bg-blue-500  text-white px-2 py-1 shadow-sm rounded text-center text-base flex  w-[120px] " href="acheter.php?id=<?php echo $getid;?>">
                        <div class=" gap-4 flex">
                            <p>Acheter</p>
                            <img src="../produits/images/cart2.jpg" alt="image cart" width="25px" height="20px">
                        </div>
                    </a>
                </div>
            </div>
            
        </div>
       
    </div>   
</section>
<script src="../user/popup/popup_ope-settings.js"></script>
<script src="js/slider.js"></script>
<script src="js/pagination-voir-en-detail.js"></script>
<?php require_once('css/pagination_voir-en-detail.php')?>
<?php require_once('../../html_partials/public.footer.php')?>
