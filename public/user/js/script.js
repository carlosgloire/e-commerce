const slider = document.getElementById("slider");
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");

let slideIndex = 0;

function showSlide(n) {
    if (n < 0) {
        slideIndex = slider.children.length - 1;
    } else if (n >= slider.children.length) {
        slideIndex = 0;
    }
    slider.style.transform = `translateX(-${slideIndex * 100}%)`;
}

prevBtn.addEventListener("click", () => {
    slideIndex--;
    showSlide(slideIndex);
});

nextBtn.addEventListener("click", () => {
    slideIndex++;
    showSlide(slideIndex);
});

// Afficher la première image au chargement de la page
showSlide(slideIndex);
