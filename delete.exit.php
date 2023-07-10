<!DOCTYPE html>
<html>
<head>
  <title>Delete or Exit</title>
  <script>
    function confirmAction() {
      var result = confirm("Are you sure you want to delete?");
      if (result) {
        alert("Delete action will be performed.");
        // Perform delete action here
      } else {
        alert("Exiting without deleting.");
      }
    }
  </script>
</head>
<body>
  <button onclick="confirmAction()">Delete or Exit</button>
</body>
</html>
