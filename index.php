<?php

require "header.inc.php";
if (!isLoggedIn()) {

print("<h2>Prihlásenie</h2>\n");
    print("<form id=\"loginForm\" method=\"post\" action=\"./login.php\">\n");
    print("Uživaťeľské meno: <input type=\"text\" name=\"username\" id=\"username\" /><br /><br />\n");
    print("Heslo: <input type=\"password\" name=\"password\" id=\"password\"/><br/><br/>\n");
    print("<button type=\"submit\" name=\"submitButton\" id=\"submitButton\">Prihlásiť</button>\n");
    print("</form>\n");
} else {
    print("<h2>Odhlasenie</h2>");
    print ("<form id=\"logoutForm\" method=\"post\" action=\"./login.php\">\n");
    print("<button type=\"submit\" name=\"logoutButton\" id=\"logoutButton\">Odhlasenie</button>\n");
    print("</form>\n");
}
?>
