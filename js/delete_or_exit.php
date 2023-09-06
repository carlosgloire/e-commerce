<script>
  function confirmAction() {
    var result = confirm("Voulez-vous supprimer ce produit?");
    if (result) {
      alert("Le produit sera supprimé definitivement");
      "edit.php?id=<?php echo $row['id'];?>"
      header('location:delete.product');
    }
  }
</script>
