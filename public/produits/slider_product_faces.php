<?php
require_once('../../database/db.php');
require_once('css/slider_css_productfaces.php');
?>
    <section>
    <div class="slider">
    <?php
            $index=1;
            $class = ($index === 1) ? 'img__slider active' : 'img__slider';
            echo '<img class="   object-cover ' . $class . '"src="../admin/image_produits_db/' .$image_produit .'" alt="img' . ($index + 1) . '" />';
        
        ?>
        <?php
            $stmt = $bdd->prepare("SELECT img FROM product_faces WHERE id=$getid");
            $stmt->execute();
            $imageFilenames = $stmt->fetchAll(PDO::FETCH_COLUMN);
            
            foreach ($imageFilenames as $index => $filename1) { //The variable $index is used as the loop counter in a foreach loop. In PHP, 
                $class = ($index === 2) ? 'img__slider active' : 'img__slider'; //if the index is equal to 1 the class will be seted to img__slider active and being displayed otherwise it will be seted img__slider
                echo '<img class="   object-cover ' . $class . '" src="../admin/product_faces_images/' . $filename1 . '" alt="img' . ($index + 1) . '" />';
            }
        ?>
       <div class="overlay" style="position: absolute;top: 0;left: 0; width: 100%;height: 100%;background: rgba(0, 0, 0, 0.7);">
       </div>
       <div>
            <div class="suivant">
                <i class="fas fa-chevron-circle-right"></i>
            </div>
            <div class="precedent">
                <i class="fas fa-chevron-circle-left"></i>
            </div>
        </div>
    </section>
   
