<?php

function db_connect() {
   $result = new mysqli('localhost', 'root', '123456', 'sys_fact');
   if (!$result) {
     throw new Exception('Could not connect to database server');
   } else {
     return $result;
   }
}

?>
