<?php 
    require __DIR__ . './functions.php';
    session_start();
    
    if(!isset($_SESSION['user_id'])){
        require __DIR__ . './layouts/pg_login.php';
    } else {
        
        require __DIR__ . './layouts/pg_viewAgents.php';
    }
?>