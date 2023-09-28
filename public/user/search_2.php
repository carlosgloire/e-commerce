<?php
require_once('../../database/db.php');
require_once('../../html_partials/public.header.php');
require_once('../../js/flash2.php');
require_once('../../functions.php');
notsearch();
$searchErr = '';
$product_details='';
if(isset($_POST['save']))
{
	if(!empty($_POST['search'])){

		$search = htmlspecialchars($_POST['search']);
		//Rechercher selon le titre du produit
		$stmt = $bdd->prepare("SELECT  p.id, p.titre, SUBSTRING(p.contenu, 1,30) AS description,p.filename,p.prix,c.nom FROM produits p, categories c WHERE titre LIKE '%$search%'   AND p.cat_id=c.cat_id ");
		$stmt->execute();
		$product_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //Requete pour compter le nombre des resultats trouvee
		$query= $bdd->prepare("select count(id) as produit from produits  where titre like '%$search%'");
		$query->execute();

			
	}
	else
	{   echo '<script>alert("Veillez ecrire les informations");</script>';
		echo '<script>window.location.href="user.php";</script>';
		exit;
	}
   
}

?>  
	<?php require_once('menu_bar_user.php');?>
    <section class="pt-16">
		<div class="">
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
								<img class="rounded  w-[270px] h-[300px] object-cover" src="../admin/image_produits_db/<?php echo $value['filename']; ?>">          
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
							<div class="flex gap-6">
								<p>
									<a class="bg-blue-500 text-white px-2 mb-5 shadow-sm rounded text-center text-base" href="Acheter.php?produit=<?php echo $value['titre']?>">Acheter</a>
								</p>
								<p>
									<a class="bg-gray-500 text-white px-2 mb-5 shadow-sm rounded text-center text-base" href="voir_en_detail.php?id=<?php echo $value['id']?>">Voir en Detail</a>
								</p>
							</div>
						</div>
					
					
					<?php 
					}
					
				}
				?>
		</section>
	</section>
<?php
require_once('../../html_partials/public.footer.php');
?>
