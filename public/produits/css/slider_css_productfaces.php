<style>
.slider {
    height: 90vh;
    position: relative;
}

.slider img {
    box-shadow: 0px 0px 4px 0px gray;
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
    display: none;
    color: #fff;
    font-size: 4rem;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
}

.suivant {
    right: 1rem;
}

.precedent {
    left: 1rem;
}
.slider:hover .suivant, .slider:hover .precedent {
   display: block;
}

</style>