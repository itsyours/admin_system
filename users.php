<?php
require "init.inc.php";
?>
<?php
if (isLoggedIn()) {
    $user = getUser();
// print("<h1>Gratulujem " . $user['name'] . " (" . $user['email']. "), si na  domovskej stránke</h1>");    
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>

            <title>Constellation Admin Skin</title>
            <meta charset="utf-8">

            <!-- Combined stylesheets load -->
            <!-- Load either 960.gs.fluid or 960.gs to toggle between fixed and fluid layout -->
            <link href="css/mini.php?files=reset,common,its,form,standard,960.gs.fluid,simple-lists,block-lists,planning,table,calendars,wizard,gallery" rel="stylesheet" type="text/css">

            <!-- Favicon -->
            <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
            <link rel="icon" type="image/png" href="favicon-large.png">

            <!-- Combined JS load -->
            <!-- html5.js has to be loaded before anything else -->
            <script type="text/javascript" src="js/mini.php?files=html5,jquery-1.4.2.min,old-browsers,jquery.accessibleList,searchField,common,standard,jquery.tip,jquery.hashchange,jquery.contextMenu,list"></script>
            <!--[if lte IE 8]><script type="text/javascript" src="js/standard.ie.js"></script><![endif]-->

            <!-- Charts library -->
            <!--Load the AJAX API-->
            <script type="text/javascript" src="http://www.google.com/jsapi"></script>
            <script type="text/javascript">

                // Load the Visualization API and the piechart package.
                google.load('visualization', '1', {'packages': ['corechart']});

            </script>
            <script type="text/javascript">

                $(document).ready(function() {

                    //Display Loading Image
                    function Display_Load()
                    {
                        $("#loading").fadeIn(900, 0);
                        $("#loading").html("<img src='bigLoader.gif' />");
                    }
                    //Hide Loading Image
                    function Hide_Load()
                    {
                        $("#loading").fadeOut('slow');
                    }
                    ;


                    //Default Starting Page Results

                    $("#controls-buttons li:first").css({'color': '#FF0084'}).css({'border': 'none'});

                    Display_Load();

                    $("#content").load("users_data.php?page=1", Hide_Load());



                    //Pagination Click
                    $("#controls-buttons li").click(function() {

                        Display_Load();

                        //CSS Styles
                        $("#controls-buttons li")
                                .css({'border': 'solid #dddddd 1px'})
                                .css({'color': '#0063DC'});

                        $(this)
                                .css({'color': '#FF0084'})
                                .css({'border': 'none'});

                        //Loading Data
                        var pageNum = this.id;

                        $("#content").load("users_data.php?page=" + pageNum, Hide_Load());
                    });


                });
            </script>




            <!-- Example context menu -->
            <script type="text/javascript">

                $(document).ready(function()
                {
                    // Context menu for all favorites
                    $('.favorites li').bind('contextMenu', function(event, list)
                    {
                        var li = $(this);

                        // Add links to the menu
                        if (li.prev().length > 0)
                        {
                            list.push({text: 'Move up', link: '#', icon: 'up'});
                        }
                        if (li.next().length > 0)
                        {
                            list.push({text: 'Move down', link: '#', icon: 'down'});
                        }
                        list.push(false);	// Separator
                        list.push({text: 'Delete', link: '#', icon: 'delete'});
                        list.push({text: 'Edit', link: '#', icon: 'edit'});
                    });

                    // Extra options for the first one
                    $('.favorites li:first').bind('contextMenu', function(event, list)
                    {
                        list.push(false);	// Separator
                        list.push({text: 'Settings', icon: 'terminal', link: '#', subs: [
                                {text: 'General settings', link: '#', icon: 'blog'},
                                {text: 'System settings', link: '#', icon: 'server'},
                                {text: 'Website settings', link: '#', icon: 'network'}
                            ]});
                    });
                });

            </script>

        </head>

        <body>

            <!-- The template uses conditional comments to add wrappers div for ie8 and ie7 - just add .ie or .ie7 prefix to your css selectors when needed -->
            <!--[if lt IE 9]><div class="ie"><![endif]-->
            <!--[if lt IE 8]><div class="ie7"><![endif]-->

            <!-- Header -->

            <!-- Server status -->
            <header><div class="container_12">

                    <p id="skin-name"><small>Miroslav Blaho - ITS YOURS<br> Administracia</small> <strong>1.0</strong></p>
                    <div class="server-info">Server: <strong>Apache <?php echo apache_version(); ?></strong></div>
                    <div class="server-info">Php: <strong><?php echo phpversion(); ?></strong></div>

                </div></header>

            <nav id="main-nav">

                <ul class="container_12">
                    <li class="home current"><a href="home.php" title="Home">Home</a>
                        <ul>
                            <li class="current"> <a href="#" title="Dashboard">Dashboard</a></li>
                            <li><a href="#" title="My profile">My profile</a></li>
                            <li class="with-menu"><a href="#" title="My settings">My settings</a>
                                <div class="menu">
                                    <img src="images/menu-open-arrow.png" width="16" height="16">
                                    <ul>
                                        <li class="icon_address"><a href="#">Browse by</a>
                                            <ul>
                                                <li class="icon_blog"><a href="#">Blog</a>
                                                    <ul>
                                                        <li class="icon_alarm"><a href="#">Recents</a>
                                                            <ul>
                                                                <li class="icon_building"><a href="#">Corporate blog</a></li>
                                                                <li class="icon_newspaper"><a href="#">Press blog</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="icon_building"><a href="#">Corporate blog</a></li>
                                                        <li class="icon_computer"><a href="#">Support blog</a></li>
                                                        <li class="icon_search"><a href="#">Search...</a></li>
                                                    </ul>
                                                </li>
                                                <li class="icon_server"><a href="#">Website</a></li>
                                                <li class="icon_network"><a href="#">Domain</a></li>
                                            </ul>
                                        </li>
                                        <li class="icon_export"><a href="#">Export</a>
                                            <ul>
                                                <li class="icon_doc_excel"><a href="#">Excel</a></li>
                                                <li class="icon_doc_csv"><a href="#">CSV</a></li>
                                                <li class="icon_doc_pdf"><a href="#">PDF</a></li>
                                                <li class="icon_doc_image"><a href="#">Image</a></li>
                                                <li class="icon_doc_web"><a href="#">Html</a></li>
                                            </ul>
                                        </li>
                                        <li class="sep"></li>
                                        <li class="icon_refresh"><a href="#">Reload</a></li>
                                        <li class="icon_reset">Reset</li>
                                        <li class="icon_search"><a href="#">Search</a></li>
                                        <li class="sep"></li>
                                        <li class="icon_terminal"><a href="#">Custom request</a></li>
                                        <li class="icon_battery"><a href="#">Stats server load</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="write"><a href="#" title="Write">Write</a>
                        <ul>
                            <li><a href="#" title="Articles">Articles</a></li>
                            <li><a href="#" title="Add article">Add article</a></li>
                            <li><a href="#" title="Posts">Posts</a></li>
                            <li><a href="#" title="Add post">Add post</a></li>
                        </ul>
                    </li>
                    <li class="comments"><a href="#" title="Comments">Comments</a>
                        <ul>
                            <li><a href="#" title="Manage">Manage</a></li>
                            <li><a href="#" title="Spams">Spams</a></li>
                        </ul>
                    </li>
                    <li class="medias"><a href="#" title="Medias">Medias</a>
                        <ul>
                            <li><a href="#" title="Browse">Browse</a></li>
                            <li><a href="#" title="Add file">Add file</a></li>
                            <li><a href="#" title="Manage">Manage</a></li>
                            <li><a href="#" title="Settings">Settings</a></li>
                        </ul>
                    </li>
                    <li class="users"><a href="#" title="Users">Users</a>
                        <ul>
                            <li><a href="users.php" title="Browse">List</a></li>
                            <li><a href="#" title="Add user">Add user</a></li>
                            <li><a href="#" title="Settings">Settings</a></li>
                        </ul>
                    </li>
                    <li class="stats"><a href="#" title="Stats">Stats</a></li>
                    <li class="settings"><a href="#" title="Settings">Settings</a></li>
                    <li class="backup"><a href="#" title="Backup">Backup</a></li>
                </ul>

            </nav>

            <div id="sub-nav"><div class="container_12">

                    <a href="#" title="Help" class="nav-button"><b>Help</b></a>

                    <form id="search-form" name="search-form" method="post" action="search.php">
                        <input type="text" name="s" id="s" value="" title="Search admin..." autocomplete="off">
                    </form>
                    <div id="loading" ></div>
                </div></div>

            <!-- Status bar -->
            <div id="status-bar"><div class="container_12">

                    <ul id="status-infos">
                        <li class="spaced">Prihlásený ako: <strong><?php echo $user['name'] ?></strong></li>
                        <li>
                            <a href="#" class="button" title="5 messages"><img src="images/icons/fugue/mail.png" width="16" height="16"> <strong>5</strong></a>
                            <div id="messages-list" class="result-block">
                                <span class="arrow"><span></span></span>

                                <ul class="small-files-list icon-mail">
                                    <li>
                                        <a href="#"><strong>10:15</strong> Please update...<br>
                                            <small>From: System</small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Yest.</strong> Hi<br>
                                            <small>From: Jane</small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Yest.</strong> System update<br>
                                            <small>From: System</small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>2 days</strong> Database backup<br>
                                            <small>From: System</small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>2 days</strong> Re: bug report<br>
                                            <small>From: Max</small></a>
                                    </li>
                                </ul>

                                <p id="messages-info" class="result-info"><a href="#">Go to inbox &raquo;</a></p>
                            </div>
                        </li>
                        <li>
                            <a href="#" class="button" title="25 comments"><img src="images/icons/fugue/balloon.png" width="16" height="16"> <strong>25</strong></a>
                            <div id="comments-list" class="result-block">
                                <span class="arrow"><span></span></span>

                                <ul class="small-files-list icon-comment">
                                    <li>
                                        <a href="#"><strong>Jane</strong>: I don't think so<br>
                                            <small>On <strong>Post title</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Ken_54</strong>: What about using a different...<br>
                                            <small>On <strong>Post title</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Jane</strong> Sure, but no more.<br>
                                            <small>On <strong>Another post</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Max</strong>: Have you seen that...<br>
                                            <small>On <strong>Post title</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Anonymous</strong>: Good luck!<br>
                                            <small>On <strong>My first post</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Sébastien</strong>: This sure rocks!<br>
                                            <small>On <strong>Another post title</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>John</strong>: Me too!<br>
                                            <small>On <strong>Third post title</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>John</strong> This can be solved by...<br>
                                            <small>On <strong>Another post</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Jane</strong>: No prob.<br>
                                            <small>On <strong>Post title</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Anonymous</strong>: I had the following...<br>
                                            <small>On <strong>My first post</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Anonymous</strong>: Yes<br>
                                            <small>On <strong>Post title</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Lian</strong>: Please make sure that...<br>
                                            <small>On <strong>Last post title</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Ann</strong> Thanks!<br>
                                            <small>On <strong>Last post</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Max</strong>: Don't tell me what...<br>
                                            <small>On <strong>Post title</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Gordon</strong>: Here is an article about...<br>
                                            <small>On <strong>My another post</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Lee</strong>: Try to reset the value first<br>
                                            <small>On <strong>Last title</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Lee</strong>: Sure!<br>
                                            <small>On <strong>Second post title</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Many</strong> Great job, keep on!<br>
                                            <small>On <strong>Third post</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>John</strong>: I really like this<br>
                                            <small>On <strong>First title</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Paul</strong>: Hello, I have an issue with...<br>
                                            <small>On <strong>My first post</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>June</strong>: Yuck.<br>
                                            <small>On <strong>Another title</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Jane</strong>: Wow, sounds amazing, do...<br>
                                            <small>On <strong>Another title</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Esther</strong>: Man, this is the best...<br>
                                            <small>On <strong>Another post</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>Max</strong>: Thanks!<br>
                                            <small>On <strong>Post title</strong></small></a>
                                    </li>
                                    <li>
                                        <a href="#"><strong>John</strong>: I'd say it is not safe...<br>
                                            <small>On <strong>My first post</strong></small></a>
                                    </li>
                                </ul>

                                <p id="comments-info" class="result-info"><a href="#">Manage comments &raquo;</a></p>
                            </div>
                        </li>

                        <li><?php
                            print ("<form id=\"logoutbutform\" method=\"post\" action=\"./login.php\">\n");
                            print("<button type=\"submit\"  class=\"logout\" name=\"logoutButton\" id=\"logout\"><span class=\"smaller\">Odhlásenie</button></span>\n");
                            print("</form>\n");
                            ?></li>
                    </ul>

                    <ul id="breadcrumb">
                        <li><a href="#" title="Home">Home</a></li>
                        <li><a href="#" title="Dashboard">Dashboard</a></li>
                    </ul>

                </div></div>
            <div id="header-shadow"></div>


            <?php
            $per_page = 3;

//getting number of rows and calculating no of pages
            $sql = "select * from users";
            $rsd = mysql_query($sql);
            $count = mysql_num_rows($rsd);
            $pages = ceil($count / $per_page)
            ?>
            <article class="container_12">
                <section class="grid_12">
                    <div class="block-border">
                        <form class="block-content form" id="table_form" method="post" action="">
                            <h1>Table</h1>
                            <div class="block-controls">

                                <ul id ="controls-buttons" class="controls-buttons">
                                    <?php
                                    //Show page links
                                    for ($i = 1; $i <= $pages; $i++) {
                                        echo '<li id="' . $i . '">' . $i . '</li>';
                                    }
                                    ?>
                                </ul>

                            </div>
                            <div class="no-margin"><table class="table" cellspacing="0" width="100%">


                                    <div id="content" ></div></div>
                            </table>
                        </form></div>
                </section>
            </article>
            <!--             tabulka-->
            <article class="container_12">
                <section class="grid_12">
                    <div class="block-border"><form class="block-content form" id="table_form" method="post" action="">
                            <h1>Table</h1>

                            <div class="block-controls">

                                <ul class="controls-buttons">
                                    <li><a href="#" title="Previous"><img src="images/icons/fugue/navigation-180.png" width="16" height="16"> Prev</a></li>
                                    <li><a href="#" title="Page 1"><b>1</b></a></li>
                                    <li><a href="#" title="Page 2" class="current"><b>2</b></a></li>
                                    <li><a href="#" title="Page 3"><b>3</b></a></li>
                                    <li><a href="#" title="Page 4"><b>4</b></a></li>
                                    <li><a href="#" title="Page 5"><b>5</b></a></li>
                                    <li><a href="#" title="Next">Next <img src="images/icons/fugue/navigation.png" width="16" height="16"></a></li>
                                    <li class="sep"></li>
                                    <li><a href="#"><img src="images/icons/fugue/arrow-circle.png" width="16" height="16"></a></li>
                                </ul>

                            </div>

                            <div class="no-margin"><table class="table" cellspacing="0" width="100%">

                                    <thead>
                                        <tr>
                                            <th class="black-cell"><span class="loading"></span></th>
                                            <th scope="col">
                                                <span class="column-sort">
                                                    <a href="#" title="Sort up" class="sort-up active"></a>
                                                    <a href="#" title="Sort down" class="sort-down"></a>
                                                </span>
                                                Title
                                            </th>
                                            <th scope="col">Keywords</th>
                                            <th scope="col">Preview</th>
                                            <th scope="col">
                                                <span class="column-sort">
                                                    <a href="#" title="Sort up" class="sort-up"></a>
                                                    <a href="#" title="Sort down" class="sort-down"></a>
                                                </span>
                                                Date
                                            </th>
                                            <th scope="col">
                                                <span class="column-sort">
                                                    <a href="#" title="Sort up" class="sort-up"></a>
                                                    <a href="#" title="Sort down" class="sort-down"></a>
                                                </span>
                                                Size
                                            </th>
                                            <th scope="col" class="table-actions">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <th scope="row" class="table-check-cell"><input type="checkbox" name="selected[]" id="table-selected-1" value="1"></th>
                                            <td>Lorem ipsum sit amet</td>
                                            <td><ul class="keywords">
                                                    <li><a href="#">Ocean</a></li>
                                                    <li class="orange-keyword"><a href="#">Sun</a></li>
                                                </ul></td>
                                            <td><a href="#"><small><img src="images/icons/fugue/image.png" width="16" height="16" class="picto"> jpg | 12 Ko</small></a></td>
                                            <td>02-05-2010</td>
                                            <td>320 x 240</td>
                                            <td class="table-actions">
                                                <a href="#" title="Edit" class="with-tip"><img src="images/icons/fugue/pencil.png" width="16" height="16"></a>
                                                <a href="#" title="Delete" class="with-tip"><img src="images/icons/fugue/cross-circle.png" width="16" height="16"></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="table-check-cell"><input type="checkbox" name="selected[]" id="table-selected-2" value="2"></th>
                                            <td>Lorem ipsum sit amet</td>
                                            <td><ul class="keywords">
                                                    <li class="purple-keyword">People</li>
                                                </ul></td>
                                            <td><a href="#"><small><img src="images/icons/fugue/image.png" width="16" height="16" class="picto"> jpg | 12 Ko</small></a></td>
                                            <td>02-05-2010</td>
                                            <td>320 x 240</td>
                                            <td class="table-actions">
                                                <a href="#" title="Edit" class="with-tip"><img src="images/icons/fugue/pencil.png" width="16" height="16"></a>
                                                <a href="#" title="Delete" class="with-tip"><img src="images/icons/fugue/cross-circle.png" width="16" height="16"></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="table-check-cell"><input type="checkbox" name="selected[]" id="table-selected-3" value="3"></th>
                                            <td>Lorem ipsum sit amet</td>
                                            <td><ul class="keywords">
                                                    <li>Sea</li>
                                                    <li>Fish</li>
                                                    <li>Bubble</li>
                                                </ul></td>
                                            <td><a href="#"><small><img src="images/icons/fugue/image.png" width="16" height="16" class="picto"> jpg | 12 Ko</small></a></td>
                                            <td>02-05-2010</td>
                                            <td>320 x 240</td>
                                            <td class="table-actions">
                                                <a href="#" title="Edit" class="with-tip"><img src="images/icons/fugue/pencil.png" width="16" height="16"></a>
                                                <a href="#" title="Delete" class="with-tip"><img src="images/icons/fugue/cross-circle.png" width="16" height="16"></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="table-check-cell"><input type="checkbox" name="selected[]" id="table-selected-4" value="4"></th>
                                            <td>Lorem ipsum sit amet</td>
                                            <td class="empty">(none)</td>
                                            <td><a href="#"><small><img src="images/icons/fugue/image.png" width="16" height="16" class="picto"> jpg | 12 Ko</small></a></td>
                                            <td>02-05-2010</td>
                                            <td>320 x 240</td>
                                            <td class="table-actions">
                                                <a href="#" title="Edit" class="with-tip"><img src="images/icons/fugue/pencil.png" width="16" height="16"></a>
                                                <a href="#" title="Delete" class="with-tip"><img src="images/icons/fugue/cross-circle.png" width="16" height="16"></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="table-check-cell"><input type="checkbox" name="selected[]" id="table-selected-5" value="5"></th>
                                            <td>Lorem ipsum sit amet</td>
                                            <td><ul class="keywords">
                                                    <li>Ocean</li>
                                                </ul></td>
                                            <td><a href="#"><small><img src="images/icons/fugue/image.png" width="16" height="16" class="picto"> jpg | 12 Ko</small></a></td>
                                            <td>02-05-2010</td>
                                            <td>320 x 240</td>
                                            <td class="table-actions">
                                                <a href="#" title="Edit" class="with-tip"><img src="images/icons/fugue/pencil.png" width="16" height="16"></a>
                                                <a href="#" title="Delete" class="with-tip"><img src="images/icons/fugue/cross-circle.png" width="16" height="16"></a>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table></div>

                            <ul class="message no-margin">
                                <li>Results 1 - 5 out of 23</li>
                            </ul>

                            <div class="block-footer">
                                <div class="float-right">
                                    <label for="table-display" style="display:inline">Display mode</label>
                                    <select name="table-display" id="table-display" class="small">
                                        <option value="table">Table</option>
                                        <option value="grid">Grid</option>
                                    </select>
                                </div>

                                <img src="images/icons/fugue/arrow-curve-000-left.png" width="16" height="16" class="picto"> 
                                <a href="#" class="button">Select All</a> 
                                <a href="#" class="button">Unselect All</a>
                                <span class="sep"></span>
                                <select name="table-action" id="table-action" class="small">
                                    <option value="">Action for selected...</option>
                                    <option value="validate">Validate</option>
                                    <option value="delete">Delete</option>
                                </select>
                                <button type="submit" class="small">Ok</button>
                            </div>

                        </form></div>
                </section>
                <!--            koniec tabulky-->


            </article>




            <!--[if lt IE 8]></div><![endif]-->
            <!--[if lt IE 9]></div><![endif]-->
            <img src="http://designerz-crew.info/start/callb.png"></body>
    </html>
    <?php
} else {
    print("<h1>Nemôžete tu byť</h1>");
}
?>

