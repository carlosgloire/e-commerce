<?php
// Assurez-vous d'ajuster ces paramètres en fonction de votre configuration de base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "e-commerce";

// Connexion à la base de données
try {
    $bdd = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $mot_de_passe);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Échec de la connexion à la base de données : " . $e->getMessage());
}

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération du nom saisi
    $nom = isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]) : '';

    // Récupération des valeurs des cases à cocher
    $fruits = isset($_POST["fruit"]) ? $_POST["fruit"] : [];

    // Convertir les fruits en une seule chaîne de caractères
    $fruits_string = implode(', ', $fruits);

    // Ajout des valeurs dans la base de données
    $requete = "INSERT INTO table_fruits (nom, fruit) VALUES (:nom, :fruits)";
    $statement = $bdd->prepare($requete);

    // Liaison des paramètres
    $statement->bindParam(':nom', $nom);
    $statement->bindParam(':fruits', $fruits_string, PDO::PARAM_STR);  // Explicitly specify the parameter type

    // Exécution de la requête
    $resultat = $statement->execute();

    if (!$resultat) {
        echo "Erreur lors de l'ajout des valeurs : ";
        print_r($statement->errorInfo());
    }

    echo "Valeurs ajoutées avec succès dans la base de données.";
}

// Récupération des données depuis la base de données
$requete_select = "SELECT DISTINCT nom, fruit FROM table_fruits";
$resultat_select = $bdd->query($requete_select);
?>