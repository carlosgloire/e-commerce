<?php
    $title='Moifier un produit';
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
    require_once('verificateur.edit_product.php');
    if(is_post()){
    require_once('verificateur.edit_product.php');
    }
    
    ?>
  
<div class='max-w-lg mx-auto p-12 pl-24 pr-24 bg-white  text-lg rounded-lg shadow-lg text-gray-950 '>
    <h1 class=" text-3xl mb-4 font-medium" >Modifier "<?php echo $titre ?>"</h1>
  <form action="" method='post' class='mb-2'  enctype="multipart/form-data">
  <div class='grid'>
        <label for="image">Image du produit</label>
        <div class=" items-center">
            <?php
                    require_once('../user/photo.php');
                ?>  
                    <div class="user">
                        <div  class="custom-file-input">
                            <input  name="uploadfile" type="file" enctype="multipart/form-data" id="fileInput" class="hidden">
                            <label  for="fileInput">
                            <div class="text">
                                <p class="flex gap-2">
                                    <img class="rounded-[50%] border " src="../admin/image_produits_db/<?php echo $image?>" width="100px" height="100px">
                                </p> 
                            </div>
                            </label>
                        </div>
                    </div>
                <?php
            ?>
        </div>
    </div>
    <div class='grid'>
        <label for="titre">Titre du produit</label>
        <input class="rounded bg-gray-100 mb-2 w-full border-[1px] border-black px-3" type="text" name='titre' value='<?php echo $titre ?>'>
    </div>
    <div class='grid'>
        <label for="mail">Description</label>
        <textarea class="rounded bg-gray-100 mb-2 w-full border-[1px] border-black px-3"  name="contenu" id="contenu" cols="10" rows="2"><?php echo $description ?></textarea>
    </div>
    <div class='grid'>
        <label for="size">Sizes</label>
        <input class="rounded bg-gray-100 mb-2 w-full border-[1px] border-black px-3" type="text" name='size' value='<?php echo $size ?>'>
    </div>
     <div class="grid">
        <label for="categorie"> Sélectionner la categorie</label>
        <select name="categorie"  id="categorie"  class="rounded bg-gray-100 mb-2 w-full border-[1px] border-black px-3">
            <?php
                $query = $bdd->prepare("SELECT cat_id, nom FROM categories ORDER BY nom ASC");
                $query->execute();
                $categories = $query->fetchAll();
            foreach ($categories as $category) {
            ?>
                <option value='<?php echo $category['cat_id'] ?> '> <?php echo $category['nom'] ?> </option>
            <?php    
            }
            ?>
        </select>
    </div>
    <div class='grid'>
        <label for="stock">Nombre en stock</label>
        <input class="rounded mb-2 w-full border-[1px] bg-gray-100 border-black px-3" type="number" name='stock' value='<?php echo $stock; ?>'>
    </div>
    <div class='grid'>
        <label for="prix">prix du produit</label>
        <input class="rounded mb-2 w-full border-[1px] bg-gray-100 border-black px-3" type="number" name='prix' value='<?php echo $prix; ?>'>
    </div>
    <input class='bg-gray-700  text-white p-x-20 w-full rounded font-medium hover:bg-gray-900 ' type="submit" name='modify' value='Modifier'>
</form>
<?php if(isset($_POST['modify']) && ! empty($_SESSION['flash_message']))
{
?>
    <div id='flash-message' class='text-center  shadow-lg leading-5 rounded bg-white text-red-500 text-[16px] transition-opacity duration-500 ease-in'><?php echo $_SESSION['flash_message']?></div>
<?php

}
?> 
</div>

<?php require_once('../../html_partials/footer.html.php'); ?>
