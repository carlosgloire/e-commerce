
<style>
        .slider-container {
            max-height: 270px;
            width: 100%;
            overflow: hidden;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
            max-height: 270px;
            width: 100%;
        }

        .slider img {
            width: 100%;
            height: 270px;
        }
    </style>
    <div class="slider-container max-w-3xl mx-auto  rounded-md border-white border">
        <div class="relative">
            <div class="slider-container">
                <div class="overflow-hidden">
                            <div class="flex transition-transform ease-in-out duration-300 transform" id="slider">
                                <img src="images_categories/vetements3.png" alt="Image 1" class="w-full object-cover">
                                <img src="images_categories/aliments.jpg" alt="Image 2" class="w-full object-cover">
                                <img src="images_categories/Multimedia.jpg" alt="Image 3" class="w-full object-cover">
                                <img src="images_categories/evenement.png" alt="Image 4" class="w-full object-cover">
                                <img src="images_categories/mat_pro.jpg" alt="Image 5" class="w-full object-cover">
                                <img src="images_categories/Multimedia.jpg" alt="Image 6" class="w-full object-cover">
                                <img src="images_categories/services.jpg" alt="Image 7" class="w-full  object-cover">
                                <img src="images_categories/automobile.jpg" alt="Image 8" class="w-full  object-cover">
                            </div>
                        </div>
                    <button id="prevBtn" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-600 text-white px-4 py-2 rounded-l-md shadow-md">Précédent</button>
                    <button id="nextBtn" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-600 text-white px-4 py-2 rounded-r-md shadow-md">Suivant</button>
                </div>
            </div>
    </div>
    <script src="script.js"></script>
   
