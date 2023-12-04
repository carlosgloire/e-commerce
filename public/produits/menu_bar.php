
<?php 
$title='Menu';
require_once('../../database/db.php');
require_once('../user/verificateur.user.php');
?>
    <header id="header" class="flex  justify-between px-3   w-full" style="z-index: 10;position:fixed;background-color: #010e27f6;padding-top:15px;padding-bottom:10px">
        <a href="home.php"><img src="images/Glory-shop.png" alt="logo glory shop" width="30px" title="Acceuil"></a>
        <div class="text-white gap-8 flex items-center">
            <a class="pr-8" href="../produits/home.php">ACCEUIL</a>
            <a class="pr-8" href="categories_display.php">CATEGORIES</a>
            <a class="pr-8" href="#">APROPOS</a>
            <a href="../user/login.php">
                <?php
                    if (! isset($_SESSION['user'])) {
                        ?>
                            <img src="../user/images/user_icon.png"   alt="Default image user" title="Connexion ou Inscription" width="40px"> 
                        <?php
                    }
                    else{
                        ?>
                        <div class="flex ">
                                    <a href="../user/settings.php">
                                    <?php
                                        // user profile
                                        $requete=$bdd->query("SELECT * FROM users WHERE username = '{$_SESSION['username']}' OR mail='{$_SESSION['username']}' AND password ='{$_SESSION['password']}'");
                                        if($requete->rowCount() > 0){
                                            while($user = $requete->fetch(PDO::FETCH_ASSOC)){
                                            ?>  
                                            <p class=" items-center">
                                                <?php
                                                    if(($user['filename'])!=' ' AND ! empty($user['filename'])){
                                                    ?>
                                                        <img class="rounded-[60px] border " src="../user/user_images/<?php echo $user['filename']; ?>" width="40px">
                                                    <?php
                                                    }
                                                    else{
                                                    ?>
                                                        <img src="../user/images/user.PNG" class="rounded-[50%] border "  alt="Default image user" title="Ajoutez une photo de profil pour permettre une identification simple" width="35px">
                                                    <?php
                                                    }
                                                ?>
                                            </p>   
                                        </a>
                                        <i class="fa-solid fa-circle-plus mt-6 cursor-pointer " id="openPopup" style="margin-left: -7px;"></i>
                                        <div id="popup" class=" absolute top-14 ml-10 rounded p-2 bg-white hidden transi shadow-sm border">
                                            <div class="justify-between flex">
                                                <p></p>
                                                <i id="closePopup" class="fa-solid fa-rectangle-xmark text-red-600  cursor-pointer close"></i>
                                            </div>
                                            <a href="../user/settings.php">
                                                <div class="flex gap-1 items-center cursor-pointer">
                                                    <i class="fa-solid fa-gear text-[#010e27]"></i>
                                                    <p class="text-black">Parametres</p>
                                                </div>
                                            </a>
                                            <form action="" method="post">
                                                <button name="logout2"  title="Déconnexion <?php echo $user['username']?>">
                                                    <div class="flex gap-1 items-center cursor-pointer">
                                                        <i class="fa-solid fa-right-from-bracket text-[#010e27]"></i>
                                                        <p class="text-black">Déconnexion</p>
                                                    </div>
                                                </button>
                                            </form>
                                        </div> 
                                </div>
                        
                            <?php
                        }
                        }
                        ?> 
                        <?php
                    }
                    
                ?>
                
            </a>
            
        </div>
         <div class="flex items-center">
            <img src="images/search.png" alt="search icon" width="30px">
            <p class="pl-4"><img src="images/cart2.jpg" alt="image cart" width="30px"></p>
            <p class="text-white">2 Produits</p>
            <p class="pl-3 font-bold text-white">7200 $</p>

         </div>
     </header>
