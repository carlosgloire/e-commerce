<?php 
$title='Parametres';
require_once('../../html_partials/public.header.php');
require_once('../../functions.php');
require_once('../../database/db.php'); 
require_once ('../../js/flash.php');
require_once('verificateur.user.php');
require_once('verificateur.settings.php');
if(is_post()){
    require_once('verificateur.settings.php'); 
}

?>

<?php require_once('menu_bar_user.php');?>
<section class="grid grid-cols-5 justify-between">
    <nav class=" shadow-lg col-span-1 border  pt-16 h-[100vh] bg-white">
        <aside class="grid gap-4 mt-6 ">
        <div class="flex items-center mx-auto">
            <p>
                <img class="opacity-50" src="../produits/images/compte (2).png" alt="" width="30px">
            </p>
            <p class="text-gray-400">Mon compte</p>
        </div>   
        <div class="mx-auto">
            <a href="#">Mon profil</a>
        </div>
        </aside>   
    </nav>
    <section class="col-span-4">
            
        <div class="justify-between flex pt-16">
            <div>

            </div>
            <div class="shadow-sm mt-2 p-3 border rounded flex items-center gap-4 bg-white">
                <?php
                    $requete=$bdd->query("SELECT * FROM users WHERE username = '{$_SESSION['username']}' OR mail='{$_SESSION['username']}'");
                    if($requete->rowCount() > 0){
                        
                        while($user = $requete->fetch(PDO::FETCH_ASSOC)){
                            $id=$user['user_id'];
                        ?>      
                                <div>
                                
                                    <div class="flex justify-between gap-4">
                                        <p>
                                            <?php echo $user['username']?>
                                        </p>
                                        <p class=" items-center">
                                            <?php
                                            if(($user['filename'])!=' ' AND ! empty($user['filename'])){
                                                ?>
                                                    <img class="rounded-[50%] border " src="user_images/<?php echo $user['filename']; ?>" width="40px" height="40px">
                                                <?php
                                            }
                                            else{
                                                //Photo de profil par defaut
                                                ?>
                                                    <img class="rounded-[50%] border " src="./images/user.PNG" alt="Default image user" title="Ajoutez une photo de profil pour permettre une identification simple" width="40px" height="40px">
                                                <?php
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <p class="text-gray-500 text-sm"><?php echo $user['mail']?></p>
                                </div>
                    
                <div>
                <form action="" method="post">
                        <button name="logout2"><img src="images/logoout.png" alt="" width="30px" title="Déconnexion <?php echo $user['username']?>"></button>
                </form>
                </div>
              
            </div>
        </div>
        
        <div class='max-w-lg mx-auto py-4 pl-24 pr-24  text-lg rounded-lg mt-[-40px] '>
            <div>
                <h1 class="text-3xl  font-medium" >Mon profil</h1>
                <p class="text-blue-400 mb-4 text-sm">Gérez les paramètres de votre profil</p>
            </div>
            <form action="" method='post' class='mb-2' enctype="multipart/form-data">
                <p class="">Votre photo de profil</p>
                <div class=" items-center">
                    <?php
                        //Photo de profil de l'utilisateur
                        if(($user['filename'])!=' ' AND ! empty($user['filename']))
                        {
                        
                            require_once('photo.php');
                        ?>  
                            <div class="user">
                                <div  class="custom-file-input">
                                    <input  name="uploadfile" type="file" enctype="multipart/form-data" id="fileInput" class="hidden">
                                    <label  for="fileInput">
                                    <div class="text">
                                        <p class="flex gap-2">
                                            <img class="rounded-[50%] border " src="user_images/<?php echo $user['filename']; ?>" width="100px" height="100px">
                                        </p> 
                                    </div>
                                    </label>
                                </div>
                            </div>
                            <a id="openPopup" style="margin-top: 5px;">
                                <i class="fa-solid fa-trash text-blue-500" title="Supprimer la photo de profil"></i>
                            </a>
                            <script src="popup/script.js"></script>
                            <?php require_once('popup/popup_deleteuserprofile.html')?>
                        <?php
                        
                        }
                        else{
                            //Photo de profil par defaut
                            require_once('photo.php');
                        ?> 
                             <div class="user">
                                <div  class="custom-file-input">
                                    <input  name="uploadfile" type="file" enctype="multipart/form-data" id="fileInput" class="hidden">
                                    <label  for="fileInput">
                                    <div class="text">
                                        <p> 
                                            <img class="rounded-[50%] border " src="./images/user.PNG" alt="Default image user" title="Ajoutez une photo de profil pour permettre une identification simple" width="100px" height="100px">
                                        </p>
                                    </div>
                                    </label>
                                </div>
                            </div>
                        <?php
                        }
                    ?>
                </div>
            
                <div class='grid'>
                    <label for="username">Noms d'utilisateur</label>
                    <input class="rounded mb-2 w-full border-[1px] text-gray-400 border-gray-400 px-3" type="text" name='username' value='<?php  echo $user['username']; ?>'>
                </div>
                <div class='grid'>
                    <label for="mail">Mail</label>
                    <input class="rounded mb-2 w-full border-[1px] text-gray-400 border-gray-400 px-3" type="mail" name='mail' value='<?php echo $user['mail']; ?>'>
                </div>
                <div>
                    <label for="numero">Numéro de Télephone</label>
                    <input class="rounded mb-2 w-full border-[1px] text-gray-400 border-gray-400 px-3" type="phone" name="phone" value="<?php echo $user['phone']?>">
                </div>
                
                
                <input class='bg-gray-500  text-white mt-2 p-x-20 w-full rounded font-medium hover:bg-gray-700 ' type="submit" name='modify' value='Sauvegarder'>
                
            </form>
            <?php if(isset($_POST['modify']) && ! empty($_SESSION['flash_message']))
            {
            ?>
                <div id='flash-message' class='pl-4  shadow-lg leading-5 rounded bg-white text-red-500 text-[16px] transition-opacity duration-500 ease-in'><?php echo $_SESSION['flash_message']?></div>
            <?php

            }
            ?> 
        </div>
                   
    </section>
<?php
        }
        }
?>

</section>
   
                 
<?php  require_once('../../html_partials/public.footer.php');?>
