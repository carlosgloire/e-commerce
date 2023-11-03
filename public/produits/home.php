<?php 
$title = 'Accueil';
require_once('../../html_partials/public.header.php');
require_once('../../functions.php');
require_once('../../database/db.php'); 
require_once('../../js/flash.php');
require_once('css/pagination.php');
?>

<div class="">
    <?php require_once('menu_bar.php');?>
</div>

<div class="flex justify-between pr-10 pt-16">
    <p></p>
    <h1 class="ml-10 text-xl mt-4 mb-4 font-medium">NOS PRODUITS</h1> 
    <?php if(isset($_POST['acheter']) && !empty($_SESSION['flash_message'])) { ?>
        <div id='flash-message' class='pl-4 leading-5 shadow-lg mt-1 rounded bg-white text-red-500 text-[16px] transition-opacity duration-500 ease-in max-w-lg mx-auto '><?php echo $_SESSION['flash_message']?></div>
    <?php } ?>   
    <p class="text-gray-500">
        <?php
        // Query to count the number of products
        $requete = $bdd->prepare("SELECT COUNT(id) AS nombre FROM produits");
        $requete->execute();
        while ($nombre = $requete->fetch()) {
            echo $nombre['nombre'] . ($nombre['nombre'] < 1 ? ' produit publié' : ' produits publiés');
        }
        ?>
    </p>
</div>

<div class="mb-2 w-full">
    <?php require_once('slider2.php')?>
</div>

<?php
// SQL query to select all categories and their associated products
$stmt = $bdd->query("SELECT c.cat_id, c.nom AS category_name, p.id, p.titre, SUBSTRING(p.contenu, 1, 27) AS description, p.filename, p.prix FROM produits p LEFT JOIN categories c ON c.cat_id = p.cat_id ORDER BY category_name ASC");
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$currentCategory = null;
$categories = [];

foreach ($result as $row) {
    $categoryName = $row['category_name'];

    if (!isset($categories[$categoryName])) {
        $categories[$categoryName] = [];
    }

    $categories[$categoryName][] = $row;

    // If a new category is encountered, display the category name
    if ($currentCategory !== $categoryName) {
        if ($currentCategory !== null) {
            echo "</section>"; // Close the previous category flex container
            displayCategoryPagination($currentCategory);
        }
        echo "<h2 class='text-xl pl-4 font-semibold mt-4 mb-2'>$categoryName</h2>";
        echo "<section class='px-4 flex  gap-6' id='content$categoryName'>";
        $currentCategory = $categoryName;
    }

    displayProduct($row);
}

echo "</section>"; // Close the last category flex container
displayCategoryPagination($currentCategory);//Displaying the last pagination
?>

<section>
    <?php require_once('comments_users.php') ?>
</section>

<script>
// JavaScript code here
const itemsPerPage = 4; // Change the number of items per page

function showPage(categoryName, pageNumber) {
    const content = document.getElementById('content' + categoryName);
    const pagination = document.getElementById('pagination' + categoryName);

    const items = content.children;
    const start = (pageNumber - 1) * itemsPerPage;
    const end = start + itemsPerPage;

    for (let i = 0; i < items.length; i++) {
        items[i].style.display = i >= start && i < end ? 'block' : 'none';
    }
}

function updatePagination(categoryName, currentPage) {
    const content = document.getElementById('content' + categoryName);
    const pagination = document.getElementById('pagination' + categoryName);

    const items = content.children;
    const itemCount = items.length;
    const pageCount = Math.ceil(itemCount / itemsPerPage);

    pagination.innerHTML = '';

    for (let i = 1; i <= pageCount; i++) {
        const li = document.createElement('aside');
        li.textContent = i;
        li.addEventListener('click', () => {
            // Remove the 'active' class from the previously active element
            const prevActive = pagination.querySelector('.active');
            if (prevActive) {
                prevActive.classList.remove('active');
            }
            
            showPage(categoryName, i);
            li.classList.add('active');
        });

        if (i === currentPage) {
            li.classList.add('active');
        }

        pagination.appendChild(li);
    }
}

// Initialize pagination for each category
<?php foreach (array_keys($categories) as $categoryName) { ?>
    showPage('<?php echo $categoryName; ?>', 1);
    updatePagination('<?php echo $categoryName; ?>', 1);
<?php } ?>
</script>


<?php require_once('../../html_partials/public.footer.php'); ?>

<?php
//Function to display products
function displayProduct($row) {
    ?>
      <aside class="shadow-sm p-3  border rounded bg-white w-[270px]" >
            <div class="flex justify-between">
                <h1 class="mb-3 text-blue-500">
                    <?php echo $row['titre']; ?>
                </h1>
                <p class="text-gray-400"><?php echo $row['category_name']; ?></p>
            </div>
            <div class="flex mt-1 gap-10">
                <img class="rounded w-[250px] h-[250px] object-cover" src="../admin/image_produits_db/<?php echo $row['filename']; ?>">
            </div>
            <div>
                <?php
                echo $row['description'] . '...';
                ?>
            </div>
            <div class="flex gap-1 ">
                <p>
                <?php
                echo $row['prix'] ;
                ?>
                </p>
                <p class="items-center text-green-500">$</p>
            </div>
            <div class="flex gap-6 py-2">
                <form action="acheter.php" method="post">
                    <button class="bg-blue-500 text-white px-2  shadow-sm rounded text-center text-base" name="acheter">Acheter</button>
                </form>
                <p>
                    <a class="bg-gray-500 text-white px-2 py-[3px]  shadow-sm rounded text-center text-base" href="voir_en_detail.php?id=<?php echo $row['id'] ?>">Voir en Detail</a>
                </p>
            </div>
        </aside>
    <?php
}
//Function to display pagination per each category
function displayCategoryPagination($categoryName) {
    echo "<section class='pagination' id='pagination$categoryName'></section>";
}
?>
