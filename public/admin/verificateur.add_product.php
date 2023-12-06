
<?php
error_reporting(0);

$msg = "";
 require_once('../../database/db.php');
 require_once('verificateur.admin.php');
    //Recuperer l'id du categorie
    if(isset($_GET['cat_id']) AND !empty($_GET['cat_id']) ){
       $id = $_GET['cat_id'];
       $recupproduct = $bdd->prepare('SELECT *FROM categories WHERE cat_id = ?');
       $recupproduct->execute(array($id));
       $infos = $recupproduct->fetch();
       $nom=$infos['nom'];
      
    }

    //Recuperer l'id du produit
    if(isset($_GET['cat_id']) AND !empty($_GET['cat_id']) ){
        $getid = $_GET['cat_id'];
        $recuper_catetegorie = $bdd->prepare('SELECT *FROM categories WHERE cat_id = ?');
        $recuper_catetegorie->execute(array($getid));
        $infos = $recuper_catetegorie->fetch();
        $nom_categorie=$infos['nom'];
    }

   if(isset($_POST['add'])){
    $titre=htmlspecialchars($_POST['titre']);
    $contenu=htmlspecialchars($_POST['contenu']);
    $price=htmlspecialchars($_POST['prix']);
    $stock=htmlspecialchars($_POST['stock']);
    $filename = $_FILES["uploadfile"]["name"];
	$filesize = $_FILES["uploadfile"]["size"];
	$filetype = $_FILES["uploadfile"]["type"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./image_produits_db/" . $filename;
	$allowed_formats= array('jpg','jpeg','png','JPG','JPEG','PNG');
        // Récupération des valeurs des cases à cocher
        $size = isset($_POST["size"]) ? $_POST["size"] : [];

        // Convertir les fruits en une seule chaîne de caractères
        $size_string = implode(', ', $size);

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
        $query = $bdd->prepare('INSERT INTO produits (titre,filename,contenu,size,cat_id,stock,prix) VALUES(:titre,:filename,:contenu,:size,:cat_id,:stock,:prix)');
        $query->bindParam(':titre',$titre);
        $query->bindParam(':filename',$filename);
        $query->bindParam(':contenu',$contenu);
        $query->bindParam(':size',$size_string,PDO :: PARAM_STR);
        $query->bindParam(':cat_id',$id);
        $query->bindParam(':stock',$stock);
        $query->bindParam(':prix',$price);
        $query->execute();
        $_SESSION['flash_message']="Produit ajouté avec succès";  
        
    }
   }
?>
