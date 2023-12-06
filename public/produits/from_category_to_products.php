<?php
    $title='Produits';
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
    require_once('css/pagination_voir-en-detail.php');
    require_once('verificateur.from_category_to_products.php');
?>

<?php require_once('menu_bar.php'); ?>
<section class=" pt-16 mx-auto  p-3">
    <div class="text-center">
         <h1 class="text-xl font-semibold mb-3 mt-2 capitalize"><?php echo $_SESSION['nom']?></h1>

    </div>  
        <div class="flex flex-wrap gap-2 justify-center" id="content">
            <?php
                //Requete pour compter les categories
                $requete=$bdd->prepare("SELECT id, titre,  SUBSTRING(contenu, 1, 27) AS description,filename,prix FROM produits WHERE cat_id='{$_SESSION['cat_id']}' ");
                $requete->execute();
                if($requete->rowCount()> 0)
                {
                    while($result=$requete->fetch()){
                        ?>
                            <aside   class=" mb-3 p-3 rounded bg-white " style="box-shadow: 0px 0px 30px 0px rgb(240 240 240); border: none;">
                                <h1 class="mb-2 text-[#1d2238]">
                                    <?php echo $result['titre']; ?>
                                </h1>
                                <div class=" mb-1 ">
                                    <a  href="voir_en_detail.php?id=<?php echo $result['id'] ?>" >                
                                        <img class="object-cover" src="../admin/image_produits_db/<?php echo $result['filename']; ?>" style="width: 230px;height:230px;">
                                    </a>
                                </div>
                                <div>
                                    <?php
                                    echo $result['description'] . '...';
                                    ?>
                                </div>
                                <div class="flex gap-1 text-medium font-bold">
                                    <p style="color:#1d2238;">
                                    <?php
                                    echo $result['prix'].' '.'$' ;
                                    ?>
                                    </p>
                                </div>
                                <div class="flex gap-4  items-center">
                                        <a  class="bg-[#010e27] text-white px-4  shadow-sm  text-center text-base buy" href="acheter.php?id=<?php echo $result['id']?>"  style="border: 1px solid #010e27;"  >Acheter</a>
                                    <a class="text-[#1d2238]  px-2 hover:bg-[#010e27]  hover:text-[#1d2238]  shadow-sm text-center text-base" href="voir_en_detail.php?id=<?php echo $result['id'] ?>" style="border: 1px solid #1d2238;">Voir en Detail</a>
                                </div>
                            </aside>
                           
                        <?php
                    }
                }
                else{
                    ?>
                        <p class="text-red-500">Aucuns produits déjà  publiés dans  <?php echo $_SESSION['nom']?></p>
                    <?php
                }
            ?>
        </div>   
        <div class="pagination" id="pagination"></div> 
</section>
<script src="js/pagination_products_categories.js"></script>
<?php require_once('../../html_partials/footer.html.php'); ?>
