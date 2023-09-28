<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mon site en mode sombre</title>
  <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
  <script src="js.js"></script>
</head>
<body class="dark">

  <!-- Contenu du site -->

  <button id="mode-sombre" class="bg-white text-black py-2 px-4 rounded-md" onclick="toggleDarkMode()">
    Mode sombre
  </button>

  <div class="bg-gray-900 text-white p-4">
    Ce texte est affiché en mode sombre.
  </div>

</body>
</html>
