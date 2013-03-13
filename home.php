<?php
require "header.inc.php";


if(isLoggedIn()) {
$user = getUser();
    print("<h1>Gratulujem " . $user['name'] . " (" . $user['email']. "), si na  domovskej stranke</h1>");    
} else {
    print("<h1>Nemozete tu byt</h1>");
}


?>
