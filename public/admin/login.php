<?php
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
    if(is_post()){
    require_once('verificateur.login.php');
    }
    $title='Connexion Admin';
?>
<?php partial('header',['title'=>$title]);?>
<div class='max-w-lg mx-auto p-12 pl-24 pr-24 bg-gray-200 mt-[10%] text-lg rounded-lg shadow-lg text-gray-950'>
    <h1 class="text-3xl mb-6 font-medium" >Connexion admin</h1>
  <form action="" method='post' class='mb-2'>
    <div class='grid'>
        <label for="username">Nom d'utilisateur ou Email</label>
        <input class="rounded mb-4 w-full border-[1px] border-black px-3" type="text" name='username'>
    </div>
    <div class='grid'> 
        <label for="password" method='password'>Mot de passe</label>
        <input class="rounded mb-6 w-full border-[1px] border-black px-3 " type="password" name='password'>
    </div>
    <input class='bg-gray-700 text-white p-x-20 w-full rounded font-medium hover:bg-gray-900' type="submit" name='submit' value='Connexion'>
</form> 
<?php if(isset($_POST['submit']) && ! empty($_SESSION['flash_message']))
{
?>
    <div id='flash-message' class='pl-4 leading-5 shadow-lg rounded bg-white text-red-500 text-[16px] transition-opacity duration-500 ease-in'><?php echo $_SESSION['flash_message']?></div>
<?php

}
?> 
</div>

<?php partial('footer');?>
