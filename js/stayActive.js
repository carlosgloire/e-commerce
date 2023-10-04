
$(document).ready(function() {
    // Get the page name from the URL parameter (e.g., ?page=dashboard)
    const urlParams = new URLSearchParams(window.location.search);
    const activePage = urlParams.get('page');
  
    // Set the initial active link based on the URL parameter
    if (activePage === "product") {
      $("#product-link").addClass("bg-gray-300");
    } else if (activePage === "statistics") {
      $("#statistics-link").addClass("bg-gray-300");
    } else if (activePage === "help") {
      $("#help-link").addClass("bg-gray-300");
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
      window.location.href = "index.php?page=index";
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
  
    // Handle the click on Help link
    $("#help-link").on("click", function(e) {
      e.preventDefault();
      $("#help-link").addClass("bg-gray-300");
      $("#dashboard-link").removeClass("bg-gray-300");
      $("#product-link").removeClass("bg-gray-300");
      $("#statistics-link").removeClass("bg-gray-300");
      window.location.href = "help.php?page=help";
    });
  });