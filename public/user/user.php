<?php 
$title='Home';
require_once('../../html_partials/public.header.php');
require_once('../../functions.php');
require_once('../../database/db.php'); 
require_once ('../../js/flash.php');
require_once('verificateur.login.php');
require_once('verificateur.user.php');


?>

<?php require_once('menu_bar_user.php');?>
<div class="justify-between flex  pt-16">
    <div class="p-10">
    <p class="text-gray-500 ">
        <?php
              //Requete pour compter les produits
              $requete=$bdd->prepare("SELECT count('id') AS id FROM produits");
              $requete->execute();
            while($nombre=$requete->fetch()){
                echo $nombre['id'].' produits publiés';
            }
        ?>    
     </p>
    </div>
    <div class="shadow-sm mt-2 p-3 border rounded flex items-center gap-4">
        <?php
            $requete=$bdd->query("SELECT * FROM users WHERE username = '{$_SESSION['username']}' OR mail='{$_SESSION['username']}'");
            if($requete->rowCount() > 0){
               
                while($user = $requete->fetch(PDO::FETCH_ASSOC)){
                ?>  
                        <div>
                            <a href="settings.php"><img src="images/setting.png" alt="" width="20px" title="Parametres"></a>
                            <div class="flex justify-between gap-4">
                                <p>
                                    <?php echo $user['username']?>
                                </p>
                                <p class=" items-center">
                                    <?php
                                       if(! empty($user['filename'])){
                                        ?>
                                            <img class="rounded-[60px] border " src="user_images/<?php echo $user['filename']; ?>" width="40px">
                                        <?php
                                       }
                                       else{
                                        ?>
                                             <img class="rounded-[50px] border " src="./images/user.PNG" alt="Default image user" title="Ajoutez une photo de profil pour permettre une identification simple" width="40px">
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
        <?php
                }
                }
            
        ?>
    </div>
</div>
<div class=" mt-[-20px]  pr-10">
    <h1 class="ml-10 text-xl mb-4 font-medium">NOS PRODUITS</h1>
     
</div>
<section class=" px-10 flex  flex-wrap gap-6">
<?php  

            $produit = $bdd->query("SELECT p.id, p.titre, SUBSTRING(p.contenu, 1,30) AS description,p.filename,p.prix,c.nom FROM produits p,categories c where p.cat_id=c.cat_id"); 
            if($produit->rowCount() > 0){
                while($row = $produit->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    
                        <div class="shadow-sm p-3 mb-4 border rounded ">
                            <div class="flex justify-between">
                                <h1 class=" mb-3   text-blue-500">
                            <?php echo $row['titre']; ?>
                            </h1>
                            <p class="text-gray-400"><?php echo $row['nom'];?></p>
                            </div> 
                            <div class="flex mt-1 gap-10 w-[270px] h-[270px]">
                                <img class="rounded   object-cover " src="../admin/image_produits_db/<?php echo $row['filename']; ?>">          
                            </div>
                            <div>
                                <?php
                                    echo $row['description'].'...'; 
                                ?> 
                            </div>
                            <div>
                                <?php
                                    echo $row['prix']."$"; 
                                ?> 
                            </div>
                            <div class="flex gap-6">
                                <p>
                                    <a class="bg-blue-500 text-white px-2 mb-5 shadow-sm rounded text-center text-base" href="../produits/acheter.php?id=<?php echo $row['id']?>">Acheter</a>
                                </p>
                                <p>
                                    <a class="bg-gray-500 text-white px-2 mb-5 shadow-sm rounded text-center text-base" href="voir_en_detail.php?id=<?php echo $row['id']?>">Voir en Detail</a>
                                </p>
                            </div>
                        </div>
            
                   <?php  
                }
               
            }
            else {
               ?>
               <p class="text-red-500"><?php echo 'Aucun produit déja ajouté' ?></p>
               <?php
            }
            $bdd = null;
 ?>
                  
</section>
<?php  require_once('../../html_partials/public.footer.php');?>
