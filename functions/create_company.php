<?php 
    require __DIR__ . '/db.php';
    require __DIR__ . '/uris.php';
    require __DIR__ . '/redirect.php';

    $ruc = $_POST['ruc'];
    $raz_social = $_POST['raz_social'];

    if (!preg_match('/^[0-9]{11}$/', $ruc)){
        $redirect_to = sys_domain().'/new-company.php?ruc=novalid';
        sys_redirect( $redirect_to );
        exit;  
    }

    if (!preg_match('/^[a-zA-Z0-9 .&]{3,40}$/', $raz_social)) {
        $redirect_to = sys_domain().'/new-company.php?ruc=novalid';
        sys_redirect( $redirect_to );
        exit;  
    }

    $query = "INSERT INTO companies (RUC, Name) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        $redirect_to = sys_domain().'/new-company.php?database=erroconex';
        sys_redirect( $redirect_to );
        exit;
    } else {
        $consult = "SELECT * FROM companies WHERE RUC=$ruc";
        $result = mysqli_query($connection, $consult);
        if(mysqli_num_rows($result) > 0){
            $redirect_to = sys_domain().'/new-company.php?database=rucexist';
            sys_redirect( $redirect_to );
            exit;
        }else{
            mysqli_stmt_bind_param($stmt, 'ss', $ruc, $raz_social);
            if (mysqli_stmt_execute($stmt)) {
                $redirect_to = sys_domain().'/new-company.php?insert=successfully';
                sys_redirect( $redirect_to );
                exit;
            } else {
                $redirect_to = sys_domain().'/new-company.php?insert=error';
                sys_redirect( $redirect_to );
                exit; 
            }
        }
    }
    mysqli_close($connection);
?>