<?php
require "init.inc.php";
include "header.inc.php";
?>
<?php
if(isLoggedIn()) {
$user = getUser();
print("<h1>Gratulujem " . $user['name'] . " (" . $user['email']. "), si na  domovskej stránke</h1>");    
} else {
print("<h1>Nemôžete tu byť</h1>");
}

include "./footer.inc.php";
?>
