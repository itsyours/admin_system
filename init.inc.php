<?php

session_start();
require "config.php";

$user = isLoggedIn();

if($user) {
    $expires = time() + (60 * 15);
    mysql_query("UPDATE active_users SET expires = " . $expires . " WHERE user= " . (int) $user);
    
}



function isLoggedIn() {
    $sessID = mysql_real_escape_string(session_id());
    $hash = mysql_real_escape_string(hash("sha512", $sessID . $_SERVER['HTTP_USER_AGENT']));


    $query = mysql_query("SELECT user FROM active_users WHERE session_id = '" . $sessID . "' AND hash = '" . $hash . "' AND expires >" . time() ." LIMIT 1");
    if (mysql_num_rows($query)) {
        $data = mysql_fetch_assoc($query);
        return $data['user'];
    } else {
        return false;
    }
}

function getUser() {
    $user=  isLoggedIn();
    if($user) {
        $query = mysql_query("SELECT id, email, name FROM users WHERE id=" . (int) $user);
        return mysql_fetch_assoc($query);
    } else {
    return false;    
    }
    
}
    

?>