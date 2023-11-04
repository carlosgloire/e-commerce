<?php 
$title='Home';
require_once('../../html_partials/public.header.php');
require_once('../../functions.php');
require_once('../../database/db.php'); 
require_once ('../../js/flash.php');
require_once('../user/verificateur.login.php');
require_once('../user/verificateur.user.php');
require_once('css/pagination_css.php');


?>

<?php require_once('../user/menu_bar_user.php');?>
<div class="justify-between flex  pt-16 mb-2">
    <div class="p-10">
        <p class="text-gray-500 ">
            <?php
                //Requete pour compter les produits
                $requete=$bdd->prepare("SELECT count('id') AS id FROM produits");
                $requete->execute();
                while($nombre=$requete->fetch()){
                    echo $nombre['id'].' produits publiés';
                }
            ?>    
        </p>
    </div>
    <div style="margin-top:40px ;">
        <h1 class="ml-10 text-xl  font-medium text-center">NOS PRODUITS</h1>
    </div>
    <div class="shadow-sm mt-2 p-3 border rounded flex items-center gap-4  bg-white">
        <?php
        // user block
            $requete=$bdd->query("SELECT * FROM users WHERE username = '{$_SESSION['username']}' OR mail='{$_SESSION['username']}' AND password ='{$_SESSION['password']}'");
            if($requete->rowCount() > 0){
               
                while($user = $requete->fetch(PDO::FETCH_ASSOC)){
                ?>  
                        <div>
                            <a href="../user/settings.php"><img src="../user/images/setting.png" alt="" width="20px" title="Parametres"></a>
                            <div class="flex justify-between gap-4">
                                <p>
                                    <?php echo $user['username']?>
                                </p>
                                <p class=" items-center">
                                    <?php
                                       if(($user['filename'])!=' ' AND ! empty($user['filename'])){
                                        ?>
                                            <img class="rounded-[60px] border " src="../user/user_images/<?php echo $user['filename']; ?>" width="40px">
                                        <?php
                                       }
                                       else{
                                        ?>
                                            <img src="../user/images/user.PNG" class="rounded-[50px] border "  alt="Default image user" title="Ajoutez une photo de profil pour permettre une identification simple" width="35px">
                                        <?php
                                       }
                                    ?>
                                </p>
                            </div>
                            <p class="text-gray-500 text-sm"><?php echo $user['mail']?></p>
                        </div>
            
        <div>
        <form action="" method="post">
                <button name="logout2"><img src="../user/images/logoout.png" alt="" width="30px" title="Déconnexion <?php echo $user['username']?>"></button>
        </form>
        </div>
        <?php
                }
                }
            
        ?>
    </div>
</div>


<?php
// Requête SQL pour sélectionner toutes les catégories et leurs produits associés
$stmt = $bdd->query("SELECT c.cat_id, c.nom AS category_name, p.id, p.titre, SUBSTRING(p.contenu, 1, 27) AS description, p.filename, p.prix FROM produits p LEFT JOIN categories c ON c.cat_id = p.cat_id ORDER BY category_name ASC");
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$currentCategory = null;//aide à déterminer quand fermer le conteneur flexible de la catégorie précédente, afficher le nom de la catégorie comme en-tête de la nouvelle catégorie et ouvrir un nouveau conteneur flexible pour les produits de la catégorie actuelle.
$categories = []; //stocker et organiser les produits selon leurs catégories respectives

foreach ($result as $row) {
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
        echo "<h2 class='text-xl pl-4 font-semibold mt-4 mb-2'>$categoryName</h2>";
        echo "<section class='px-4 flex flex-wrap  gap-6' id='content$categoryName'>";
        $currentCategory = $categoryName;
    }

    displayProduct($row);
}
//Après la boucle, nous aurons un tableau où chaque clé de catégorie pointe vers un tableau de produits appartenant à cette catégorie.
echo "</section>"; // Close the last category flex container
displayCategoryPagination($currentCategory);//Displaying the last pagination
?>

<section>

    <?php require_once('comments_users.php') ?>
</section>
<?php 
    require_once('pagination.php');
    require_once('../../html_partials/public.footer.php');
?>

