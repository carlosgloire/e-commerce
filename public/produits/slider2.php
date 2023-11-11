<?php
require_once('../../database/db.php');
require_once('slider_css.php');
?>
    
    <div class="slider">
        <?php
            $stmt = $bdd->prepare("SELECT filename FROM slider");
            $stmt->execute();
            $imageFilenames = $stmt->fetchAll(PDO::FETCH_COLUMN);
            foreach ($imageFilenames as $index => $filename) {
                $class = ($index === 0) ? 'img__slider active' : 'img__slider';
                echo '<img class=" w-[250px] h-[250px] object-cover ' . $class . '" src="slider/images_categories/' . $filename . '" alt="img' . ($index + 1) . '" />';//($index + 1) is used to create a unique identifier for the alt image1=img0,...
            }
        ?>
        <div class="suivant">
            <i class="fas fa-chevron-circle-right"></i>
        </div>
        <div class="precedent">
            <i class="fas fa-chevron-circle-left"></i>
        </div>
    </div>
    

