<?php
    $title='Produits/Admin ';
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
?>
<?php require_once('verificateur.admin.php');?>
<?php require_once('header.admin.php'); ?>
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
                        echo $nombre['id'].' produits';
                    }
                ?>
                </p>
        </div>
        <div class="flex justify-between">
            <h1 class="text-xl font-semibold mb-3 "></h1> 
            <p class="bg-blue-500 text-white px-5 mb-5 shadow-sm rounded text-center text-base " >
                <a  href="categories.php"> Ajouter un produit</a> 
            </p>  
        </div>
      
            
            <div class=" flex  flex-wrap  gap-6">
                <?php  
                
                            $produit = $bdd->query("SELECT p.id, p.titre,SUBSTRING( p.contenu ,1,22) AS description ,p.filename,p.prix,c.nom FROM produits p,categories c where p.cat_id=c.cat_id"); 
                            if($produit->rowCount() > 0){
                                while($row = $produit->fetch(PDO::FETCH_ASSOC)){
                                    ?>
                                    
                                        <div class="shadow-sm p-3 mb-4 border  ">
                                            <div class="flex justify-between">
                                                <h1 class=" mb-3   text-blue-500">
                                            <?php echo $row['titre']; ?>
                                            </h1>
                                            <p class="text-gray-400"><?php echo $row['nom'];?></p>
                                            </div> 
                                            <div class="flex mt-1 gap-10">
                                                <img class="rounded   w-[270px] h-[270px] object-cover " src="../admin/image_produits_db/<?php echo $row['filename']; ?>">          
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
                                            <div class="flex mt-5 gap-5">
                                               <a  href="edit.php?id=<?php echo $row['id'];?>"><img src="icones/edit.png" alt="icone edit" width="30" title="Modifier"></a>
                                                <form action="delete.product.php?id=<?php echo $row['id'];?>" method="POST">
                                                <button  ><img src="icones/delete.png" alt="icone supprimer" width="30px" title="Supprimer"></button> 
                                                </form>
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
    </div>
</section>

<?php require_once('../../html_partials/footer.html.php'); ?>
