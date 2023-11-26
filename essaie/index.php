<?php require_once('checkbox.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Fruits</title>
    <style>
        /* Ajoutez vos styles CSS personnalisés ici */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4caf50;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" required>

        <label>Fruits :</label>
        <label>
            <input type="checkbox" name="fruit[]" value="banane"> Banane
        </label>
        <label>
            <input type="checkbox" name="fruit[]" value="citron"> Citron
        </label>
        <label>
            <input type="checkbox" name="fruit[]" value="avocat"> Avocat
        </label>
        <label>
            <input type="checkbox" name="fruit[]" value="ananas"> Ananas
        </label>
        <label>
            <input type="checkbox" name="fruit[]" value="orange"> Orange
        </label>

        <button type="submit">Ajouter dans la base de données</button>
    </form>

    <!-- Affichage des données dans un tableau -->
    <h2>Données dans la base de données</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Fruits</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Affichage des données dans le tableau
            while ($row = $resultat_select->fetch(PDO::FETCH_ASSOC)) {
                // Séparer les fruits dans des lignes distinctes
                $fruits_array = explode(', ', $row['fruit']);
                $nom = htmlspecialchars($row['nom']);
                
                // Utiliser la fonction max pour obtenir le nombre maximum de fruits parmi tous les enregistrements
                $max_fruits = count($fruits_array);
                
                // Créer des lignes pour chaque fruit
                for ($i = 0; $i < $max_fruits; $i++) {
                    echo "<tr>";
                    
                    // Afficher le nom uniquement dans la première colonne
                    if ($i === 0) {
                        echo "<td rowspan=\"$max_fruits\">$nom</td>";
                    }
                    
                    echo "<td>" . htmlspecialchars($fruits_array[$i]) . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Fermeture de la connexion à la base de données
$bdd = null;
?>
<?php
/*
Bien sûr, voici une explication en français :

1. **`while ($row = $resultat_select->fetch(PDO::FETCH_ASSOC)) {`**: Cela initialise une boucle `while` qui récupère chaque ligne du résultat (`$resultat_select`) sous forme de tableau associatif (`PDO::FETCH_ASSOC`). La boucle continue tant qu'il y a des lignes à récupérer.

2. **`$fruits_array = explode(', ', $row['fruits_selectionnes']);`**: Cette ligne prend la valeur de la colonne 'fruits_selectionnes' de la ligne actuelle (`$row`) et utilise la fonction `explode` pour diviser la chaîne en un tableau. Le délimiteur utilisé est ', ' (virgule et espace), supposant que les fruits sont stockés sous forme de chaîne séparée par des virgules.

3. **`$nom = htmlspecialchars($row['nom']);`**: Cette ligne prend la valeur de la colonne 'nom' de la ligne actuelle (`$row`) et applique la fonction `htmlspecialchars` pour échapper les caractères spéciaux. Cela est fait pour éviter des vulnérabilités potentielles de sécurité telles que les attaques de script intersites (XSS) lors de l'affichage d'une entrée utilisateur.

4. **`$max_fruits = count($fruits_array);`**: Cette ligne calcule le nombre d'éléments dans le tableau `$fruits_array`, représentant le nombre de fruits sélectionnés pour la personne actuelle.

5. **`for ($i = 0; $i < $max_fruits; $i++) {`**: Cela initialise une boucle `for` qui itère sur chaque élément du tableau `$fruits_array`.

6. **`echo "<tr>";`**: Cela affiche le début d'une ligne de tableau HTML (`<tr>`).

7. **`if ($i === 0) { echo "<td rowspan=\"$max_fruits\">$nom</td>"; }`**: Cette condition vérifie si l'itération actuelle est la première (`$i === 0`). Si c'est le cas, elle affiche une cellule de tableau (`<td>`) avec le nom de la personne (`$nom`) et définit l'attribut `rowspan` sur `$max_fruits`. Cet attribut spécifie le nombre de lignes qu'une cellule doit couvrir.

8. **`echo "<td>" . htmlspecialchars($fruits_array[$i]) . "</td>";`**: Cela affiche une cellule de tableau avec le fruit actuel extrait du tableau `$fruits_array`. La fonction `htmlspecialchars` est utilisée pour échapper les caractères spéciaux.

9. **`echo "</tr>";`**: Cela affiche la balise de fermeture pour la ligne du tableau HTML (`</tr>`).

L'effet global de ce code est de créer un tableau où le nom de chaque personne est affiché dans la première colonne, et les fruits qu'ils ont sélectionnés sont affichés dans des lignes distinctes de la deuxième colonne. L'utilisation de `rowspan` garantit que le nom de la personne couvre toutes les lignes correspondant à leurs fruits sélectionnés.
*/
?>