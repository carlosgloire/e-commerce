<?php
require_once('../../functions.php');
require_once('../../database/db.php');
 $recup_id = $bdd->query("SELECT user_id FROM users WHERE username = '{$_SESSION['username']}' OR mail='{$_SESSION['username']}'");
 $user_id=$recup_id->fetch();
 $id=$user_id['user_id'];
 $user_profile=['filename'];
 if($recup_id->rowCount() > 0){
     $delete_product = $bdd->query("UPDATE users SET filename=' ' WHERE user_id = '{$id}' ");
     echo '<script>alert("Photo supprimé avec succès");</script>';
     echo '<script>window.location.href="settings.php";</script>';
     exit;
}
else{
 echo '<script>alert("Aucune photo trouvée");</script>';
 echo '<script>window.location.href="settings.php";</script>';
 exit;
}