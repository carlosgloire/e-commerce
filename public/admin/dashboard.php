<?php
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
    
    if(! $_SESSION['admin'] ?? null){
        header("location:login.php");
    }


// Set the session expiration time
$expiration = 1440 * 60; // 24 hours in seconds

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


    $title='Dashboard';
?>
<?php partial('header',['title'=>$title]);?>
        <section class="m-16">
            <h1 class="text-3xl mb-4 font-medium  text-green-" >Admin</h1>
            <p class="mb-2">Bonjour cher Admin !!</p>

            <form action="logout.php" method='post' >
            <button  class='bg-gray-700 text-white p-x-20 rounded font-medium hover:bg-gray-900 px-3'>Deconnexion</button>
            </form>  
        </section>
              
<?php partial('footer');?>
   


