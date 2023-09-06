<?php
require_once('../../database/db.php');
require_once('../../html_partials/public.header.php');
require_once('../../js/flash2.php');
require_once('../../functions.php');
$searchErr = '';
$product_details='';
if(isset($_POST['save']))
{
	if(!empty($_POST['search'])){

		$search = htmlspecialchars($_POST['search']);
		//Rechercher selon le titre du produit
		$stmt = $bdd->prepare("SELECT  p.id, p.titre, p.contenu, p.filename,p.prix,c.nom FROM produits p, categories c WHERE titre LIKE '%$search%'   AND p.cat_id=c.cat_id ");
		$stmt->execute();
		$product_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //Requete pour compter le nombre des resultats trouvee
		$query= $bdd->prepare("select count(id) as produit from produits  where titre like '%$search%'");
		$query->execute();

			
	}
	else
	{   echo '<script>alert("Veillez ecrire les informations");</script>';
		echo '<script>window.location.href="home.php";</script>';
		exit;
	}
   
}

?>

<body>
    <?php
		require_once('header.admin.php');
		?>
		<div class="form-group">
			<span class="error" style="color:red;"> <?php echo $searchErr;?></span>
		</div>
		
		<?php
			
		while($result=$query->fetch()){
			if($result['produit'] > 1){
				?>
				<p class="text-green-500 pl-10"><?php echo $result['produit'].' résultats trouvés' ?></p>
			<?php
			}
            elseif($result['produit'] == 1){
				?>
				<p class="text-green-500 pl-10"><?php echo $result['produit'].'  résultat trouvé' ?></p>
			<?php
			}
			}
		?>
	<section class="px-10 py-4 flex  flex-wrap  gap-6">      
	 
	    		<?php
		    	 if(!$product_details)
		    	 {
					echo '<p>Aucun résultat trouvé</p>';
		    	 }
		    	 else{
				
		    	 	foreach($product_details as $value)
		    	 	{
		    	 	
                          ?>
                    
                          <div class="shadow-sm p-3 mb-4 border w-[23%] ">
                              <div class="flex justify-between">
                                  <h1 class=" mb-3   text-blue-500">
                              <?php echo $value['titre']; ?>
                              </h1>
                              <p class="text-gray-400"><?php echo $value['nom'];?></p>
                              </div> 
                              <div class="flex mt-1 gap-10">
                                <?php require_once('../admin/verificateur.add_product.php');?>
                                <img class="rounded  object-cover" src="../admin/image_produits_db/<?php echo $value['filename']; ?>">          
                             </div>
                              <div>
                                  <?php
                                      echo $value['contenu']; 
                                  ?> 
                              </div>
                              <div>
                                  <?php
                                      echo $value['prix']."$"; 
                                  ?> 
                              </div>
                                <div class="flex mt-5 gap-5">
                                    <p class="border px-2 bg-blue-500 text-white"><a  href="edit.php?id=<?php echo $value['id'];?>">Modifier</a>
                                    <form action="delete.product.php?id=<?php echo $value['id'];?>" method="POST">
                                    <button class="border px-4 bg-blue-500 text-white" >Supprimer</button> 
                                    </form>
                                </div>
                          </div>
                     
                      
                     <?php 
		    	 	}
		    	 	
		    	 }
		    	?>
	</section>
<?php
require_once('../../html_partials/public.footer.php');
?>