<?php
    $title='Categories/Admin ';
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
        <div class="flex justify-between pr-10">
            <h1 class="text-xl font-semibold mb-3 ">CATEGORIES</h1>    
                <p class="text-gray-500">
                <?php
                        //Requete pour compter les categories
                        $requete=$bdd->prepare("SELECT count('cat_id') AS cat_id FROM categories");
                        $requete->execute();
                    while($nombre=$requete->fetch()){
                        echo $nombre['cat_id'].' categories';
                    }
                ?>
                </p>
        </div>
        <?php       
              $categories= $bdd->query("SELECT * FROM categories"); 
              if($categories->rowCount() > 0){
                    while($row = $categories->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <a  href="add_product.php?cat_id=<?php  echo $row['cat_id']?>">                    
                            <div class="mb-2">
                            <div class="bg-white shadow-sm border rounded p-3">
                                <p ><?php echo $row['nom'] ?></p>
                            </div>
                            </div>
                        <?php  
                
                    }
                        
                        }
                        else {
                        ?>
                        <p class="text-gray-500"><?php echo 'Aucune categorie ajouté' ?></p>
                        <?php
                        }
                        $bdd = null;
                    ?>                  
                </a>      
    </div>
</section>
<?php require_once('stayActive.php'); ?>
<?php require_once('../../html_partials/footer.html.php'); ?>