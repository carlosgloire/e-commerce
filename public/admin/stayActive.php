<?php 
    require_once('../../html_partials/header.html.php');
  
?>

<script type="text/javascript">
$(document).ready(function() {
  // Get the page name from the URL parameter (e.g., ?page=dashboard)
  const urlParams = new URLSearchParams(window.location.search);
  const activePage = urlParams.get('page');

  // Set the initial active link based on the URL parameter
  if (activePage === "product") {
    $("#product-link").addClass("bg-gray-300");
  } else if (activePage === "statistics") {
    $("#statistics-link").addClass("bg-gray-300");
  } else if (activePage === "product_colors") {
    $("#product_colors-link").addClass("bg-gray-300");
  } else {
    // Default to Dashboard if no parameter or unknown parameter
    $("#dashboard-link").addClass("bg-gray-300");
  }

  // Handle the click on Dashboard link
  $("#dashboard-link").on("click", function(e) {
    e.preventDefault();
    $("#dashboard-link").addClass("bg-gray-300");
    $("#product-link").removeClass("bg-gray-300");
    $("#statistics-link").removeClass("bg-gray-300");
    $("#help-link").removeClass("bg-gray-300");
    window.location.href = "index.php?page=dashboard";
  });

  // Handle the click on Product link
  $("#product-link").on("click", function(e) {
    e.preventDefault();
    $("#product-link").addClass("bg-gray-300");
    $("#dashboard-link").removeClass("bg-gray-300");
    $("#statistics-link").removeClass("bg-gray-300");
    $("#help-link").removeClass("bg-gray-300");
    window.location.href = "product.php?page=product";
  });

  // Handle the click on Statistics link
  $("#statistics-link").on("click", function(e) {
    e.preventDefault();
    $("#statistics-link").addClass("bg-gray-300");
    $("#dashboard-link").removeClass("bg-gray-300");
    $("#product-link").removeClass("bg-gray-300");
    $("#help-link").removeClass("bg-gray-300");
    window.location.href = "statistics.php?page=statistics";
  });

  // Handle the click on product_colors-link
  $("#product_colors-link").on("click", function(e) {
    e.preventDefault();
    $("#product_colors-link").addClass("bg-gray-300");
    $("#dashboard-link").removeClass("bg-gray-300");
    $("#product-link").removeClass("bg-gray-300");
    $("#statistics-link").removeClass("bg-gray-300");
    window.location.href = "product_colors.php?page=product_colors";
  });
});
</script>

<?php require_once('../../html_partials/footer.html.php'); ?>

  