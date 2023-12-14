<?php
    $title='PRODUITS';
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
    require_once('verificateur.admin.php');
    require_once('popup/css_popup.php')
?>
<?php require_once('header.admin.php');?>
<section class="grid grid-cols-5 pt-16" >
   
    <?php require_once('navbar.php');?>
    <div class="col-span-4 ">
        <div class="flex justify-between p-2">
            <h1 class="text-xl font-semibold  ">PRODUITS</h1>
                <p class="text-gray-500">
                <?php
                    //Requete pour compter les produits
                    $requete=$bdd->prepare("SELECT count('id') AS id FROM produits");
                    $requete->execute();
                    while($nombre=$requete->fetch()){
                        echo $nombre['id'].' Produits dans le système';
                    }
                ?>
                </p>
        </div>
        <div class="flex justify-between">
            <div>
            <?php if(isset($_POST['submit']) && ! empty($_SESSION['flash_message']))
            {
            ?>
                <div id='flash-message' class='pl-4  shadow-lg leading-5 rounded bg-white text-red-500 text-[16px] transition-opacity duration-500 ease-in'><?php echo $_SESSION['flash_message']?></div>
            <?php

            }
            ?>  
            </div>   
            <p class="bg-[#1d2238] text-white px-5  shadow-sm rounded text-center text-base mr-2" >
                <a id="add_product" class="cursor-pointer"> Ajouter un produit</a> 
            </p>  
        </div>
        <div class="px-3 gap-2">
            <?php 
            //search page
            if(isset($_GET['save']))
            {
                require_once('search_admin.php');
            }?>
        </div>
        <?php
    // Requête SQL pour sélectionner toutes les catégories et leurs produits associés
    $stmt = $bdd->query("SELECT c.cat_id, c.nom AS category_name, p.id, p.titre, SUBSTRING(p.contenu, 1, 27) AS description, p.filename, p.prix FROM produits p LEFT JOIN categories c ON c.cat_id = p.cat_id ORDER BY category_name ASC,titre ASC");
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
            echo "<h2 class='text-xl pl-4 font-semibold  mb-2'>$categoryName</h2>";
            echo "<section class=' flex flex-wrap px-3  gap-2' id='content$categoryName'>";
            $currentCategory = $categoryName;
        }
        displayProduct_admin($row);
    endforeach;
    //Après la boucle, nous aurons un tableau où chaque clé de catégorie pointe vers un tableau de produits appartenant à cette catégorie.
    echo "</section>"; // Close the last category flex container
    displayCategoryPagination($currentCategory);//Displaying the last pagination

?>
        <?php 
            require_once('admin_pagination.php'); 
            require_once('../produits/css/pagination.php')
        ?>
        <?php require_once('stayActive.php'); ?>
        <?php require_once('popup/script.php')?>
    </div>
</section>
<?php require_once('../../html_partials/footer.html.php'); ?>
