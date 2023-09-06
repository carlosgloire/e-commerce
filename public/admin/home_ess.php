<?php 
$title='Home';
require_once('../../html_partials/public.header.php');
require_once('../produits/menu_bar.php');
require_once('../../functions.php');
require_once('../../database/db.php'); 
require_once ('../../js/flash.php');

?>
   
 
   
        <?php
            
        $produit = $bdd->query("SELECT p.id, p.titre,p.contenu,p.filename,c.nom FROM produits p,categories c where p.cat_id=c.cat_id"); 
        if($produit->rowCount() > 0){
            while($row = $produit->fetch(PDO::FETCH_ASSOC)){
                ?>
                <div class="grid">
                <div class="shadow-sm p-3 mb-4 border ">
                    <div class="flex justify-between">
                        <h1 class="text-2xl mb-3   text-blue-500">
                       <?php echo $row['titre']; ?>
                       </h1>
                       <p class="text-gray-400"><?php echo $row['nom'];?></p>
                    </div> 
                  
                   <div>
                       <div>
                          <?php
                               echo $row['contenu']; 
                          ?> 
                       </div>
                      <div class="flex mt-5 gap-10">
                      <?php require_once('../admin/verificateur.add_product.php');?>
					 <img src="./image_produits_db/<?php echo $row['filename']; ?>" width="30%" height="400px">
                            
                      </div>
                   </div>
                  
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
              
    

<?php
require_once('../../html_partials/public.footer.php');
?>