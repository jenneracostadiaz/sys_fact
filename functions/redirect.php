<?php 

function sys_redirect($location, $status = 302){
    header( "Location: $location", true, $status );
    return true;
}

?>