
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
    <div class="max-w-3xl  mx-auto p-10">
        <div class="relative">
            <div class="slider-container">
                <div class="overflow-hidden">
                            <div class="flex transition-transform ease-in-out duration-300 transform" id="slider">
                                <img src="images/vetement.jpg" alt="Image 1" class="w-full">
                                <img src="images/aliments.jpg" alt="Image 2" class="w-full">
                                <img src="images/boissons.jpg" alt="Image 3" class="w-full">
                                <img src="images/evenement.png" alt="Image 4" class="w-full">
                                <img src="images/mat_pro.jpg" alt="Image 5" class="w-full">
                                <img src="images/Multimedia.jpg" alt="Image 6" class="w-full">
                                <img src="images/services.jpg" alt="Image 7" class="w-full">
                                <img src="images/vetements3.png" alt="Image 8" class="w-full">
                            </div>
                        </div>
                    <button id="prevBtn" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-600 text-white px-4 py-2 rounded-l-md shadow-md">Précédent</button>
                    <button id="nextBtn" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-600 text-white px-4 py-2 rounded-r-md shadow-md">Suivant</button>
                </div>
            </div>
           
    </div>
    <script src="script.js"></script>
   
