<?php
require_once('../../database/db.php');
require_once('../../js/flash2.php');
require_once('../../functions.php');

$searchErr = '';
$product_details='';

	if(!empty($_GET['search'])){

		$search = htmlspecialchars($_GET['search']);
		//Rechercher selon le titre du produit
		$stmt = $bdd->prepare("SELECT  p.id, p.titre, SUBSTRING( p.contenu ,1,22) AS description , p.filename,p.prix,c.nom FROM produits p, categories c WHERE titre LIKE '%$search%'   AND p.cat_id=c.cat_id ");
		$stmt->execute();
		$product_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //Requete pour compter le nombre des resultats trouvee
		$query= $bdd->prepare("SELECT count(id) as produit FROM produits  WHERE titre like '%$search%'");
		$query->execute();

			
	}
	else
	{   echo '<script>alert("Veillez ecrire les informations");</script>';
		echo '<script>window.location.href="product.php";</script>';
		exit;
	}
   

?>

		<div class="form-group">
			<span class="error" style="color:red;"> <?php echo $searchErr;?></span>
		</div>
	<section class="grid grid-cols-5">
	
	    <section class="col-span-4">
				<div>
				<?php
					while($result=$query->fetch()){
						if($result['produit'] > 1){
							?>
								<div class="text-center mb-2">
									<p class="text-green-500 pl-10"><?php echo $result['produit'].' résultats trouvés' ?></p>

								</div>
							<?php
						}
						elseif($result['produit'] == 1){
							?>
								<div class="text-center">
									<p class="text-green-500 "><?php echo $result['produit'].'  résultat trouvé' ?></p>
								</div>
							<?php
					}
					}
				
				?>

				</div>
			    <div class="flex flex-wrap  gap-2 "> 
								
							<?php
							if(!$product_details)
							{	
								echo '<div class="text-center"><p class="text-red-500">Aucun résultat trouvé</p></div>';
							}
							else{
							
								foreach($product_details as $value)
								{
								
									?>
								
									<div class=" p-3 rounded " style="box-shadow: 0px 0px 10px 0px rgb(240 240 240); border: none;">
										<div class="flex justify-between">
											<h1 class=" mb-3   text-[#010e27]">
										<?php echo $value['titre']; ?>
										</h1>
										<p class="text-gray-400"><?php echo $value['nom'];?></p>
										</div> 
										<div class="flex mt-1">
											<img class="object-cover w-[230px] h-[230px]" src="../admin/image_produits_db/<?php echo $value['filename']; ?>" >          
										</div>
										<div>
											<?php
												echo $value['description'].'...'; 
											?> 
										</div>
										<div>
											<?php
												echo $value['prix']."$"; 
											?> 
										</div>
										<div class="flex mt-5 gap-5" style="display: flex;">
												<a  href="edit.php?id=<?php echo $value['id'];?>"><img src="icones/edit.png" alt="icone edit" width="30" title="Modifier"></a>
												<form action="delete.product.php?id=<?php echo $value['id'];?>" method="POST">
												<button  ><img src="icones/delete.png" alt="icone supprimer" width="30px" title="Supprimer"></button> 
												</form>
												<a href="voir_plus.php?id=<?php echo $value['id']?>"><img src="icones/more.png" alt="Icone voir plus" title="Voir plus" width="30px"></a>
										</div>
									</div>
								

								<?php 
								}
								
							}
						
							?>
				</div>
		</section>	
	</section>	
