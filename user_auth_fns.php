<?php 
    require_once('db_fns.php');

    function login($username, $password) {
        // check username and password with db
        // if yes, return true
        // else throw exception
        
        // connect to db
        $conn = db_connect();
    
        // check if username is unique
        $result = $conn->query("SELECT * FROM users
                                WHERE Username='".$username."'
                                AND Password = '".$password."'");
                                // and Password = sha1('".$password."')");
        if (!$result) {
            throw new Exception('Could not log you in.');
        }
    
        if ($result->num_rows>0) {
            return true;
        } else {
            throw new Exception('Could not log you in.');
        }
    }

?>