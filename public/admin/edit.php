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
  
<div class='max-w-lg mx-auto p-12 pl-24 pr-24 bg-gray-200 mt-[10%] text-lg rounded-lg shadow-lg text-gray-950 '>
    <h1 class=" text-3xl mb-4 font-medium" >Modifier "<?php echo $titre ?>"</h1>
  <form action="" method='post' class='mb-2'  enctype="multipart/form-data">
    <div class='grid'>
        <label for="titre">Titre du produit</label>
        <input class="rounded mb-2 w-full border-[1px] border-black px-3" type="text" name='titre' value='<?php echo $titre ?>'>
    </div>
    <div class='grid'>
        <label for="titre">Image du produit</label>
        <input class="rounded mb-2 w-full border-[1px] border-black px-3"  type="file" name="uploadfile" enctype="multipart/form-data"  required>
    </div>
    <div class='grid'>
        <label for="mail">Description</label>
        <textarea class="rounded mb-2 w-full border-[1px] border-black px-3"  name="contenu" id="contenu" cols="10" rows="2"><?php echo $description ?></textarea>
    </div>
     <div class="grid">
        <label for="categorie"> Sélectionner la categorie</label>
        <select name="categorie" id="categorie"  class="rounded mb-2 w-full border-[1px] border-black px-3">
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
        <label for="titre">prix du produit</label>
        <input class="rounded mb-2 w-full border-[1px] border-black px-3" type="number" name='prix' value='<?php echo $prix; ?>'>
    </div>
    <input class='bg-gray-700  text-white p-x-20 w-full rounded font-medium hover:bg-gray-900 ' type="submit" name='modify' value='Modifier'>
</form>
<?php if(isset($_POST['modify']) && ! empty($_SESSION['flash_message']))
{
?>
    <div id='flash-message' class='pl-4  shadow-lg leading-5 rounded bg-white text-red-500 text-[16px] transition-opacity duration-500 ease-in'><?php echo $_SESSION['flash_message']?></div>
<?php

}
?> 
</div>
<?php require_once('../../html_partials/footer.html.php'); ?>
