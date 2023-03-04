<?php 
    require __DIR__ . '/db.php';
    require __DIR__ . '/uris.php';
    require __DIR__ . '/redirect.php';

    $us_email = $_POST['user_email'];
    $user_psw = password_hash($_POST['user_psw'], PASSWORD_BCRYPT);
    
    if (!filter_var($us_email, FILTER_VALIDATE_EMAIL)) {
        $redirect_to = sys_domain().'?email=novalid';
        sys_redirect( $redirect_to );
        exit;   
    }

    $v_psw = "SELECT UserID, password FROM users WHERE email='$us_email';";
    $psw_result = $connection->query($v_psw);
    if ($psw_result->num_rows > 0) {
        while($row = $psw_result->fetch_assoc()) {
            $db_psw = $row["password"];
            $db_id = $row["UserID"];
        } 
    }

    if (!password_verify($db_psw, $user_psw)) {
        $redirect_psw = sys_domain().'?email='.$us_email.'&password=novalid';
        sys_redirect( $redirect_psw );
        exit;   
    }

    $query = "SELECT * FROM users WHERE email='$us_email' AND password='$db_psw';";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0){
        session_start();
        $_SESSION['user_id'] = $db_id;
        $redirect_login = sys_domain();
        sys_redirect( $redirect_login );
    } else {
        $redirect_email = sys_domain().'?login=novalid';
        sys_redirect( $redirect_email );
    }

?>

