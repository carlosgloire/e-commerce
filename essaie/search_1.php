<?php
require_once('../database/db.php');

$searchErr = '';
$employee_details='';
if(isset($_POST['save']))
{
	if(!empty($_POST['search']))
	{
		$search = $_POST['search'];
		$stmt = $bdd->prepare("select  p.*, c.nom from produits p, categories c where titre like '%$search%' an nom like '%$search%'   and p.cat_id=c.cat_id ");
		$stmt->execute();
		$employee_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//print_r($employee_details);
		
	}
	else
	{
		$searchErr = "Please enter the information";
	}
   
}

?>
<html>
<head>
<title>ajax example</title>
<link rel="stylesheet" href="bootstrap.css" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap-theme.css" crossorigin="anonymous">
<link rel="stylesheet" href="../dist/style.css">
<style>
.container{
	width:70%;
	height:30%;
	padding:20px;
}
</style>
</head>

<body>
	<div class="container">
	<h3><u>PHP MySQL search database and display results</u></h3>
	<br/><br/>
	<form class="form-horizontal" action="#" method="post">
	<div class="row">
		<div class="form-group">
		    <label class="control-label col-sm-4" for="email"><b>Search Employee Information:</b>:</label>
		    <div class="col-sm-4">
		      <input type="text" class="rounded mb-2  border-[1px] border-black px-3" name="search" placeholder="search here">
		    </div>
		    <div class="col-sm-2">
		      <button type="submit" name="save" class="bg-blue-500 text-white px-2 mb-5 shadow-sm rounded text-center text-base" >Submit</button>
		    </div>
		</div>
		<div class="form-group">
			<span class="error" style="color:red;">* <?php echo $searchErr;?></span>
		</div>
		
	</div>
    </form>
	<br/><br/>
	<h3><u>Search Result</u></h3><br/>
	<section class="p-10 flex  flex-wrap  gap-6">      
	 
	    		<?php
		    	 if(!$employee_details)
		    	 {
		    		echo '<tr>No data found</tr>';
		    	 }
		    	 else{
		    	 	foreach($employee_details as $key=>$value)
		    	 	{
		    	 	
                          ?>
                    
                          <div class="shadow-sm p-3 mb-4 border w-[30%] ">
                              <div class="flex justify-between">
                                  <h1 class=" mb-3   text-blue-500">
                              <?php echo $value['titre']; ?>
                              </h1>
                              <p class="text-gray-400"><?php echo $value['nom'];?></p>
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
                              <div class="flex gap-6">
                                  <p>
                                      <a class="bg-blue-500 text-white px-2 mb-5 shadow-sm rounded text-center text-base" href="Acheter.php">Acheter</a>
                                  </p>
                                  <p>
                                      <a class="bg-gray-500 text-white px-2 mb-5 shadow-sm rounded text-center text-base" href="voir_detail.php">Voir en Detail</a>
                                  </p>
                              </div>
                          </div>
                     
                      
                     <?php 
		    	 	}
		    	 	
		    	 }
		    	?>
	</section>
</div>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
</body>
</html>