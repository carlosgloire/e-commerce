<?php
    $title='Produits ';
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
?>
<?php

require_once('verificateur.admin.php');
?>
<?php require_once('header.admin.php'); ?>
<section class="grid grid-cols-5" >
    <?php require_once('navbar.php');?>
    <div class="col-span-4 p-6">
        <div class="flex justify-between">
            <h1 class="text-2xl font-bold mb-3 ">PRODUITS</h1> 
            <p class="bg-blue-500 text-white px-5 mb-10 shadow-sm rounded text-center text-base " >
                <a  href="add_product.php">Add a product</a> 
            </p>  
        </div>
        <?php
            
        $produit = $bdd->query("SELECT * FROM produits"); 
        if($produit->rowCount() > 0){
            while($row = $produit->fetch(PDO::FETCH_ASSOC)){
                ?>
             
                <div class="shadow-sm p-6 mb-4 border"> 
                   <h1 class="text-2xl mb-3  font-medium text-blue-500">
                       <?php echo $row['titre']; ?>
                   </h1>
                   <div>
                       <div>
                          <?php
                               echo $row['contenu']; 
                          ?> 
                       </div>
                      <div class="flex mt-10 gap-10">
                            <p class="border px-2 bg-blue-500 text-white"><a  href="edit.php?id=<?php echo $row['id'];?>">Modifier</a>
                            <form action="delete.product.php?id=<?php echo $row['id'];?>" method="POST">
                               <button class="border px-4 bg-blue-500 text-white" >Supprimer</button> 
                            </form>
                            
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
              
    </div>
</section>

<?php require_once('../../html_partials/footer.html.php'); ?>
