<?php
    $title='ajouter un produit';
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flass-succes.php');
    require_once('verificateur.admin.php');
    require_once('verificateur.categories.php');
    require_once('verificateur.add_product.php'); 
    if(is_post()){
        require_once('verificateur.categories.php');
    }
   
    ?>
     <?php if(isset($_POST['add']) && ! empty($_SESSION['flash_message']))
    {
    ?>  <div class="text-center mt-[3%] ">
            <div id='flash-message-succes' class='pl-4 leading-5 shadow-lg text-green-500 rounded bg-white green-red-500 text-[16px] transition-opacity duration-500 ease-in max-w-lg mx-auto '><?php echo $_SESSION['flash_message']?></div>
        </div>
    <?php
    }
    ?>
<div class='max-w-lg mx-auto p-12 pl-24 pr-24 mt-[2%] bg-white text-lg rounded-lg shadow-lg text-gray-950 '>
    <h1 class=" text-3xl mb-4 font-medium" > Ajouter un produit dans "<span class="text-blue-400"><?php echo $nom_categorie?></span>"</h1>
    <form action="" method='post' enctype="multipart/form-data" class='mb-2'>
        <div class='grid'>
            <label for="titre">Titre du produit</label>
            <input class="rounded mb-2 w-full border-[1px] bg-gray-100 border-black px-3" type="text" name='titre' >
        </div>
        <div class='grid'>
            <label for="titre">Image du produit</label>
            <input class="rounded mb-2 w-full border-[1px] bg-gray-100 border-black px-3" type="file" name="uploadfile" enctype="multipart/form-data" >
        </div>
        <div class='grid'>
            <label for="mail">Description</label>
            <textarea class="rounded mb-2 w-full bg-gray-100 border-[1px] border-black px-3"  name="contenu" id="contenu"  rows="2" ></textarea>
        </div>
        <?php
            if($nom == 'Vetements'){
                ?>
        <div class="grid">
            <label for="size">Sizes</label>
            <div class="flex flex-wrap gap-3">
                <div class="flex gap-1" >
                    <p>S</p>
                    <input  value="S" type="checkbox" name="size[]">
                </div>
                <div class="flex gap-1" >
                    <p>M</p>
                    <input  value="M" type="checkbox" name="size[]">
                </div>
                <div class="flex gap-1" >
                    <p>L</p>
                    <input  value="L" type="checkbox" name="size[]">
                </div>
                <div class="flex gap-1" >
                    <p>XL</p>
                    <input  value="XL" type="checkbox" name="size[]">
                </div>
                <div class="flex gap-1" >
                    <p>2XL</p>
                    <input  value="2XL" type="checkbox" name="size[]">
                </div>
                <div class="flex gap-1" >
                    <p>3XL</p>
                    <input  value="3XL" type="checkbox" name="size[]">
                </div>
                <div class="flex gap-1" >
                    <p>4XL</p>
                    <input  value="4XL" type="checkbox" name="size[]">
                </div>
            </div>
        </div>
                <?php
            }
        ?>
         <?php
            if($nom == 'Chaussures'){
                ?>
        <div class="grid">
            <label for="size">Sizes</label>
            <div class="flex flex-wrap gap-3">
            <div class="flex gap-1" >
                    <p>36</p>
                    <input  value="36" type="checkbox" name="size[]">
                </div>
                <div class="flex gap-1" >
                    <p>37</p>
                    <input  value="37" type="checkbox" name="size[]">
                </div>
                <div class="flex gap-1" >
                    <p>38</p>
                    <input  value="38" type="checkbox" name="size[]">
                </div>
                <div class="flex gap-1" >
                    <p>39</p>
                    <input  value="39" type="checkbox" name="size[]">
                </div>
                <div class="flex gap-1" >
                    <p>40</p>
                    <input  value="40" type="checkbox" name="size[]">
                </div>
                <div class="flex gap-1" >
                    <p>41</p>
                    <input  value="41" type="checkbox" name="size[]">
                </div>
                <div class="flex gap-1" >
                    <p>42</p>
                    <input  value="42" type="checkbox" name="size[]">
                </div>
                <div class="flex gap-1" >
                    <p>43</p>
                    <input  value="43" type="checkbox" name="size[]">
                </div>
                <div class="flex gap-1" >
                    <p>44</p>
                    <input  value="44" type="checkbox" name="size[]">
                </div>
                <div class="flex gap-1" >
                    <p>45</p>
                    <input  value="45" type="checkbox" name="size[]">
                </div>
                <div class="flex gap-1" >
                    <p>46</p>
                    <input  value="46" type="checkbox" name="size[]">
                </div>
                <div class="flex gap-1" >
                    <p>47</p>
                    <input  value="47" type="checkbox" name="size[]">
                </div>
            </div>
        </div>
                <?php
            }
        ?>
        <div class='grid'>
            <label for="titre">Nombre en stock</label>
            <input class="rounded mb-2 w-full border-[1px] bg-gray-100 border-black px-3" type="number" name='stock' >
        </div>
        <div class='grid'>
            <label for="titre">Prix du produit</label>
            <input class="rounded mb-2 w-full bg-gray-100 border-[1px] border-black px-3" type="number" name='prix'>
        </div>
        <input class='bg-gray-700  text-white p-x-20 w-full rounded font-medium hover:bg-gray-900 ' type="submit" name='add' value='Ajouter'>
    </form>
</div>  
<?php require_once('../../html_partials/footer.html.php'); ?>
