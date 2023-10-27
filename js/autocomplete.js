document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("search");
    const suggestionBox = document.getElementById("suggestion-box");
  
    searchInput.addEventListener("input", function() {
      const searchTerm = searchInput.value;
      
      if (searchTerm.length >= 2) {
        // Envoyer une requête AJAX pour obtenir des suggestions
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "autocomplete_handler.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            const suggestions = JSON.parse(xhr.responseText);
            displaySuggestions(suggestions);
          }
        };
        xhr.send("search=" + searchTerm);
      } else {
        suggestionBox.innerHTML = "";
      }
    });
  
    function displaySuggestions(suggestions) {
      let html = "";
      for (let suggestion of suggestions) {
        html += `<div class="suggestion">${suggestion}</div>`;
      }
      suggestionBox.innerHTML = html;
  
      // Gérer la sélection d'une suggestion
      const suggestionElements = suggestionBox.getElementsByClassName("suggestion");
      for (let element of suggestionElements) {
        element.addEventListener("click", function() {
          searchInput.value = element.innerText;
          suggestionBox.innerHTML = "";
        });
      }
    }
  });
  