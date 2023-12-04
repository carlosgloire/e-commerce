<?php
    $title='Product Faces ';
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flass-succes.php');
    require_once('verificateur.product_faces.php');
    
?>
<?php

require_once('verificateur.admin.php');
?>
<?php require_once('header.admin.php'); ?>
<section class=" pt-16" >

    <h1 class="text-xl  mb-1 text-center">DIFFERENTES FACES D'UN PRODUIT</h1>         

     <?php if(isset($_POST['add']) && ! empty($_SESSION['flash_message']))
    {
    ?>  <div class="text-center mt-[3%] ">
            <div id='flash-message-succes' class='pl-4 leading-5 shadow-lg text-green-500 rounded bg-white green-red-500 text-[16px] transition-opacity duration-500 ease-in max-w-lg mx-auto '><?php echo $_SESSION['flash_message']?></div>
        </div>
    <?php
    }
    ?>  
<div class='max-w-lg mx-auto p-12 pl-24 pr-24 bg-white mt-2 text-lg rounded-lg  ' style="box-shadow: 0px 0px 30px 0px rgb(240 240 240); border: none;">
   
    <form action="" method='post' enctype="multipart/form-data" class='mb-2'>
    
        <div class='grid mb-5'>
            <label for="titre" class="mb-2">Sélectionner l'image</label>
            <input class="rounded  w-full border-[1px] bg-gray-100 border-black px-3" type="file" name="uploadfile" enctype="multipart/form-data" required>
        </div>
       
        <input class='bg-gray-700  text-white p-x-20 w-full rounded font-medium hover:bg-gray-900 ' type="submit" name='add' value='Ajouter'>
    </form>
</div>        
</section>
<?php require_once('stayActive.php'); ?>
