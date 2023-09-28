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
<section class="p-6 mx-auto ">
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
            <p class="text-blue-500">
               Couleurs Disponible
            </p>
            <div class="flex gap-1 w-[100%]">
            <?php 
            //Les images similaires au produit poste
                    $query = $bdd->query("SELECT * FROM images_similaires  WHERE id=$getid ");
                    if($query->rowCount() > 0){
                        while($produit = $query->fetch(PDO::FETCH_ASSOC)){
                        ?>  
                            <div class="grid">
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
                            else{
                            ?>
                            <p class="text-red-500"><?php echo "Il n'y a qu'une seule couleur seulement" ?></p>
                        <?php
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
                <div class="flex mt-5 gap-5">
                    <a  href="edit.php?id=<?php echo $getid;?>"><img src="icones/edit.png" alt="icone edit" width="30" title="Modifier"></a>
                    <form action="delete.product.php?id=<?php echo $getid;?>" method="POST">
                    <button  ><img src="icones/delete.png" alt="icone supprimer" width="30px" title="Supprimer"></button> 
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</section>

