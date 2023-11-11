
    <?php
    $title='Connexion utilisateur';
    require_once('../html_partials/public.header.php');
   
  
    ?>
    <style>
    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 1;
        transition: 1s ease-in-out;
    }

    .popup-content {
        background-color: #fff;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        text-align: center;
    }

    .close {
        cursor: pointer;
    }

    .warning {
        color: #666;
        font-size: 16px;
        margin-bottom: 10px;
    }

    .popup-content div button {
        background-color: #3498db;
        color: white;
        border-radius: 5px;
        padding-left: 10px;
        padding-right: 10px;
    }

    .popup-content div a {
        background-color: #f82b2b;
        color: white;
        border-radius: 5px;
        padding-left: 10px;
        padding-right: 10px;
        padding-bottom: 3px;
        padding-top: 3px;
    }

    /* Additional styles for products */
    .product {
        margin: 10px;
    }

    .product a.delete {
        background-color: #f82b2b;
        color: white;
        border-radius: 5px;
        padding: 5px 10px;
        text-decoration: none;
        margin-left: 10px;
    }
</style>
    <script type="text/javascript">
        //This code serve to prevent the user to go back after logging in
        function preventBack(){window.history.forward()};
        setTimeout("preventBack()",0);
        window.onunload=function(){null;}
       
    </script>
    <div class='max-w-lg mx-auto py-4 pl-24 pr-24  mt-[10%] text-lg rounded-lg  shadow-sm bg-white'>
      <p class=""><img class="mx-auto   items-center" src="../produits/images/gs_logo.png" alt="Logo Glory Shop" width="60px"></p>
      <h1 class="text-3xl mb-6 " >Connexion utilisateur</h1>
      <form action="" method='post' class='mb-2'>
        <div class='grid'>
            <label for="username">Nom d'utilisateur ou Email</label>
            <input class="rounded mb-4 w-full outline-none border-[1px] border-gray-400 bg-gray-100 px-3" type="text" name='username'  value="<?php echo $username; ?>" >
        </div>
        <div class='grid'> 
            <label for="password" method='password'>Mot de passe</label>
            <input class="rounded mb-6 w-full border-[1px] border-gray-400 px-3 bg-gray-100" type="password" name='password'>
        </div>
        <input id="delete" class='bg-gray-500 text-white p-x-20 w-full rounded font-medium hover:bg-gray-700' type="submit" name='submit' value='Connexion'>
        <div id="popup" class="popup">
        <div class="popup-content">
            <p class="warning">Voulez-vous supprimer ce produit?</p>
            <div>
                <button class="close" id="closePopup">Annuler</button>
                <a href="delete.php" >Supprimer</a>
            </div>
        </div>
    </div>
    </form> 

    <p class="text-base">N'avez-vous pas un compte? <a class="hover:bg-transparent text-blue-600 text-base pl-0" href="signup.php">inscrivez-vous</a> </p>
    </div>
    <?php if(isset($_POST['submit']) && ! empty($_SESSION['flash_message']))
    {
    ?>
        <div id='flash-message' class='pl-4 leading-5 shadow-lg mt-1 rounded bg-white text-red-500 text-[16px] transition-opacity duration-500 ease-in max-w-lg mx-auto '><?php echo $_SESSION['flash_message']?></div>
    <?php
    }
    ?> 
   <?php require_once('../../html_partials/public.footer.php');?>
   <script>
        // JavaScript code
        const deleteButtons = document.querySelectorAll('.delete');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                
                const popup = document.getElementById('popup');
                const deleteLink = document.getElementById('deleteProduct');

                popup.style.display = 'block';
            });
        });

        document.getElementById('closePopup').addEventListener('click', function() {
            document.getElementById('popup').style.display = 'none';
        });
    </script>
    <?php require_once('../html_partials/public.footer.php');?>