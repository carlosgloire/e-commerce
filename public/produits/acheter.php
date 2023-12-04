<?php
require_once('verificateur_achater.php');
require_once('../../functions.php');
$title=$titre;

 require_once('../../html_partials/public.header.php');
 not_user_connected();
?>

<p>Buy  <?php echo $titre?></p>
<?php require_once('../../html_partials/public.footer.php')?>