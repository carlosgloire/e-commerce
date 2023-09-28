<?php

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=my_database', 'root', '');

// Get the checkbox values
$checkboxValues = $_POST['checkboxes'];

// Insert the checkbox values into the database
$sql = 'INSERT INTO my_table (checkbox_value) VALUES (?)';
$stmt = $db->prepare($sql);

foreach ($checkboxValues as $checkboxValue) {
  $stmt->bindParam(1, $checkboxValue);
  $stmt->execute();
}

// Close the database connection
$db = null;

?>
