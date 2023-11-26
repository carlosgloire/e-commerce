<?php
    $title='PRODUITS';
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
    require_once('verificateur.admin.php');
    require_once('header.admin.php');
    require_once('popup/css_popup.php')
?>
<section class="grid grid-cols-5" >
    <?php require_once('navbar.php');?>
    <div class="col-span-4 p-6">
        <div class="flex justify-between pr-10">
            <h1 class="text-xl font-semibold mb-3 ">PRODUITS</h1>
                <p class="text-gray-500">
                <?php
                    //Requete pour compter les produits
                    $requete=$bdd->prepare("SELECT count('id') AS id FROM produits");
                    $requete->execute();
                    while($nombre=$requete->fetch()){
                        echo $nombre['id'].' Produits dans le système';
                    }
                ?>
                </p>
        </div>
        <div class="flex justify-between">
            <div>
            <?php if(isset($_POST['submit']) && ! empty($_SESSION['flash_message']))
            {
            ?>
                <div id='flash-message' class='pl-4  shadow-lg leading-5 rounded bg-white text-red-500 text-[16px] transition-opacity duration-500 ease-in'><?php echo $_SESSION['flash_message']?></div>
            <?php

            }
            ?>  
            </div>   
            <p class="bg-blue-500 text-white px-5 mb-5 shadow-sm rounded text-center text-base " >
                <a id="add_product" class="cursor-pointer"> Ajouter un produit</a> 
            </p>  
        </div>
        <div>
            <?php 
            //search page
            if(isset($_POST['save']))
            {
                require_once('search_admin.php');
            }?>
        </div>
        <div id="products" class=" flex flex-wrap gap-6 " style="height:500px; overflow:auto;">
            <?php  
                
                $stmt=$bdd->query("SELECT p.id, p.titre,SUBSTRING( p.contenu ,1,27) AS description ,p.filename,p.prix,c.nom FROM produits p,categories c where p.cat_id=c.cat_id"); 
                $products=$stmt->fetchAll(PDO::FETCH_ASSOC);
                if($stmt->rowCount() > 0){
                    foreach($products as $row){
                        ?>                              
                            <div class="product shadow-sm p-3   w-[270px] border bg-white">
                                <div class="flex justify-between">
                                    <h1 class=" mb-3   text-blue-500">
                                        <?php echo $row['titre']; ?>
                                    </h1>
                                    <p class="text-gray-400"><?php echo $row['nom'];?></p>
                                </div> 
                                <div class="flex mt-1 gap-10">
                                    <img class="rounded   w-[250px] h-[250px] object-cover " src="../admin/image_produits_db/<?php echo $row['filename']; ?>">          
                                </div>
                                <div>
                                    <?php
                                        echo $row['description'].'...'; 
                                    ?> 
                                </div>
                                <div>
                                    <?php
                                        echo $row['prix']."$"; 
                                    ?> 
                                </div>
                                <div class="flex  gap-5">
                                    <div class="delete-block">
                                        <a href="#" class="delete" data-product-id="<?php echo $row['id']; ?>"><img src="icones/delete.png" alt="icone supprimer" width="30px" title="Supprimer"></a>
                                        <?php
                                        //Appelle a la fonction pour afficher un popup 
                                            popup_window_delete_product($row);
                                        ?>
                                    </div>
                                    <a  href="edit.php?id=<?php echo $row['id'];?>"><img src="icones/edit.png" alt="icone edit" width="30" title="Modifier"></a>
                                    <a href="voir_plus.php?id=<?php echo $row['id']?>"><img src="icones/more.png" alt="Icone voir plus" title="Voir plus" width="30px"></a>
                                </div>
                                
                            </div>
                        <?php  
                    }
                
                }
                else {
                    ?>
                        <p class="text-red-500"><?php echo 'Aucun produit déja ajouté' ?></p>
                    <?php
                }
                $bdd = null;
            ?>                  
        </div>
        <?php require_once('stayActive.php'); ?>
        <?php require_once('popup/script.php')?>
    </div>
</section>
<?php require_once('../../html_partials/footer.html.php'); ?>
