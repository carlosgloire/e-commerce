<?php require_once('search.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Bar with PHP and Database</title>
</head>
<body>

  <h2>Search Bar with PHP and Database</h2>

  <!-- The form element with method="get" -->
  <form action="search.php" method="get">
    <!-- Input field for search term -->
    <label for="searchTerm">Search:</label>
    <input type="text" id="searchTerm" name="q">

    <!-- The submit button -->
    <input type="submit" value="Search">
  </form>

</body>
</html>
