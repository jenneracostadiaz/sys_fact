<?php 
    require __DIR__ . '/uris.php';
    require __DIR__ . '/redirect.php';
    
    session_start();
    unset($_SESSION["user_id"]);
    sys_redirect( sys_domain() );
?>