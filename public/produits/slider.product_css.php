<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.slider {
    height: 80vh;
    position: relative;
}

.slider div {
    object-fit: cover;
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    transition: opacity .8s;
}

.slider img.active {
    opacity: 1;
}

.suivant, .precedent {
    color: #fff;
    font-size: 6rem;
    position: absolute;
    transform: translateY(-50%);
    cursor: pointer;
}

.suivant {
    right: 1rem;
}

.precedent {
    left: 1rem;
}
</style>