<?php
    $title='Produits ';
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
?>
<?php
// Check if the user is logged in
if (! isset($_SESSION['admin'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}
require_once('verificateur.admin.php');
?>
<?php require_once('header.admin.php'); ?>
<section class="grid grid-cols-5" >
    <?php require_once('navbar.php');?>
    <div class="col-span-4 p-6">
       <h1 class="text-xl font-bold mb-3">Produits</h1>         
       <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium, totam incidunt quaerat ipsam recusandae unde nam rem! Nesciunt aperiam harum nobis accusamus nemo voluptate necessitatibus. Commodi dicta, soluta repellat quaerat quidem itaque accusamus sed et perferendis hic atque sint debitis magnam? At eos laborum quos omnis. Odit recusandae inventore dolorum quas, sit hic ipsam qui eligendi explicabo voluptatibus blanditiis fuga natus excepturi ullam labore quibusdam omnis rem corrupti numquam? Explicabo, quo molestias maxime corrupti quis veniam quidem delectus assumenda soluta expedita sunt reprehenderit fugit aspernatur consequuntur sequi quam laboriosam? Assumenda optio velit nobis. Soluta dolorum ullam nobis et. Sunt quae placeat expedita nisi labore maxime ullam odit accusantium, quibusdam doloremque praesentium tempore, necessitatibus adipisci officiis? Architecto, doloremque illum? Totam nesciunt vero dolores non reiciendis at numquam nulla ipsam magnam, iusto atque quae magni eos deserunt, provident eligendi quam. Sunt ad, aliquam labore deleniti dolores dolore hic asperiores exercitationem soluta saepe illum fuga iusto nihil expedita rerum vel, vero magnam est, laborum odio facere! Similique fuga molestias architecto autem numquam quos dolorum, repudiandae minus voluptates itaque ipsa ex aliquid debitis rem beatae! Numquam explicabo voluptatem modi commodi. Repudiandae culpa dolores sint sapiente saepe totam quam temporibus rem libero deleniti repellendus possimus, excepturi sit dicta ullam, suscipit harum sed nemo eos! Magni modi nesciunt quia quod non est velit, repudiandae fuga, perspiciatis doloremque tempore provident odit! Inventore alias culpa qui architecto doloremque laborum temporibus repellendus! Quidem natus quis sit, dolor facilis, accusamus velit nemo provident odio autem delectus eum accusantium amet quaerat voluptate rem possimus repellat corporis sint praesentium adipisci consectetur maxime. Perferendis repellendus enim sunt, illo magnam aliquid suscipit quos velit sit nostrum porro, in dolores fuga quas veritatis cupiditate, similique quo eligendi itaque explicabo fugiat exercitationem. Quidem, ipsum inventore maxime recusandae et consequatur a in autem beatae culpa possimus asperiores voluptates nisi, placeat excepturi itaque harum voluptatem. Velit nemo odio eaque dicta, excepturi, nobis officia, dolores inventore nihil alias obcaecati molestias distinctio quia pariatur vero corrupti. Aspernatur inventore atque nobis officia veritatis ab id unde! Corrupti unde sunt quis deserunt at velit molestiae nam, tempora sequi voluptates temporibus doloremque minima inventore, repudiandae odio alias neque vero nostrum animi labore blanditiis fugiat. Aliquid saepe esse reiciendis sed unde? Exercitationem sint, reiciendis nisi nulla qui ipsa nam vel dolorem hic quod, necessitatibus quaerat natus debitis mollitia similique et ipsum est. Nemo quis cupiditate ipsam neque quos doloribus, ad magnam illum quibusdam accusamus eum sint odit distinctio iusto voluptatibus voluptatem maxime quas sed officia. Deserunt laboriosam aliquid sunt odio. Quae reiciendis ullam voluptatibus earum repellat voluptatem aperiam mollitia quia, tempore rem, totam qui dolor sequi culpa excepturi voluptatum reprehenderit illum vitae delectus a in aliquam sit. Vero sapiente ad optio! Iste corrupti libero minima nam at sequi ullam repudiandae quia molestiae dolorem velit consequuntur enim nesciunt, voluptatem repellat quam dolores porro qui dolorum hic neque explicabo impedit? Ipsa, dolor provident. Quos, veritatis similique voluptatum ex nobis maxime ratione, numquam totam molestiae impedit dicta voluptate minima iste rem exercitationem culpa magnam illum dignissimos laborum.</p>         
    </div>
</section>