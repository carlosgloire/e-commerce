
<script type="text/javascript">
$(document).ready(function() {
  // Get the page name from the URL parameter (e.g., ?page=dashboard)
  const urlParams = new URLSearchParams(window.location.search);
  const activePage = urlParams.get('page');

  // Set the initial active link based on the URL parameter
  if (activePage === "Products") {
    $("#product-link").addClass("bg-gray-300");
  } else if (activePage === "Statistics") {
    $("#statistics-link").addClass("bg-gray-300");
  } else if (activePage === "add_product") {
    $("#product-link").addClass("bg-gray-300");
  }else {
    $("#dashboard-link").addClass("bg-gray-300");
  }
  // Handle the click on Dashboard link
  $("#dashboard-link").on("click", function(e) {
    e.preventDefault();
    $("#dashboard-link").addClass("bg-gray-300");
    $("#product-link").removeClass("bg-gray-300");
    $("#statistics-link").removeClass("bg-gray-300");
    $("#add_product").removeClass("bg-gray-300");
    window.location.href = "index.php?page=Dashboard";
  });

  // Handle the click on Product link
  $("#product-link").on("click", function(e) {
    e.preventDefault();
    $("#product-link").addClass("bg-gray-300");
    $("#dashboard-link").removeClass("bg-gray-300");
    $("#statistics-link").removeClass("bg-gray-300");
    $("#add_product").removeClass("bg-gray-300");
    window.location.href = "product.php?page=Products";
  });

  // Handle the click on Statistics link
  $("#statistics-link").on("click", function(e) {
    e.preventDefault();
    $("#statistics-link").addClass("bg-gray-300");
    $("#dashboard-link").removeClass("bg-gray-300");
    $("#product-link").removeClass("bg-gray-300");
    $("#add_product").removeClass("bg-gray-300");
    window.location.href = "statistics.php?page=Statistics";
  });

  // Handle the click on product_colors-link
  $("#add_product").on("click", function(e) {
    e.preventDefault();
    $("#product-link").addClass("bg-gray-300");
    $("#dashboard-link").removeClass("bg-gray-300");
    $("#statistics-link").removeClass("bg-gray-300");
    window.location.href = "categories.php?page=add_product";
  });

});
</script>


  