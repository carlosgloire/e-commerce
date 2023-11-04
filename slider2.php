<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
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


</body>
</html>