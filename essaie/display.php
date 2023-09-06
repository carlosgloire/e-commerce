<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>
<body>
    <h1>Les images enregistree</h1>
<div id="display-image">
		<?php
        	$db = new PDO('mysql:host=localhost; dbname=geeksforgeeks', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
       
        
		        $produit = $db->query("SELECT * FROM image ");

				if($produit->rowCount() > 0){
					while($row = $produit->fetch(PDO::FETCH_ASSOC)){
						?>
					 <img src="./image/<?php echo $row['filename']; ?>" width="30%" height="400px">
					   <?php
                       ?>
                       <p><?php echo $row['name']; ?></p>
                         <?php   
					}
				   
				}
				else {
				   ?>
				   <p class="text-red-500"><?php echo 'Aucun produit déja ajouté' ?></p>
				   <?php
				}
				$db = null;
				?>
	</div>
</body>
</html>