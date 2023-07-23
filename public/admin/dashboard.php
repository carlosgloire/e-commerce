<?php
    $title='Dashboard admin';
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');

  
?>
<?php 
    require_once('verificateur.dashboard.php');
    require_once('../../html_partials/header.html.php'); 
?>
        <header id="header" class="flex bg-gray-700 justify-between px-20 py-4 text-white shadow-sm mb-1">
       <h1 class="text-xl font-semibold">E-COMMERCE</h1>
        <form action="verificateur.dashboard.php" method="post">
           <button name="logout" class="bg-white text-gray-700 p-[3px] rounded-xl hover:bg-gray-200">Se Déconnecter</button>   
        </form>
       
   </header>
     
   <section class="grid grid-cols-5" >
           <nav class=" bg-white shadow-lg h-full col-span-1">
               <aside class="grid gap-4 mt-6">
                   <a href="#" class="dashboard">Dashboard</a>
                   <a href="#">Communication</a>
                   <a href="#">Menu inactif</a>
                   <a href="#">Menu inactif</a>
                   <a href="#">Menu inactif</a>
                   <a href="#">Menu inactif</a>
                   <a href="#">Menu inactif</a>
               </aside>   
           </nav>
           <div class="col-span-4 p-6">
            <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus ex, eum illo recusandae et totam laudantium asperiores ipsam in consectetur saepe itaque minima porro, autem amet tempora animi architecto repellat excepturi corrupti fugit, quia dolor ut. A, ipsum veniam, repudiandae excepturi voluptas porro suscipit autem sequi explicabo, atque harum magnam laborum quaerat culpa non! Adipisci consequatur suscipit dolorem, veniam impedit optio eligendi reprehenderit asperiores alias numquam quaerat molestiae magni voluptatibus, a consequuntur voluptatum dolores inventore harum. Facilis animi magnam nisi asperiores natus odio, nihil fuga ullam dolores quibusdam repellat eos sequi labore consequuntur nostrum iste. Veritatis, soluta neque nostrum ipsa ipsum distinctio necessitatibus quis aperiam enim earum tempora voluptates, impedit eaque consectetur. Consequuntur nihil fuga esse similique cupiditate! Placeat ipsam, cumque dolore beatae ducimus laborum commodi voluptatem, fugiat sed deleniti, accusantium harum ipsa incidunt numquam quas voluptatum inventore amet. Itaque culpa minus asperiores aperiam voluptas laborum atque praesentium exercitationem! Laborum asperiores tempore vel, molestiae exercitationem, maiores sequi alias similique ipsum aliquam magnam obcaecati quaerat autem inventore consectetur corrupti. Possimus sit nulla suscipit ea magni. Libero aut nesciunt, similique fugiat iusto mollitia, iste laudantium nobis delectus possimus nam harum ducimus perspiciatis illo neque nemo cupiditate molestias reprehenderit! Alias autem architecto, aliquam eum fugit nihil, quae ducimus explicabo provident fuga soluta consectetur ipsum ab enim, sequi praesentium ea? Ut, voluptate ea! Provident iusto sapiente beatae vero perferendis. Eos reprehenderit tempora dignissimos facere labore magni dolore fugit voluptate voluptates velit exercitationem adipisci quaerat quasi voluptatum, sint in culpa eveniet, quam ipsa fuga sed consectetur iure quia? Dolorum dolore voluptatum error, labore fugit ex tempore deleniti explicabo impedit, magnam doloremque quasi dolor maxime exercitationem quia temporibus sapiente, porro repudiandae? Praesentium quaerat accusamus iusto facere natus? Magni praesentium adipisci illum quas quibusdam libero aperiam cumque. Atque quod doloribus consectetur quas rem nostrum veniam quisquam suscipit ab officiis blanditiis ipsum quam sed quasi ratione nisi enim dolorum, nam repellat! Perferendis incidunt assumenda rem numquam odit! Minima soluta numquam temporibus, deserunt beatae atque culpa maiores reiciendis adipisci commodi omnis dolorum nostrum eligendi illo sit rerum porro dicta dignissimos ipsam dolorem distinctio minus. Aspernatur cum deleniti voluptatum fugit eaque obcaecati quis, similique omnis! Ducimus beatae totam esse earum, praesentium nisi qui voluptatum nam ea perferendis iusto, eveniet quasi, eum aliquam eligendi assumenda officia quidem quos. Mollitia voluptate corrupti tenetur quam similique voluptatem dicta suscipit sint facilis excepturi! Commodi itaque vero tenetur reprehenderit obcaecati dignissimos distinctio est porro molestias neque consectetur, doloremque sequi quia corrupti ut reiciendis! Doloremque minus molestias, odio, illum fugit amet dignissimos laborum sapiente temporibus quibusdam voluptas. Aut neque nisi ex minima fuga hic eius porro suscipit .</P>
           </div>
   </section>
 
 <?php require_once('../../html_partials/footer.html.php'); ?>