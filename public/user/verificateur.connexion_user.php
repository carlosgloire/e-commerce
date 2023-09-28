<?php
require_once('verificateur.login.php');
require_once('../../database/db.php'); 
$requete=$bdd->query("SELECT * FROM users WHERE username = '{$_SESSION['username']}'");

?>