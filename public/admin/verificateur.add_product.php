
<?php
error_reporting(0);

$msg = "";
 require_once('../../database/db.php');
 require_once('verificateur.admin.php');
 //On submission, the values are retrieved from $_POST and stored in variables
 $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
 $contenu = isset($_POST['contenu']) ? $_POST['contenu'] : '';
 $prix = isset($_POST['prix']) ? $_POST['prix'] : '';
 $stock = isset($_POST['stock']) ? $_POST['stock'] : '';
   if(isset($_POST['add'])){
    $titre=htmlspecialchars($_POST['titre']);
    $contenu=htmlspecialchars($_POST['contenu']);
    $size=htmlspecialchars($_POST['size']);
    $price=htmlspecialchars($_POST['prix']);
    $stock=htmlspecialchars($_POST['stock']);
    $filename = $_FILES["uploadfile"]["name"];
	$filesize = $_FILES["uploadfile"]["size"];
	$filetype = $_FILES["uploadfile"]["type"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./image_produits_db/" . $filename;
	$allowed_formats= array('jpg','jpeg','png','JPG','JPEG','PNG');
   

    if( empty($_POST['titre']) AND  empty($_POST['contenu']) AND  empty($_POST['prix']) AND empty($_POST['uploadfile'])){
        //si l'utilisateur clique sur le bouton d'envoie verifie si tous les champs ne sont pas vide
        $_SESSION['flash_message']="Veillez remplir tous les champs"; 
    }
   elseif( empty($_POST['titre'])){
        $_SESSION['flash_message']="Veillez saisir le titre du produit!!"; 
    }
   
    elseif($filesize > 5000000){
		
        $_SESSION['flash_message']="Votre photo ne doit pas depasser 5Mb";  
	}
	
   elseif( empty($_POST['contenu'])){
        $_SESSION['flash_message']="Veillez completer la description";  
    }
   
    elseif($_POST['categorie']=='select'){
        $_SESSION['flash_message']="Veillez selectionner la categorie!!";  
    }
    elseif(empty($_POST['stock'])){
        $_SESSION['flash_message']="Veillez renseigner le stock!";  
    }
    elseif(empty($_POST['prix'])){
        $_SESSION['flash_message']="Veillez renseigner le prix!";  
    }
    else{
        if (! move_uploaded_file($tempname, $folder)) {
            $_SESSION['flash_message']="ERREUR!!";  
        } 
        $query = $bdd->prepare('INSERT INTO produits (titre,filename,contenu,size,cat_id,stock,prix) VALUES(?,?,?,?,?,?,?)');
        $query->execute(array($titre,$filename,$contenu,$size,$id,$stock,$price));  
        echo '<script>alert("Produit ajoute");</script>';
        echo '<script>window.location.href="add_product.php";</script>';
        exit;
    }
   }
?>
