<?php
    $title='ajouter une image similaire';
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
    require_once('verificateur.admin.php');
    require_once('verificateur.similar_images.php');
    if(is_post()){
    require_once('verificateur.similar_images.php');
    }
   
    ?>
   
<div class='max-w-lg mx-auto p-12 pl-24 pr-24 bg-gray-200 mt-[10%] text-lg rounded-lg shadow-lg text-gray-950 '>
    <h1 class=" text-3xl mb-4 font-medium" > Images similaires</h1>
    <form action="" method='post' enctype="multipart/form-data" class='mb-2'>
        <div class='grid'>
            <label for="titre">Titre de l'image</label>
            <input class="rounded mb-2 w-full border-[1px] border-black px-3" type="text" name='titre' value='<?php echo $titre; ?>'>
        </div>
        <div class='grid'>
            <label for="titre">couleur</label>
            <input class="rounded mb-2 w-full border-[1px] border-black px-3" type="text" name='color' value='<?php echo $color; ?>'>
        </div>
        <div class='grid'>
            <label for="titre">Image similaire du produit</label>
            <input class="rounded mb-2 w-full border-[1px] border-black px-3" type="file" name="uploadfile" enctype="multipart/form-data" required>
        </div>
        <div class="grid">
            <label for="produit"> Produit</label>
            <select name="produit" id="produit"  class="rounded mb-2 w-full border-[1px] border-black px-3">
                <option value="select">Sélectionner le produit</option>
                <?php
                    $query = $bdd->prepare("SELECT id, titre FROM produits ORDER BY titre ASC");
                    $query->execute();
                    $produits = $query->fetchAll();
                foreach ($produits as $produit) {
                ?>
                    <option value='<?php echo $produit['id'] ?> '> <?php echo $produit['titre'] ?></option>
                <?php    
                }
                ?>
            </select>
        </div>
        <input class='bg-gray-700  text-white p-x-20 w-full rounded font-medium hover:bg-gray-900 ' type="submit" name='add' value='Ajouter'>
    </form>
</div>
<?php if(isset($_POST['add']) && ! empty($_SESSION['flash_message']))
    {
    ?>
        <div id='flash-message' class='pl-4 leading-5 shadow-lg mt-1 rounded bg-white text-red-500 text-[16px] transition-opacity duration-500 ease-in max-w-lg mx-auto '><?php echo $_SESSION['flash_message']?></div>
    <?php
    }
    ?> 
<?php require_once('../../html_partials/footer.html.php'); ?>