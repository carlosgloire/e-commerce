<?php
 require_once('../../database/db.php');

if(isset($_POST['modify'])){
    $username = htmlspecialchars($_POST['username']);
    $mail = htmlspecialchars($_POST['mail']);
    $phone=htmlspecialchars($_POST['phone']);
     $filename = $_FILES["uploadfile"]["name"];
	$filesize = $_FILES["uploadfile"]["size"];
	$filetype = $_FILES["uploadfile"]["type"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./user_images/" . $filename;
	$allowedExtensions = ['png', 'jpg', 'jpeg'];
    $pattern = '/\.(' . implode('|', $allowedExtensions) . ')$/i';
    if(empty($_POST['username'])&& empty($_POST['phone']) && empty($_POST['mail'])&& empty($_POST['file']))
    {
        $_SESSION['flash_message']="Veillez completer tous les champs!!"; 
    }
    elseif( empty($_POST['username'])){
        $_SESSION['flash_message']="Veillez saisir le nom d'utilisateur!"; 
    }
   elseif( empty($_POST['mail'])){
        $_SESSION['flash_message']="Veillez saisir le mail!";  
    }
    elseif( empty($_POST['phone'])){
        $_SESSION['flash_message']="Veillez écrire le numéro de téléphone!";  
    }
    elseif (! preg_match($pattern, $_FILES['uploadfile']['name']) AND !empty($_FILES['uploadfile']['name'])) {
       
        $_SESSION['flash_message'] = "Votre fichier doit etre au format \"jpg,jpeg ou png \"";
       
    }
    else{
        if (! move_uploaded_file($tempname, $folder)) {
            $_SESSION['flash_message']="ERREUR!";   
        } 
            $requete=$bdd->query("SELECT user_id FROM users WHERE username = '{$_SESSION['username']}' OR mail='{$_SESSION['username']}'");
            $getid=$requete->fetch();
            $user_id=$getid['user_id'];
            $updtadeproduct = $bdd->prepare('UPDATE users SET username = ?, mail = ?,  phone = ? ,filename = ? WHERE user_id=?');
            $updtadeproduct->execute(array($username,$mail,$phone,$filename,$user_id));  
            echo '<script>alert("les donnés de l\'utilisateur ont modifié avec succès");</script>';
            echo '<script>window.location.href="settings.php";</script>';
            exit;           
    }
    }

?>