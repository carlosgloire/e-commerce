<?php
    $title='Categories';
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');

?>

<?php require_once('menu_bar.php'); ?>
<section class=" pt-16 mx-auto p-3">
        <div class="flex justify-between pr-10 text-center p-2">
            <p></p>
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
        <div class="flex flex-wrap gap-3  text-center">
            <?php
                // Query to select categories and count of products in each category
                $query =$bdd->query( "SELECT c.cat_id AS id, c.nom AS category_name,c.img AS category_image, COUNT(p.id) AS product_count FROM categories c LEFT JOIN produits p ON c.cat_id = p.cat_id  GROUP BY c.cat_id ORDER BY category_name ASC");
                $categories=$query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($categories as $category) {
                    $category_name=$category['category_name'];
                    $nombre=$category['product_count'];
                    $id=$category['id'];
                    ?>
                    <a href="from_category_to_products.php?cat_id=<?php echo $id ?>" class="rounded" style="box-shadow: 0px 0px 30px 0px rgb(240 240 240); border: none;">
                        <div class="  rounded bg-white p-3" >
                            <p class=" text-xl"><?php echo $category_name ?></p>
                            <div>
                                <img class="object-cover" src="image_categories/<?php echo $category['category_image']?>" alt="" style="width: 230px;height:230px;">
                            </div>
                            <div class=" gap-2">
                            <p class="text-blue-500 text-2xl font-bold"><?php  echo '<span id="countValue" data-max="' . $nombre . '">' . $nombre . '</span> '; ?></p>
                            <p><?= ' Produit' . ($nombre >=2 ? 's' : '') ;?></p>
                            </div>
                        </div>
                    </a>
                   
                    <?php
                }
            ?>     
        </div>
       
    
</section>
<script src="js/counter.js"></script>
<?php require_once('../../html_partials/footer.html.php'); ?>