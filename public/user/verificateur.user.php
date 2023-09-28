<?php
// Check if the user is logged in

not_user_connected();
// Check if the session has expired
verifysession();
// Check if the logout button is clicked
logout_user();

?>