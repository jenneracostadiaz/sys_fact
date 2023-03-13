<?php 
    require __DIR__ . '/db.php';
    require __DIR__ . '/uris.php';
    require __DIR__ . '/redirect.php';

    $s_company = $_POST["s_company"];
    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    //Valide Company
    $consult = "SELECT * FROM companies WHERE CompanieID=$s_company";
    $result = mysqli_query($connection, $consult);
    if(mysqli_num_rows($result) == 0){
        $redirect_to = sys_domain().'/new-agent.php?company=novalid';
        sys_redirect( $redirect_to );
        exit;
    }
    
    //Valide Data User
    if (!preg_match('/^[a-zA-Z0-9]{3,15}$/', $username)) {
        $redirect_to = sys_domain().'/new-agent.php?username=novalid';
        sys_redirect( $redirect_to );
        exit;  
    }
    if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s\.]+$/', $fullname)) {
        $redirect_to = sys_domain().'/new-agent.php?fullname=novalid';
        sys_redirect( $redirect_to );
        exit;  
    }
    if (!preg_match('/^[0-9]{9,13}$/', $phone)) {
        $redirect_to = sys_domain().'/new-agent.php?phone=novalid';
        sys_redirect( $redirect_to );
        exit;  
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $redirect_to = sys_domain().'/new-agent.php??email=novalid';
        sys_redirect( $redirect_to );
        exit;   
    }

    $query_addUS = "INSERT INTO users (Username, Email, Password, Name, Phone) VALUES ('$username', '$email', '$password', '$fullname', '$phone')";
    if (!mysqli_query($connection, $query_addUS)) {
        $redirect_to = sys_domain().'/new-agent.php?insert=error';
        sys_redirect( $redirect_to );
        exit;
    }


    $consult = "SELECT * FROM users WHERE Username='$username'";
    $result = mysqli_query($connection, $consult);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $UserID = $row["UserID"];
        }
    }

    
    $rolID = '3';
    
    $query_addRel = "INSERT INTO systrelations (UserID, RolID, CompanieID) VALUES ($UserID, $rolID, $s_company)";
    
    if (mysqli_query($connection, $query_addRel)) {
        $redirect_to = sys_domain().'/new-agent.php?insert=successfully';
        sys_redirect( $redirect_to );
        exit;
    } else {
        $redirect_to = sys_domain().'/new-agent.php?insert=error&row=2';
        sys_redirect( $redirect_to );
        exit;
    }


    mysqli_close($connection);
    
?>