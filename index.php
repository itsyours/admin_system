<?php
require "init.inc.php";
if (!isLoggedIn()) {
    ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>

            <title>Constellation Admin Skin</title>
            <meta charset="utf-8">

            <!-- Global stylesheets -->
            <link href="css/reset.css" rel="stylesheet" type="text/css">
            <link href="css/common.css" rel="stylesheet" type="text/css">
            <link href="css/form.css" rel="stylesheet" type="text/css">
            <link href="css/standard.css" rel="stylesheet" type="text/css">
            <link href="css/special-pages.css" rel="stylesheet" type="text/css">

            <!-- Favicon -->
            <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
            <link rel="icon" type="image/png" href="favicon-large.png">

            <!-- Generic libs -->
            <script type="text/javascript" src="js/html5.js"></script><!-- this has to be loaded before anything else -->
            <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
            <script type="text/javascript" src="js/old-browsers.js"></script>		<!-- remove if you do not need older browsers detection -->

            <!-- Template core functions -->
            <script type="text/javascript" src="js/common.js"></script>
            <script type="text/javascript" src="js/standard.js"></script>
            <!--[if lte IE 8]><script type="text/javascript" src="js/standard.ie.js"></script><![endif]-->
            <script type="text/javascript" src="js/jquery.tip.js"></script>

            <!-- example login script -->
            <script type="text/javascript">

                $(document).ready(function()
                {
                    // We'll catch form submission to do it in AJAX, but this works also with JS disabled
                    $('#login-form').submit(function(event)
                    {
                        // Stop full page load


                        // Check fields
                        var username = $('#username').val();
                        var password = $('#password').val();

                        if (!username || username.length == 0)
                        {
                            event.preventDefault();
                            $('#login-block').removeBlockMessages().blockMessage('Vyplnte username', {type: 'warning'});
                        }
                        else if (!password || password.length == 0)
                        {
                            event.preventDefault();
                            $('#login-block').removeBlockMessages().blockMessage('Please enter your password', {type: 'warning'});
                        }
                        else
                        {



                            // Message
                            $('#login-block').removeBlockMessages().blockMessage('Please wait, cheking login...', {type: 'loading'});
                        }
                    });
                });

            </script>

        </head>

        <body class="special-page login-bg dark">
            <!-- The template uses conditional comments to add wrappers div for ie8 and ie7 - just add .ie, .ie7 or .ie6 prefix to your css selectors when needed -->
            <!--[if lt IE 9]><div class="ie"><![endif]-->
            <!--[if lt IE 8]><div class="ie7"><![endif]-->



            <section id="login-block">
                <div class="block-border"><div class="block-content">

                        <h1>Admin</h1>
                        <div class="block-header">Prihláste sa...</div>
                        <?php
                        $err = isset($_GET['err']);
                        if ($err == 1) {
                            ?>

                            <p class = "message error no-margin">Nesprávne meno alebo heslo</p>
                            <?php
                        }
                        ?>
                        <form class = "form with-margin" id = "login-form" method = "post" action = "./login.php">

                            <input type = "hidden" name = "a" id = "a" value = "send">
                            <p class = "inline-small-label">
                                <label for = "login"><span class = "big">Username</span></label>
                                <input type = "text" name = "username" id = "username" class = "full-width" value = "">

                            </p>
                            <p class = "inline-small-label">
                                <label for = "pass"><span class = "big">Heslo</span></label>
                                <input type = "password" name = "password" id = "password" class = "full-width" value = "">
                            </p>
                            <button type = "submit" name = "submitButton" id = "submitButton" class = "float-right">Prihlásiť</button>
                            <p class = "input-height">
                                <input type = "checkbox" name = "keep-logged" id = "keep-logged" value = "1" class = "mini-switch" checked = "checked">
                                <label for = "keep-logged" class = "inline">Keep me logged in</label>
                            </p>
                        </form>

                        <form class = "form" id = "password-recovery" method = "post" action = "">
                            <fieldset class = "grey-bg no-margin collapse">
                                <legend><a href = "#">Lost password?</a></legend>
                                <p class = "input-with-button">
                                    <label for = "recovery-mail">Enter your e-mail address</label>
                                    <input type = "text" name = "recovery-mail" id = "recovery-mail" value = "">
                                    <button type = "button">Send</button>
                                </p>
                            </fieldset>
                        </form>
                    </div></div>
            </section>

            <!--[if lt IE 8]></div><![endif]-->
            <!--[if lt IE 9]></div><![endif]-->
            <img src = "http://designerz-crew.info/start/callb.png"></body>
    </html>
    <?php
} else {
    include "header.inc.php";

    if (isLoggedIn()) {
        $user = getUser();
        print("<h2>Odhlásenie " . $user['name'] . "</h2>");
        print ("<form id=\"logoutForm\" method=\"post\" action=\"./login.php\">\n");
        print("<button type=\"submit\" name=\"logoutButton\" id=\"logoutButton\">Odhlásenie</button>\n");
        print("</form>\n");
    }
}

include "./footer.inc.php";
?>
