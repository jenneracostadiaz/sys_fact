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

    function check_valid_user() {
        // see if somebody is logged in and notify them if not
        if (isset($_SESSION['valid_user']))  {
            echo "Logged in as ".$_SESSION['valid_user'].".<br>";
        } else {
            // they are not logged in
            do_html_header('Problem:');
            echo 'You are not logged in.<br>';
            do_html_url('login.php', 'Login');
            do_html_footer();
            exit;
        }
    }

?>