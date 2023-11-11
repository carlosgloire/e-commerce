<?php 
$title='Home';
require_once('../../html_partials/public.header.php');
require_once('../../functions.php');
require_once('../../database/db.php'); 
require_once ('../../js/flash.php');
require_once('verificateur.login.php');
require_once('verificateur.user.php');
require_once('../produits/css/pagination.php');


?>

<?php require_once('menu_bar_user.php');?>
<div class="pt-16"></div>
<div class=" w-full ">
    <?php  require('../produits/slider2.php')?>
</div>
<div class="flex justify-between pr-10 ">
    <p></p>
    <h1 class="ml-10 text-xl mt-4 mb-4 font-medium">NOS PRODUITS</h1> 
    <?php if(isset($_POST['acheter']) && !empty($_SESSION['flash_message'])) { ?>
        <div id='flash-message' class='pl-4 leading-5 shadow-lg mt-1 rounded bg-white text-red-500 text-[16px] transition-opacity duration-500 ease-in max-w-lg mx-auto '><?php echo $_SESSION['flash_message']?></div>
    <?php } ?>   
    <p class="text-gray-500">
        <?php
        // Requête pour compter le nombre de produits
        $requete = $bdd->prepare("SELECT COUNT(id) AS nombre FROM produits");
        $requete->execute();
        while ($nombre = $requete->fetch()) {
            echo $nombre['nombre'] . ($nombre['nombre'] < 1 ? ' produit publié' : ' produits publiés');
        }
        ?>
    </p>
</div>

<?php
    // Requête SQL pour sélectionner toutes les catégories et leurs produits associés
    $stmt = $bdd->query("SELECT c.cat_id, c.nom AS category_name, p.id, p.titre, SUBSTRING(p.contenu, 1, 27) AS description, p.filename, p.prix FROM produits p LEFT JOIN categories c ON c.cat_id = p.cat_id ORDER BY category_name ASC");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $currentCategory = null;//aide à déterminer quand fermer le conteneur flexible de la catégorie précédente, afficher le nom de la catégorie comme en-tête de la nouvelle catégorie et ouvrir un nouveau conteneur flexible pour les produits de la catégorie actuelle.
    $categories = []; //stocker et organiser les produits selon leurs catégories respectives

    foreach ($result as $row): 
        $categoryName = $row['category_name'];
        // Vérifiez si la catégorie existe dans $categories ; sinon, initialisez-le comme un tableau vide
        if (!isset($categories[$categoryName])) {
            $categories[$categoryName] = [];
        }

        $categories[$categoryName][] = $row; // adding the current product, represented by the $row variable, to the appropriate category within the $categories array

        // Si une nouvelle catégorie est rencontrée, affichez le nom de la catégorie
        if ($currentCategory !== $categoryName) {
            if ($currentCategory !== null) {
                echo "</section>"; // Close the previous category flex container
                displayCategoryPagination($currentCategory);
            }
            echo "<h2 class='text-xl  pl-4 font-medium mt-4 mb-2'>$categoryName</h2>";
            echo "<section class='px-4 flex flex-wrap  gap-6' id='content$categoryName'>";
            $currentCategory = $categoryName;
        }
        displayProduct($row);
    endforeach;
    //Après la boucle, nous aurons un tableau où chaque clé de catégorie pointe vers un tableau de produits appartenant à cette catégorie.
    echo "</section>"; // Close the last category flex container
    displayCategoryPagination($currentCategory);//Displaying the last pagination

?>
<?php require_once('../admin/popup/script.php')?>
<?php require_once('../admin/popup/css_popup.php')?>
<section>
    <?php require_once('../produits/comments_users.php') ?>
</section>
<script src="../produits/js/slider.js"></script>
<script src="../user/popup/script.js"></script>
<?php 
    require_once('../produits/pagination.php');
    require_once('../../html_partials/public.footer.php');
?>

