<?php
    $title='Connexion utilisateur';
    require_once('../../html_partials/public.header.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
    require_once('verificateur.login.php');
    if(is_post()){
    require_once('verificateur.login.php');
    }
    ?>
    
    <div class='max-w-lg mx-auto py-4 pl-24 pr-24  mt-[10%] text-lg rounded-lg  shadow-sm bg-white' style="box-shadow: 0px 0px 30px 0px rgb(240 240 240); border: none;">
      <p class=""><img class="mx-auto   items-center" src="../produits/images/gs_logo.png" alt="Logo Glory Shop" width="60px"></p>
      <h1 class="text-3xl mb-6 " >Connexion utilisateur</h1>
      <form action="" method='post' class='mb-2'>
        <div class='grid'>
            <label for="username">Nom d'utilisateur ou Email</label>
            <input class="rounded mb-4 w-full outline-none border-[1px] border-gray-400 bg-gray-100 px-3" type="text" name='username'  value="<?php echo $username; ?>" >
        </div>
        <div class='grid'> 
            <label for="password" method='password'>Mot de passe</label>
            <input class="rounded mb-6 w-full border-[1px] border-gray-400 px-3 bg-gray-100" type="password" name='password'>
        </div>
        <input class='bg-gray-500 text-white p-x-20 w-full rounded font-medium hover:bg-gray-700' type="submit" name='submit' value='Connexion'>
    </form> 

    <p class="text-base">N'avez-vous pas un compte? <a class="hover:bg-transparent text-blue-600 text-base pl-0" href="signup.php">inscrivez-vous</a> </p>
    </div>
    <?php if(isset($_POST['submit']) && ! empty($_SESSION['flash_message']))
    {
    ?>
        <div id='flash-message' class='pl-4 leading-5 shadow-lg mt-1 rounded bg-white text-red-500 text-[16px] transition-opacity duration-500 ease-in max-w-lg mx-auto '><?php echo $_SESSION['flash_message']?></div>
    <?php
    }
    ?> 
   <?php require_once('../../html_partials/public.footer.php');?>
  