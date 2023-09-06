<?php 
$title='Produits';
require_once('../../html_partials/public.header.php');
require_once('menu_bar.php');
?>
<section class="p-6 mx-auto ">
    <div class="flex gap-10">
        <div class="w-[55%]">
            <img class="rounded-2xl" src="images/iphone.jpg" alt="image du produit">
        </div>
        <div>
           
            <div class="mb-5 flex gap-40">
                <h1 class=" font-semibold text-xl">
                    Iphone 10 pro 
                </h1>
                <p class="text-blue-500 text-xl ">
                    Multimedia
                </p>
            </div>
            <p class="w-[50%] mb-8">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis dolor sapiente, dicta voluptates cupiditate obcaecati eius ut quae. Error unde quos impedit explicabo aspernatur officiis dolores quia, sunt nobis nesciunt.
            </p>
            <div class="flex gap-2">
                <p class="w-[100px] "><img class="rounded-xl" src="images/iphone.jpg" alt=""></p>
                <p class="w-[100px] "><img class="rounded-xl" src="images/iphone.jpg" alt=""></p>
                <p class="w-[100px] "><img class="rounded-xl" src="images/iphone.jpg" alt=""></p>
                <p class="w-[100px] "><img class="rounded-xl" src="images/iphone.jpg" alt=""></p>
            </div>
        </div>
    </div>
    
</section>
<?php
require_once('../../html_partials/public.footer.php');
?>