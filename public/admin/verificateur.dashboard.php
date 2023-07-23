<?php
// Check if the user is logged in
if (!isset($_SESSION['admin'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Check if the logout button is clicked
if (isset($_POST['logout'])) {
    // Destroy the session and redirect to the login page
    session_destroy();
    header("Location: login.php");
    exit();
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
?>