<?php
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
    if(is_post()){
        require_once('verificateur.signup.php');
        }  
?>

<?php partial('header',['title'=>'Enregistrement admin']);?>
<div class='max-w-lg mx-auto p-12 pl-24 pr-24 bg-gray-200 mt-[10%] text-lg rounded-lg shadow-lg text-gray-950 '>
    <h1 class=" text-3xl mb-4 font-medium" >Enregistrement admin</h1>
  <form action="" method='post' class='mb-2'>
    <div class='grid'>
        <label for="username">Nom</label>
        <input class="rounded mb-2 w-full border-[1px] border-black px-3" type="text" name='username'>
    </div>
    <div class='grid'>
        <label for="mail">Mail</label>
        <input class="rounded mb-2 w-full border-[1px] border-black px-3" type="mail" name='mail'>
    </div>
    <div class='grid mb-2'> 
        <label for="password" method='password'>Mot de passe</label>
        <input class="rounded  w-full border-[1px] border-black px-3" type="password" name='password'>
    </div>
    <div class='grid mb-4'> 
        <label for="password" method='password'> Repeter le mot de passe</label>
        <input class="rounded  w-full border-[1px] border-black px-3" type="password" name='password2'>
    </div>
    <input class='bg-gray-700  text-white p-x-20 w-full rounded font-medium hover:bg-gray-900 ' type="submit" name='submit' value='Enregistrer'>
</form>
<?php if(isset($_POST['submit']) && ! empty($_SESSION['flash_message']))
{
?>
    <div id='flash-message' class='pl-4  shadow-lg leading-5 rounded bg-white text-red-500 text-[16px] transition-opacity duration-500 ease-in'><?php echo $_SESSION['flash_message']?></div>
<?php

}
?> 
</div>
<?php partial('footer');?>