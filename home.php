<?php
$page_title = 'Home Page';
require_once('includes/load.php');
include('layouts/header.php');
if (!$session->isUserLoggedIn(true)) { 
    redirect('index.php', false);
}

$user = current_user();
?>

<div class="container">
    <?php
    // Show the submit ticket form **only** if the user is Level 3 AND NOT "addressor"
    if ($user['user_level'] == 3 && $user['username'] !== 'addressor') {
        include ('user_dashboard.php');
    }

    // Show the table **only** if the username is "addressor"
    if ($user['username'] === 'addressor') {
        include ('addressor_sidebar.php');
    }
     
    if ($user['user_level'] == 2) {
        include ('manager_dashboard.php');
    }
    
    ?>
    
</div>
