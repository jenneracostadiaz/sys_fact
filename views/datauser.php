<?php 
    function query_user($us_id){
        $query = "SELECT * FROM users WHERE UserID='$us_id';";
        $result = connectDB()->query($query);
        if ($result->num_rows > 0) {
            $user_array = $result->fetch_assoc();
        }
        return $user_array;
    }

    function userName(){
        $us_id = $_SESSION['user_id'];
        $raw = query_user($us_id);
        return $raw['Name'];
    }
    function e_userName(){
        $us_id = $_SESSION['user_id'];
        $raw = query_user($us_id);
        echo $raw['Name'];
    }
    
    function userPhone(){
        $us_id = $_SESSION['user_id'];
        $raw = query_user($us_id);
        return $raw['Phone'];
    }
    
    function e_userEmail(){
        $us_id = $_SESSION['user_id'];
        $raw = query_user($us_id);
        echo $raw['Email'];
    }

    function userEmail(){
        $us_id = $_SESSION['user_id'];
        $raw = query_user($us_id);
        return $raw['Email'];
    }

    function e_userPhone(){
        $us_id = $_SESSION['user_id'];
        $raw = query_user($us_id);
        echo $raw['Phone'];
    }

    function query_users_companires_rol($us_id){
        $query = "SELECT * FROM users_companires_rol WHERE UserID='$us_id';";
        $result = connectDB()->query($query);
        if ($result->num_rows > 0) {
            $user_array = $result->fetch_assoc();
        }
        return $user_array;
    }

    function userCompany(){
        $us_id = $_SESSION['user_id'];
        $raw = query_users_companires_rol($us_id);
        return $raw['Companie'];
    }
    function e_userCompany(){
        $us_id = $_SESSION['user_id'];
        $raw = query_users_companires_rol($us_id);
        echo $raw['Companie'];
    }
    function userRol(){
        $us_id = $_SESSION['user_id'];
        $raw = query_users_companires_rol($us_id);
        echo $raw['Rol'];
    }
    function e_userRol(){
        $us_id = $_SESSION['user_id'];
        $raw = query_users_companires_rol($us_id);
        echo $raw['Rol'];
    }

    
?>