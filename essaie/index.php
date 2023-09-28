<?php require_once('essaie.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="insert_checkboxes.php" method="post">
  <input type="checkbox" name="checkboxes[]" value="checkbox_value_1">
  <input type="checkbox" name="checkboxes[]" value="checkbox_value_2">
  <input type="checkbox" name="checkboxes[]" value="checkbox_value_3">
  <input type="submit" value="Submit">
</form>

</body>
</html>