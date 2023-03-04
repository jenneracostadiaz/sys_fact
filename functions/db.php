<?php 
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $db = "sys_fact";
     
    // Create connection
    $connection = new mysqli($servername, $username, $password, $db);
     
    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }


    function connectDB(){
        $servername = "localhost";
        $username = "root";
        $password = "123456";
        $db = "sys_fact";
        
        // Create connection
        $connection = new mysqli($servername, $username, $password, $db);
        
        // Check connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        return $connection;
    }
?>