<?php

require "init.inc.php";
if (!isLoggedIn()) {
    if (isset($_POST['submitButton'])) {
        if (!isset($_POST['username'])) {
            die("Chyba: Pole Uživateľské meno nebolo vyplnené");
        } else if (!isset($_POST['password'])) {
            die("Chyba: Pole Heslo nebolo vyplnené");
        }

        $password = hash("sha512", $_POST['password']);
        $query = mysql_query("SELECT ID FROM users WHERE username='" . mysql_real_escape_string($_POST['username']) . "' AND password='" . mysql_real_escape_string($password) . "' LIMIT 1");

        if (mysql_num_rows($query)) { //Prihlasovacie údaje sú korektné
            $sessID = mysql_real_escape_string(session_id());
            $hash = mysql_real_escape_string(hash("sha512", $sessID . $_SERVER['HTTP_USER_AGENT']));
            $userData = mysql_fetch_assoc($query);
            $expires = time() + (60 * 15);

            mysql_query("INSERT INTO active_users (user,session_id,hash,expires) VALUES ('" . (int) $userData['ID'] . "', '" . $sessID . "', '" . $hash . "', '" . $expires . "')");

            header("Location: ./home.php");
            exit();
        } else {
            header("Location: ./index.php?err=1");
            exit();
        }
    }
} else { 
    if (isset($_POST['logoutButton'])) {
        $user = getUser();
        mysql_query("DELETE FROM active_users WHERE user= " . (int) $user['id']);
        header("Location: ./index.php");
        exit();
    }
}
?>

