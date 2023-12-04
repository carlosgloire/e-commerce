
<?php 

?>
    <header id="header" class="flex justify-between px-20 " style="z-index: 10;position:fixed;background-color: #010e27f6;padding-top:14px;padding-bottom:15px;width:100%">
       
        <div class="flex gap-20">
        <a href="index.php">
            <img src="images/gs_logo.png" alt="logo glory shop" width="30px" title="Acceuil">
        </a>
        <p class="text-white text-xl  font-semibold">ADMIN</p>  
        </div>
        
         <div class="flex ">
         <form class="form-horizontal" action=" " method="post">
         <div class="flex gap-3 ">
                <input  class=" border-none outline-none bg-transparent text-white px-3 placeholder-white" type="search" id="search" name="search" placeholder="Rechercher un produit">
                <button type="submit" name="save" class="bg-blue-500 text-white px-2 mb-5 shadow-sm rounded text-center text-base hidden" >Submit</button>   
        </div>
         </form>
         </div>
     </header>

     <?php    
   
?>