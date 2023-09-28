<?php
    $title='ajouter un produit';
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
    require_once('verificateur.admin.php');
    require_once('verificateur.categories.php');
    require_once('verificateur.add_product.php'); 
    if(is_post()){
        require_once('verificateur.categories.php');
    }
   
    ?>
 <p class="mt-5 mb-5 mx-auto">
    <a class="bg-blue-500 text-white px-2 py-1 shadow-sm rounded text-center text-base " href="ajouter_images_similaires.php">Ajouter des images similaires</a>
</p>    
<div class='max-w-lg mx-auto p-12 pl-24 pr-24 bg-gray-200 text-lg rounded-lg shadow-lg text-gray-950 '>
    <h1 class=" text-3xl mb-4 font-medium" > Ajouter un produit</h1>
    <form action="" method='post' enctype="multipart/form-data" class='mb-2'>
        <div class='grid'>
            <label for="titre">Titre du produit</label>
            <input class="rounded mb-2 w-full border-[1px] border-black px-3" type="text" name='titre' value='<?php echo $titre; ?>'>
        </div>
        <div class='grid'>
            <label for="titre">Image du produit</label>
            <input class="rounded mb-2 w-full border-[1px] border-black px-3" type="file" name="uploadfile" enctype="multipart/form-data" >
        </div>
        <div class='grid'>
            <label for="mail">Description</label>
            <textarea class="rounded mb-2 w-full border-[1px] border-black px-3"  name="contenu" id="contenu"  rows="2" value='<?php echo $contenu; ?>'></textarea>
        </div>
        <?php
            if($nom == 'Vetements'){
                ?>
        <div class="grid">
            <label for="size">Sizes</label>
            <input  class="rounded mb-2 w-full border-[1px] border-black px-3" type="text" name="size">
        </div>
                <?php
            }
           
        ?>
        <div class='grid'>
            <label for="titre">Nombre en stock</label>
            <input class="rounded mb-2 w-full border-[1px] border-black px-3" type="number" name='stock' value='<?php echo $stock; ?>'>
        </div>
        <div class='grid'>
            <label for="titre">Prix du produit</label>
            <input class="rounded mb-2 w-full border-[1px] border-black px-3" type="number" name='prix' value='<?php echo $prix; ?>'>
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
