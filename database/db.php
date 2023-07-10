<?php
     $bdd = new PDO('mysql:host=localhost; dbname=e-commerce', 'root', '');
     $bdd->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
   
?>