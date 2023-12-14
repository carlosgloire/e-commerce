<?php
// Establish a connection to your database
$bdd = new PDO('mysql:host=localhost;dbname=e-commerce', 'root', '');

// Check for connection errors
if (!$bdd) {
    die("Connection failed: " . $bdd->errorInfo()[2]);
}

// Retrieve the search term from the query parameter
$searchTerm = isset($_GET['q']) ? $_GET['q'] : '';

// Perform a simple search query using the search term
$stmt = $bdd->prepare("SELECT id, titre, contenu as description FROM produits WHERE titre LIKE :searchTerm");
$stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
$stmt->execute();

echo "<h2>Search Results for: $searchTerm</h2>";

// Display the search results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!empty($results)) {
    echo "<ul>";
    foreach ($results as $row) {
        echo "<li>ID: " . $row['id'] . ", Titre: " . $row['titre'] . ", Description: " . $row['description'] . "</li>";
        // You can display other columns as needed
    }
    echo "</ul>";
} else {
    echo "No results found.";
}

// Close the database connection
$bdd = null;
?>
