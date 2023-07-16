<?php
session_start();
/* cette fonction aura deux parametres $name 
   pour recuperer le header ainsi que le footer et $params pour faire passer le titre */
function partial($name){
   
    require( __DIR__ ."/html_partials/{$name}.html.php");
}
//fonction pour verifier si c'est un formulaire de type POST
function is_post(){
    return $_SERVER['REQUEST_METHOD']=='POST';
}



