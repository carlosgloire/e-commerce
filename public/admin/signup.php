<?php
    $title='Enregistrement admin ';
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
    require_once('verificateur.signup.php');
    if(is_post()){
    require_once('verificateur.signup.php');
    }
    ?>
<div class='max-w-lg mx-auto p-12 pl-24 pr-24 mt-[5%] text-lg rounded-lg shadow-lg text-gray-950 '>
    <h1 class=" text-3xl mb-4 font-medium" >Enregistrement admin</h1>
  <form action="" method='post' class='mb-2'>
    <div class='grid'>
        <label for="username">Noms d'utilisateur</label>
        <input class="rounded mb-2 w-full border-[1px] border-black px-3" type="text" name='username' value='<?php echo $name; ?>'>
    </div>
    <div class='grid'>
        <label for="mail">Mail</label>
        <input class="rounded mb-2 w-full border-[1px] border-black px-3" type="mail" name='mail' value='<?php echo $mail; ?>'>
    </div>
    <div class='grid mb-2'> 
        <label for="password" method='password'>Mot de passe</label>
        <input class="rounded  w-full border-[1px] border-black px-3" type="password" name='password'>
    </div>
    <div class='grid mb-4'> 
        <label for="password" method='password'> Repeter le mot de passe</label>
        <input class="rounded  w-full border-[1px] border-black px-3" type="password" name='password2'>
    </div>
    <input class='bg-gray-700  text-white mt-2 p-x-20 w-full rounded font-medium hover:bg-gray-900 ' type="submit" name='submit' value='Enregistrer'>
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
<?php require_once('../../html_partials/footer.html.php'); ?>