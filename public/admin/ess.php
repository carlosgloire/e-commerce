<!DOCTYPE html>
<html>
<head>
<title>File Upload</title>
</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">

<input type="file" name="fileToUpload">
<input type="submit" value="Upload File">

</form>

<?php

if (isset($_FILES['fileToUpload'])) {

  // Get the file name
  $fileName = $_FILES['fileToUpload']['name'];

  // Get the file size
  $fileSize = $_FILES['fileToUpload']['size'];

  // Get the file type
  $fileType = $_FILES['fileToUpload']['type'];

  // Display the file information
  echo "File name: $fileName<br>";
  echo "File size: $fileSize bytes<br>";
  echo "File type: $fileType<br>";

}

?>

</body>
</html>
