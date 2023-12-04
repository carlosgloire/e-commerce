<?php
    $title='Inscription ';
    require_once('../../html_partials/public.header.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
    require_once('verificateur.signup.php');
    if(is_post()){
    require_once('verificateur.signup.php');
    }
    ?>

<div class='max-w-lg mx-auto py-4 pl-24 pr-24 mt-6 items-center justify-center text-lg rounded-lg  shadow-sm bg-white' style="box-shadow: 0px 0px 30px 0px rgb(240 240 240); border: none;">
    <p class=""><img class="mx-auto   items-center" src="../produits/images/gs_logo.png" alt="Logo Glory Shop" width="60px"></p>
    <h1 class=" text-3xl mb-4 " >Inscription utilisateur</h1>
  <form action="" method='post' class='mb-2' enctype="multipart/form-data">
    <div class='grid'>
        <label for="username">Noms d'utilisateur</label>
        <input class="rounded mb-2 w-full border-[1px] border-gray-400 bg-gray-100 px-3" type="text" name='username' value='<?php echo $name; ?>'>
    </div>
    <div class='grid'>
        <label for="mail">Mail</label>
        <input class="rounded mb-2 w-full border-[1px] border-gray-400 px-3 bg-gray-100 " type="mail" name='mail' value='<?php echo $mail; ?>'>
    </div>
    <div>
        <label for="numero">Numéro de Télephone</label>
        <input class="rounded mb-2 w-full border-[1px] border-gray-400  px-3 bg-gray-100 " type="phone" name="phone" value="<?php echo $phone?>">
    </div>
    <div>
        <label for="photo">Photo de profil</label>
        <input class="rounded mb-2 w-full border-[1px] border-gray-400  px-3 bg-gray-100 " name="uploadfile" type="file" enctype="multipart/form-data">
    </div>
    <div class='grid mb-2'> 
        <label for="password" >Mot de passe</label>
        <input class="rounded  w-full border-[1px] border-gray-400 bg-gray-100   px-3" type="password" name='password'>
    </div>
    <div class='grid mb-4'> 
        <label for="password" > Repeter le mot de passe</label>
        <input class="rounded  w-full border-[1px] border-gray-400 bg-gray-100   px-3" type="password" name='password2'>
    </div>
    <input class='bg-gray-500  text-white mt-2 p-x-20 w-full rounded font-medium hover:bg-gray-700 ' type="submit" name='submit' value='Enregistrer'>
    <p class="text-base">Avez-vous un compte? <a class="hover:bg-transparent text-blue-600 text-base pl-0" href="login.php">connectez-vous</a> </p>
</form>
<?php if(isset($_POST['submit']) && ! empty($_SESSION['flash_message']))
{
?>
    <div id='flash-message' class='pl-4  shadow-lg leading-5 rounded bg-white text-red-500 text-[16px] transition-opacity duration-500 ease-in'><?php echo $_SESSION['flash_message']?></div>
<?php

}
?> 
</div>
<?php
require_once('../../html_partials/public.footer.php');
?>