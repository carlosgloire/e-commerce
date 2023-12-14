<?php
 require_once('../../database/db.php');

 //On submission, the values are retrieved from $_POST and stored in variables
 $name = isset($_POST['username']) ? $_POST['username'] : '';
 $mail = isset($_POST['mail']) ? $_POST['mail'] : '';
 $phone= isset($_POST['phone']) ? $_POST['phone'] : '';
   if(isset($_POST['submit'])){
    $username=htmlspecialchars($_POST['username']);
    $mail=htmlspecialchars($_POST['mail']);
    $telephone=htmlspecialchars($_POST['phone']);
    $password=htmlspecialchars (sha1($_POST['password'])); 
    $filename = $_FILES["uploadfile"]["name"];
	$filesize = $_FILES["uploadfile"]["size"];
	$filetype = $_FILES["uploadfile"]["type"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./user_images/" . $filename;
	$allowedExtensions = ['png', 'jpg', 'jpeg'];
    $pattern = '/\.(' . implode('|', $allowedExtensions) . ')$/i';
      
    //Request of verifying if the username already exist
       $Requete= $bdd->prepare('SELECT * FROM users WHERE  username= ? AND mail =?  ');
       $Requete->execute(array($username,$mail));
       $user_exist= $Requete->fetch(PDO::FETCH_ASSOC); //PDO :: ASSOC for avoiding duplication
       
    if(empty($username) || empty($password) || empty($mail)){
        //si l'utilisateur clique sur le bouton d'envoie verifie si tous les champs ne sont pas vide
        $_SESSION['flash_message']="Veillez remplir tous les champs !!";
        
    }
 
    elseif($user_exist){
        $_SESSION['flash_message']= "'".$username."' et '".$mail."' ont etés utilises pour un autre compte "; 
    }
    
    elseif(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$_POST['mail'])){

        $_SESSION['flash_message']="Le mail que vous avez saisi est incorrect !!"; 
        
    }

    elseif(!preg_match("#^[+]+[0-9]{12}$#",$_POST['phone'])){

        $_SESSION['flash_message']="Le numéro que vous avez saisi est incorrect vous devez ecrire le numéro avec indicatif Ex:+243900000000"; 
        
    }
    elseif (! preg_match($pattern, $_FILES['uploadfile']['name']) AND !empty($_FILES['uploadfile']['name'])) {
       
            $_SESSION['flash_message'] = "Votre fichier doit etre au format \"jpg,jpeg ou png \"";
           
    }
        elseif (! preg_match($pattern, $_FILES['uploadfile']['name']) AND !empty($_FILES['uploadfile']['name'])) {
       
            $_SESSION['flash_message'] = "Votre fichier doit etre au format \"jpg,jpeg ou png \"";
           
    }
    elseif ($_FILES['uploadfile']['size'] > 500000)  {
       
        $_SESSION['flash_message'] = "Votre fichier ne doit pas depasser 5MB";
       
    }    
    elseif( empty($_POST['password'])){
        $_SESSION['flash_message']="Veillez saisir le mot de passe !!"; 
    }

 elseif(!preg_match("#[a-z]+#",$_POST['password']))//password should contain at least 1 letter
{

    $_SESSION['flash_message']="Votre mot de passe doit contenir aumoins une lettre !!"; 
}

elseif(!preg_match("#[0-9]+#",$_POST['password']))//password should contain at least 1 number
{
    $_SESSION['flash_message']="Votre mot de passe doit contenir aumoins un nombre !!"; 
 }
elseif(!preg_match("#[-_@%&* ]+#",$_POST['password']))// password should contain at least 1 special character
{
    $_SESSION['flash_message']="Votre mot de passe doit contenir aumoins un charactere special !!"; 
}
elseif(strlen($_POST['password']) < 8) //password should contain 8 characters
{
            
    $_SESSION['flash_message']="Votre mot de passe doit contenir aumoins une 8 characteres ex: a-z0-9 -_@%&* !!"; 
} 
             
elseif($_POST['password'] != $_POST['password2'])
{
    $_SESSION['flash_message']="Les deux mot de passe doivent etre identique !!"; 

}
    else{
        if (! move_uploaded_file($tempname, $folder)) {
            $_SESSION['flash_message']="ERREUR!!";  
        } 
        $query = $bdd->prepare ('INSERT INTO users (username,mail,phone,filename,password) VALUES(?,?,?,?,?)');
        $query->execute(array($username,$mail,$telephone,$filename,$password));
        echo '<script>alert("Votre compte a eté crée avec succès");</script>';
        echo '<script>window.location.href="signup.php";</script>';
        exit;
    }
  
}
?>