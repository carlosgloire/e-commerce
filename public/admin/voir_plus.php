<?php
    require_once('verificateur.voir_plus.php');
?>
<?php
    $title=$titre;
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
    require_once('verificateur.admin.php');
    if(is_post()){
        require_once('verificateur.voir_plus.php');
    }
    
    ?>

<?php require_once('header.admin.php'); ?>

<section class="p-6 mx-auto  flex gap-10 max-w-full pt-16">
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
                                <p class="text-blue-500 mb-2"> Couleurs Disponible</p>
                                <aside class="flex gap-3 " id="content">
                                    <div class="">
                                        <img class="rounded w-full h-full  object-cover " src="image_produits_db/<?php echo $image_produit ?>" style="width: 200px;height:200px">  
                                    </div>
                                
                                    <?php
                                    while($produit = $query->fetch(PDO::FETCH_ASSOC)){
                                        ?> 
                                            <div class="grid " >
                                                <div class="  ">
                                                    <img class="rounded  object-cover " src="images_similaires/<?php echo $produit['image']?>"  style="width: 200px;height:200px">          
                                                </div>
                                            </div>
                                        <?php
                                    }
                                    ?>
                                </aside>
                                <div class="pagination" id="pagination"></div>
                            </div>    
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
                    <div class="flex mt-5 gap-5">
                    <a  href="edit.php?id=<?php echo $getid;?>"><img src="icones/edit.png" alt="icone edit" width="30" title="Modifier"></a>
                    <div class="delete-block">
                    <a href="#" class="delete" data-product-id="<?php echo $row['id']; ?>"><img src="icones/delete.png" alt="icone supprimer" width="30px" title="Supprimer"></a>
                    <?php
                    //Appelle a la fonction pour afficher un popup de suppression
                        popup_window_delete_product_viewmore($titre,$getid);
                    ?>
                </div>
                </div>
                </div>
            </div>
            
        </div>
       
    </div>  
   
</section>
<div class="max-w-full mx-auto justify-center py-2 pl-5" >
    <a  href="product_colors.php?id= <?php echo $getid ?>" class="bg-[#010e27] text-white px-3 py-1  shadow-sm rounded text-center text-base mr-2"  > Ajouter un produit similaire</a> 
    <a class="bg-[#010e27] text-white px-3 py-1 shadow-sm rounded text-center text-base mr-2"  href="product_faces.php?id= <?php echo $getid ?>" > Ajouter les faces du produit</a> 
</div>
 
<?php
    require_once('popup/script.php');
    require_once('popup/css_popup.php');
?>
<?php require_once('../produits/css/slider_css_productfaces.php')?>
<script src="../produits/js/slider.js"></script>
<script src="../produits/js/pagination-voir-en-detail.js"></script>
<?php require_once('../produits/css/pagination_voir-en-detail.php')?>
<?php   require_once('../../html_partials/footer.html.php');?>
