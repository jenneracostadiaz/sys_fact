<?php 
    require_once('sys_fns.php');
    session_start();

    if (!isset($_POST['username']))  {
        //if not isset -> set with dummy value 
        $_POST['username'] = " "; 
    }
    $username = $_POST['username'];

    if (!isset($_POST['passwd']))  {
        //if not isset -> set with dummy value 
        $_POST['passwd'] = " "; 
    }
    $passwd = $_POST['passwd'];

    if ($username && $passwd){
        try  {
            login($username, $passwd);
            // if they are in the database register the user id
            $_SESSION['valid_user'] = $username;
        }
            catch(Exception $e)  {
            // unsuccessful login
            do_html_header('Problem:', 'Error in Login');
            echo 'You could not be logged in.<br> You must be logged in to view this page.';
            do_html_url('index.php', 'Login');
            do_html_footer();
            exit;
        }
    }

    do_html_header('Dashboard');

    do_html_footer();
?>