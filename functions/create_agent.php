<?php 
    require __DIR__ . '/db.php';
    require __DIR__ . '/uris.php';
    require __DIR__ . '/redirect.php';

    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo '<pre>';
    var_dump($username);
var_dump($fullname);
var_dump($phone);
var_dump($email);
var_dump($password);
    echo '</pre>';
    
    
    
    
?>