<?php 
$title='Home';
require_once('../../html_partials/public.header.php');
require_once('../../functions.php');
require_once('../../database/db.php'); 
require_once ('../../js/flash.php');
get_element_by_id();
?>

<?php require_once('menu_bar.php');?>
<div class="flex justify-between pr-10">
    <h1 class="ml-10 text-xl mt-4 ">NOS PRODUITS</h1>    
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
<section class="p-10 flex  flex-wrap  gap-6">
<?php  

            $produit = $bdd->query("SELECT p.id, p.titre, SUBSTRING(p.contenu, 1,30) AS description,p.filename,p.prix,c.nom FROM produits p,categories c where p.cat_id=c.cat_id"); 
            if($produit->rowCount() > 0){
                while($row = $produit->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    
                        <div class="shadow-sm p-3 mb-4 border w-[23%] h-[400px]">
                            <div class="flex justify-between">
                                <h1 class=" mb-3   text-blue-500">
                            <?php echo $row['titre']; ?>
                            </h1>
                            <p class="text-gray-400"><?php echo $row['nom'];?></p>
                            </div> 
                            <div class="flex mt-1 gap-10">
                                <img class="rounded object-cover " src="../admin/image_produits_db/<?php echo $row['filename']; ?>">          
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
                            <div class="flex gap-6">
                                <p>
                                    <a class="bg-blue-500 text-white px-2 mb-5 shadow-sm rounded text-center text-base" href="Acheter.php?produit=<?php echo $row['titre']?>">Acheter</a>
                                </p>
                                <p>
                                    <a class="bg-gray-500 text-white px-2 mb-5 shadow-sm rounded text-center text-base" href="voir_en_detail.php?id=<?php echo $row['id']?>">Voir en Detail</a>
                                </p>
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
                    
</section>
<?php  require_once('../../html_partials/public.footer.php');?>