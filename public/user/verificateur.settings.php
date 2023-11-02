<?php
require_once('../../database/db.php');


if (isset($_POST['modify'])) {
    // Sanitize user input
    $username = htmlspecialchars($_POST['username']);
    $mail = htmlspecialchars($_POST['mail']);
    $phone = htmlspecialchars($_POST['phone']);

    // Handle file upload
    if (!empty($_FILES['uploadfile']['name'])) {
        $filename = $_FILES['uploadfile']['name'];
        $filesize = $_FILES['uploadfile']['size'];
        $filetype = $_FILES['uploadfile']['type'];
        $tempname = $_FILES['uploadfile']['tmp_name'];
        $folder = "./user_images/" . $filename;
        $allowedExtensions = ['png', 'jpg', 'jpeg'];
        $pattern = '/\.(' . implode('|', $allowedExtensions) . ')$/i';

        if (!preg_match($pattern, $filename)) {
            $_SESSION['flash_message'] = "Votre fichier doit être au format 'jpg', 'jpeg' ou 'png'.";
        } elseif (!move_uploaded_file($tempname, $folder)) {
            $_SESSION['flash_message'] = "Erreur lors de l'envoi du fichier.";
        }
    } else {
        $requete = $bdd->query("SELECT filename FROM users WHERE username = '{$_SESSION['username']}' OR mail = '{$_SESSION['username']}'");
        $photo = $requete->fetch();
        $filename = $photo['filename']; // If no file is uploaded, keep the previous file name (or set it to an empty string)
    }

    // Check for empty fields
    if (empty($username) || empty($mail) || empty($phone)) {
        $_SESSION['flash_message'] = "Veuillez compléter tous les champs!";
    } else {
        // Get the user's ID (you should use a prepared statement here for security)
        $requete = $bdd->query("SELECT user_id FROM users WHERE username = '{$_SESSION['username']}' OR mail = '{$_SESSION['username']}'");
        $getid = $requete->fetch();
        $user_id = $getid['user_id'];

        // Update user information in the database
        $updtadeproduct = $bdd->prepare('UPDATE users SET username = ?, mail = ?, phone = ?, filename = ? WHERE user_id = ?');
        $updtadeproduct->execute(array($username, $mail, $phone, $filename, $user_id));

        echo '<script>alert("Vos données sont modifié avec succès ");</script>';
        echo '<script>window.location.href="settings.php";</script>';
        exit;
    }
}
?>
