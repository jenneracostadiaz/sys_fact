<?php 

    function sys_domain(){
        $ssl   = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on';
        $proto = strtolower($_SERVER['SERVER_PROTOCOL']);
        $proto = substr($proto, 0, strpos($proto, '/')) . ($ssl ? 's' : '' );

        $host= $_SERVER["HTTP_HOST"];
        $domain = $proto."://".$host;
        
        return $domain;

    }
    
    function e_sys_domain(){
        $ssl   = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on';
        $proto = strtolower($_SERVER['SERVER_PROTOCOL']);
        $proto = substr($proto, 0, strpos($proto, '/')) . ($ssl ? 's' : '' );

        $host= $_SERVER["HTTP_HOST"];
        $domain = $proto."://".$host;
        
        echo $domain;
        return true;

    }

    function sys_slug(){
        $slug= $_SERVER["REQUEST_URI"];
        return $slug;
    }

?>