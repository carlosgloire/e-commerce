<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card searching</title>
    <style>
        .card {
            transition: all 0.5s ease;
            cursor: pointer;
            box-shadow: 0px 0px 6px -4px rgba(0,0,0,0.75);
            border-radius: 10px;
        } 
        .card:hover {
            box-shadow: 0px 0px 51px -36px rgba(0,0,0,1);
        }
    </style>
</head>
<body>
    <!-- HTML structure for the search functionality -->
    <h2>Product searching</h2>
    <input type="text" id="myinput">
    <div class="container">
        <h3 id="para" style="display: none;">Not found</h3>
    </div>
    <div id="card"></div>

    <?php
        // PHP code to fetch data from the database
        require_once('../database/db.php');
        try {
            // Fetch products from the database
            $stmt = $bdd->query("SELECT c.cat_id, c.nom AS category_name, p.id, p.titre, SUBSTRING(p.contenu, 1, 27) AS description, p.filename, p.prix FROM produits p, categories c WHERE c.cat_id = p.cat_id ORDER BY category_name ASC,titre ASC");

            // Fetch and store all products in a PHP array
            $galleryArray = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $galleryArray[] = [
                    'id' => $row['id'],
                    'name' => $row['titre'],
                    'src' => $row['filename'],
                    'desc' => $row['description'],
                ];
            }

            // Convert PHP array to JSON for JavaScript usage
            $galleryJson = json_encode($galleryArray);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    ?>

    <!-- JavaScript code for live search and initial display -->
    <script>
        // Variables to store filtered and original product arrays
        let filterarray = [];
        let galleryarray = <?php echo $galleryJson; ?> || [];

        // Function to display products in the HTML
        function showgallery(currarray){
            document.getElementById("card").innerHTML = ""; 
            for (var i = 0; i < currarray.length; i++) {
                document.getElementById("card").innerHTML +=
                    `<a href="checkbox.php" class="card">
                        <div>
                            <h4>${currarray[i].name}</h4>
                            <img src="${currarray[i].src}" width="100%" height="320px" />
                            <p>${currarray[i].desc}</p>
                            <button>More</button>
                        </div>
                    </a>`;
            }
        }

        // Event listener for live searching using keyup input
        document.getElementById("myinput").addEventListener("keyup", function () {
            // Convert search text to lowercase for case-insensitive comparison
            let text = document.getElementById("myinput").value.toLowerCase();
            // Filter products based on the search text
            filterarray = galleryarray.filter(function (a) {
                // Convert product name to lowercase for case-insensitive comparison
                return a.name.toLowerCase().includes(text);
            });

            // Display results or "Not found" message
            if (text === "") {
                showgallery(galleryarray);
            } else {
                if (filterarray.length === 0) {
                    document.getElementById("para").style.display = 'block';
                    document.getElementById("card").innerHTML = "";
                } else {
                    showgallery(filterarray);
                    document.getElementById("para").style.display = "none";
                }
            }
        });

        // Initial display of all products
        showgallery(galleryarray);
    </script>
</body>
</html>
