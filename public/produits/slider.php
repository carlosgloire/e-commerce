
<style>
        .slider-container {
            max-height: 500px;
            width: 100%;
            overflow: hidden;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
            max-height: 500px;
            width: 100%;
        }

        .slider img {
            width: 100%;
            height: 500px;
        }
    </style>
      <div class="slider-container max-w-full mx-auto  border-white border">
        <div class="relative">
            <div class="slider-container">
                <div class="overflow-hidden">
                    <div class="flex transition-transform ease-in-out duration-300 transform" id="slider">
                        <img src="slider/images_categories/vetements.jpg" alt="Image 1" class="">
                        <img src="slider/images_categories/aliments.jpg" alt="Image 2" class="w-full object-cover">
                        <img src="slider/images_categories/multimedia.jpg" alt="Image 3" class="w-full object-cover">
                        <img src="slider/images_categories/evenement.png" alt="Image 4" class="w-full object-cover">
                        <img src="slider/images_categories/mat_pro.jpg" alt="Image 5" class="w-full object-cover">
                        <img src="slider/images_categories/Multimedia.jpg" alt="Image 6" class="w-full object-cover">
                        <img src="slider/images_categories/services.jpg" alt="Image 7" class="w-full  object-cover">
                        <img src="slider/images_categories/automobile.jpg" alt="Image 8" class="w-full  object-cover">
                    </div>
                </div>
                <button id="prevBtn" class="absolute left-0 top-1/2 transform -translate-y-1/2 "><img src="slider/images/prev.png" alt="prev bouton" width="150px"></button>
                <button id="nextBtn" class="absolute right-0 top-1/2 transform -translate-y-1/2 "><img src="slider/images/next.png" alt="next bouton" width="150px"></button>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
   
