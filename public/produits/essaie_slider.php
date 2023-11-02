<?php 
$title='Acceuil';
require_once('../../html_partials/public.header.php');
require_once('../../functions.php');
require_once('../../database/db.php'); 
require_once ('../../js/flash.php');
require_once('css/pagination.php');

?>


    <div class="">
        <?php require_once('menu_bar.php');?>
    </div>

<div class="flex justify-between pr-10 pt-16 ">
    <p></p>
    <h1 class="ml-10 text-xl mt-4 mb-4 font-medium ">NOS PRODUITS</h1> 
    <?php if(isset($_POST['acheter']) && ! empty($_SESSION['flash_message']))
    {
   ?>
        <div id='flash-message' class='pl-4 leading-5 shadow-lg mt-1 rounded bg-white text-red-500 text-[16px] transition-opacity duration-500 ease-in max-w-lg mx-auto '><?php echo $_SESSION['flash_message']?></div>
    <?php
    }
    ?>   
     <p class="text-gray-500">
        <?php
              //Requete pour compter les produits
              $requete=$bdd->prepare("SELECT count('id') AS nombre FROM produits");
              $requete->execute();
            while($nombre=$requete->fetch()){
                if($nombre['nombre']< 1)
                echo $nombre['nombre'].' produit publié';
                else{
                    echo $nombre['nombre'].' produits publiés';
                }
            }
        ?>
     </p>
</div>
<div class="mb-2  w-full">
        <?php require_once('slider2.php')?>
        
</div>
<?php
    // SQL query to select all categories and their associated products
    $stmt = $bdd->query("SELECT c.cat_id, c.nom AS category_name, p.id, p.titre, SUBSTRING(p.contenu, 1, 27) AS description, p.filename, p.prix FROM produits p LEFT JOIN categories c ON c.cat_id = p.cat_id ORDER BY c.cat_id, p.id");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $currentCategory = null;

    foreach ($result as $row) {
        $categoryName = $row['category_name'];

        // If a new category is encountered, display the category name
        if ($currentCategory !== $categoryName) {
            if ($currentCategory !== null) {
                echo "</section>"; // Close the previous category flex container
            }
            ?>
                <h2 class='text-xl pl-4 font-semibold mt-4 mb-2 '><?php echo $categoryName ?></h2>
                <section class=" " id="content">
                    <div class=" px-4     gap-6"  style="overflow: auto; width:100%;display:flex;border:1px solid red">
                            <?php
                            $currentCategory = $categoryName;
                        }
                        ?>

                        <aside class="shadow-sm p-3 mb-4 border rounded bg-white " style="width: 500px;">
                            <div class="flex justify-between">
                                <h1 class="mb-3 text-blue-500">
                                    <?php echo $row['titre']; ?>
                                </h1>
                                <p class="text-gray-400"><?php echo $row['category_name']; ?></p>
                            </div>
                            <div class="flex mt-1 gap-10">
                                <img class="rounded w-[250px] h-[250px] object-cover" src="../admin/image_produits_db/<?php echo $row['filename']; ?>">
                            </div>
                            <div>
                                <?php
                                echo $row['description'] . '...';
                                ?>
                            </div>
                            <div class="flex gap-1 ">
                                <p>
                                <?php
                                echo $row['prix'] ;
                                ?>
                                </p>
                                <p class="items-center text-blue-500">$</p>
                            </div>
                            <div class="flex gap-6">
                                <form action="acheter.php" method="post">
                                    <button class="bg-blue-400 text-white px-2 mb-5 shadow-sm rounded text-center text-base" name="acheter">Acheter</button>
                                </form>
                                <p>
                                    <a class="bg-gray-500 text-white px-2 py-[3px] mb-5 shadow-sm rounded text-center text-base" href="voir_en_detail.php?id=<?php echo $row['id'] ?>">Voir en Detail</a>
                                </p>
                            </div>
                        </aside>
                            <?php
                            }
                        ?>
                    </div>
                </section>
                <section style="text-align:center;justify-content:center;" class="pagination" id="pagination"></section>  
                <?php
    ?>


    <section>
        <?php require_once('comments_users.php') ?>
    </section>
<script src="js/pagination.js"></script>
<?php  require_once('../../html_partials/public.footer.php');?>