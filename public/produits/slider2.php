<?php
require_once('../../database/db.php');
require_once('css/slider_css.php');
?>
    <section>
    <div class="slider">
        <?php
            $stmt = $bdd->prepare("SELECT filename FROM slider");
            $stmt->execute();
            $imageFilenames = $stmt->fetchAll(PDO::FETCH_COLUMN);
            
            foreach ($imageFilenames as $index => $filename) {
                $class = ($index === 0) ? 'img__slider active' : 'img__slider';
                echo '<img class=" w-[250px] h-[250px] object-cover ' . $class . '" src="slider/images_categories/' . $filename . '" alt="img' . ($index + 1) . '" />';
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
   
