<?php require_once('../database/db.php')?>
<!DOCTYPE html>
<html>
<head>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
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

<div id="products">
    <?php
     $stmt=$bdd->query('SELECT * FROM produits');
     $products=$stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php foreach ($products as $product): ?>
        <div class="product">
            <p><?php echo $product['titre']; ?></p>
            <a href="#" class="delete" data-product-id="<?php echo $product['id']; ?>">Delete</a>
            <div class="popup">
                <div class="popup-content">
                    <p class="warning">Voulez-vous supprimer ce produit <?php echo $product['titre']; ?></p>
                    <div>
                        <button class="close" id="closePopup">Annuler</button>
                        <a href="#" id="deleteProduct">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<script>
    // JavaScript code
    const deleteButtons = document.querySelectorAll('.delete');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            const productId = this.getAttribute('data-product-id');
            const popup = this.nextElementSibling;
            popup.style.display = 'block';

            const closePopup = popup.querySelector('.close');
            closePopup.addEventListener('click', function() {
                popup.style.display = 'none';
            });
        });
    });
</script>

</body>
</html>
