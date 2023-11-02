let img__slider = document.getElementsByClassName('img__slider');
let etape = 0;
let nbr__img = img__slider.length;
let precedent = document.querySelector('.precedent');
let suivant = document.querySelector('.suivant');

function enleverActiveImages() {
    for (let i = 0; i < nbr__img; i++) {
        img__slider[i].classList.remove('active');
    }
}

suivant.addEventListener('click', function () {
    if (etape < nbr__img - 1) {
        etape++;
    }
    enleverActiveImages();
    img__slider[etape].classList.add('active');
});

precedent.addEventListener('click', function () {
    if (etape > 0) {
        etape--;
    }
    enleverActiveImages();
    img__slider[etape].classList.add('active');
});
