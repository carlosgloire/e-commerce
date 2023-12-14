<?php
    $title='Dashboard ';
    require_once('../../html_partials/header.html.php');
    require_once('../../functions.php');
    require_once('../../database/db.php'); 
    require_once ('../../js/flash.php');
   
  
?>

<?php

require_once('verificateur.admin.php');
?>
<?php require_once('header.admin.php'); ?>
<section class="grid grid-cols-5 pt-16" >
    <?php require_once('navbar.php');?>
    <div class="col-span-4 p-6 text-center">
        <h1 class="text-xl font-semibold mb-3 ">DASHBOARD</h1>  
        <div id="chart-container" style="height: 400px;"></div> 
         <?php require_once('Hichart/product_chart.php'); ?>     
    </div>
</section>
<?php require_once('stayActive.php'); ?>