// Fonction pour afficher le popup
function openPopup() {
    var popup = document.getElementById('popup');
    popup.style.display = 'block';
}

// Fonction pour fermer le popup
function closePopup() {
    var popup = document.getElementById('popup');
    popup.style.display = 'none';
}

// Affiche le popup lorsque la page est entièrement chargée
window.addEventListener('DOMContentLoaded', function() {
    openPopup();
});
