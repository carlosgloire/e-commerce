<?php
 $username = isset($_POST['username']) ? $_POST['username'] : '';
 // cryptage du mot de passe
 if( empty($_POST['username']) || empty($_POST['password'])){
 //si l'utilisateur clique sur le bouton d'envoie verifie si tous les champs ne sont pas vide
     $_SESSION['flash_message']="Veillez Remplir tous les champs !!"; 
}
     else{
        $username=htmlspecialchars($_POST['username']);
        $password=htmlspecialchars (sha1($_POST['password']));  
         $requete = $bdd->prepare("SELECT username,password FROM users WHERE (mail = :mail OR username= :username ) AND password = :password ");
       //Connecter l'utilisateur avec son nom ou son email
         $requete->bindValue(':mail', $username);
         $requete->bindValue(':username', $username );;
         $requete->bindValue(':password', $password);
         $requete->execute();
         if ($user = $requete->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['user']=$user;
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
            header("location:user.php");
            exit;
        }
     else{
          $_SESSION['flash_message']="Nom d'utilisateur ou Mot de passe incorrecte !!";
     }
     }
        