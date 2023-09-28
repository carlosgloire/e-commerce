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
 
