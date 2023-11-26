<?php
session_start();
//fonction pour verifier si c'est un formulaire de type POST
function is_post(){
    return $_SERVER['REQUEST_METHOD']=='POST';
}
function notconnected(){
    if (! isset($_SESSION['admin'])) {
        // Redirect to the login page if not logged in
        header("Location: login.php");
        exit();
    }
}
function not_user_connected(){
    if (! isset($_SESSION['user'])) {
        // Redirect to the login page if not logged in
        header("Location: ../user/login.php");
        exit();
    }
}


function notsearch(){
    if (! isset($_SESSION['admin'])) {
        // Redirect to the login page if not logged in
        header("Location: home.php");
        exit();
    }
}
// Fonction pour verifier l'expiration de la session
function verifysession(){
    // Set the session expiration time
$expiration = 1440 * 60; // 24 hours of activity

// Check if the session has expired
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $expiration)) {
    // Session expired, destroy the session
    session_unset();
    session_destroy();
    echo '<script>alert("Votre session a expire");</script>';
    echo '<script>window.location.href="login.php";</script>';
    exit;
}
// Update the last activity time
$_SESSION['LAST_ACTIVITY'] = time();
}

//fonction pour deconnecter l'utilisateur
function logout(){
    if (isset($_POST['logout'])) {
        // Destroy the session and redirect to the login page
        session_destroy();
        header("Location: login.php");
        exit();
    }
    
}
function logout_user(){
    if (isset($_POST['logout2'])) {
        // Destroy the session and redirect to the login page
        session_destroy();
        header("Location: ../produits/home.php");
        exit();
    }
    
}
function slugify_blog_page($content) {
    // Remove all non-alpha-numeric characters and spaces.
    $content = preg_replace('/[^a-zA-Z0-9\s]/', '', $content);
  
    // Replace all spaces with hyphens.
    $content = str_replace(' ', '-', $content);
  
    // Lowercase the text.
    $content = strtolower($content);
  
    // Return the slugified text.
    return $content;
    $content = file_get_contents('product.php');
  }
 

//Function to display products
function displayProduct($row) {
    ?>
      <aside class="shadow-sm p-3 border rounded bg-white " >
            <h1 class="mb-2 text-[#1d2238]">
                <?php echo $row['titre']; ?>
            </h1>
            <div class=" mb-1 ">
                <a  href="voir_en_detail.php?id=<?php echo $row['id'] ?>" >                
                    <img class="object-cover" src="../admin/image_produits_db/<?php echo $row['filename']; ?>" style="width: 230px;height:230px;">
                </a>
            </div>
            <div>
                <?php
                echo $row['description'] . '...';
                ?>
            </div>
            <div class="flex gap-1 text-medium font-bold">
                <p style="color:#1d2238;">
                <?php
                echo $row['prix'].' '.'$' ;
                ?>
                </p>
            </div>
            <div class="flex gap-4  items-center">
                    <a href="#"   class="bg-[#010e27] text-white px-4  shadow-sm  text-center text-base delete"style="border: 1px solid #010e27;"  name="acheter">Acheter</a>
                    <?php
                        //Appelle a la fonction pour afficher un popup 
                            popup_window_not_connected_user();
                    ?>
                <a class="text-[#1d2238]  px-2 hover:bg-[#010e27]  hover:text-[#1d2238]  shadow-sm text-center text-base" href="voir_en_detail.php?id=<?php echo $row['id'] ?>" style="border: 1px solid #1d2238;">Voir en Detail</a>
            </div>
        </aside>
    <?php
}
//Function to display products
function displayProduct_user($row) {
    ?>
       <aside class="shadow-sm p-3 border rounded bg-white ">
      <h1 class="mb-2 text-[#1d2238]">
                <?php echo $row['titre']; ?>
            </h1>
            <div class=" mb-1 ">
                <a  href="voir_en_detail.php?id=<?php echo $row['id'] ?>" >                
                    <img class="object-cover" src="../admin/image_produits_db/<?php echo $row['filename']; ?>" style="width: 230px;height:230px;">
                </a>
            </div>
            <div>
                <?php
                echo $row['description'] . '...';
                ?>
            </div>
            <div class="flex gap-1 text-medium font-bold">
                <p style="color:#1d2238;">
                <?php
                echo $row['prix'].' '.'$' ;
                ?>
                </p>
            </div>
            <div class="flex gap-4  items-center">
                <form action="acheter.php" method="post">
                    <button class="bg-[#010e27] text-white px-4  shadow-sm  text-center text-base" name="acheter" style="border: 1px solid #010e27;">Acheter</button>
                </form>
                <a class="text-[#1d2238]  px-2 hover:bg-[#010e27]  hover:text-[#1d2238]  shadow-sm text-center text-base" href="../user/voir_en_detail.php?id=<?php echo $row['id'] ?>" style="border: 1px solid #1d2238;">Voir en Detail</a>
            </div>
        </aside>
    <?php
}
//Function to display pagination per each category
function displayCategoryPagination($categoryName) {
    echo "<section class='pagination' id='pagination$categoryName'></section>";
}
function popup_window_delete_product($row){
    ?>
    <div class="popup">
        <div class="popup-content">
            <p class="warning">Voulez-vous supprimer << <?php echo $row['titre']; ?>>></p>
            <div>
                <button class="close" id="closePopup">Annuler</button>
                <a href="delete.product.php?id=<?php echo $row['id']?>" id="deleteProduct">Supprimer</a>
            </div>
        </div>
    </div>
    <?php
}
function popup_window_not_connected_user(){
    ?>
        <div class="popup">
            <div class="popup-content">
                <p class="warning">Pour acheter vous devez d'abbord vous connecter</p>
                <div>
                    <button class="close" id="closePopup">Annuler</button>
                    <a href="../user/login.php" id="deleteProduct">Connexion</a>
                </div>
            </div>
        </div>
    <?php
}
