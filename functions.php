<?php
session_start();
/* cette fonction aura deux parametres $name 
   pour recuperer le header ainsi que le footer et $params pour faire passer le titre */
function partial($name ,$params=[]){
    extract($params);
    require( __DIR__ ."/html_partials/{$name}.html.php");
}
//fonction pour verifier si c'est un formulaire de type POST
function is_post(){
    return $_SERVER['REQUEST_METHOD']=='POST';
}
//fonction pour connecter a la base de donnees
function gloire()
{
   
        $bdd = new PDO('mysql:host=localhost; dbname=e-commerce', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
   
    return $bdd();
}