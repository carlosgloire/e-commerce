<?php
 require_once('../../html_partials/public.header.php');
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
                echo '<img class="rounded w-[250px] h-[250px] object-cover ' . $class . '" src="slider/images_categories/' . $filename . '" alt="img' . ($index + 1) . '" />';
            }
        ?>
        <div class="suivant">
            <i class="fas fa-chevron-circle-right"></i>
        </div>
        <div class="precedent">
            <i class="fas fa-chevron-circle-left"></i>
        </div>
    </div>
    <script src="js/slider.js"></script>
<?php require_once('../../html_partials/public.footer.php');
?>
