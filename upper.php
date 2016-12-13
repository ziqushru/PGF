<?php session_start(); ?>

<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>PGF</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/global.css">
    
    <?php
        $ip_db = getenv('IP');
        $username_db = getenv('C9_USER');
        $password_db = "";
        $name_db = "c9";
        $port_db = 3306;
    ?>
<body class="body_custom">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="dropdown">
                    <button class="button_custom_animated dropdown-toggle" type="button" data-toggle="dropdown">
                        <span>Programming Forum</span>
                    </button>
                    <div class="dropdown_content">
                        <a href="/home.php">Home</a>
                        <a href="/topics.php">Topics</a>
                        <?php if (!is_null($_SESSION["user_id"])) echo "<a href='/account.php'>Account</a>"; ?>
                        <a href="/about.php">About</a>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" style="float: right">
                   <li>
                        <button class="button_custom">
                            <a href="/home.php">Home</a>
                        </button>
                    </li>
                    <li>
                        <button class="button_custom">
                            <a href="/topics.php">Topics</a>
                        </button>
                    </li>
                    <?php
                        if (!is_null($_SESSION["user_id"]))
                        {
                            echo "<li>";
                                echo "<button class='button_custom'>";
                                    echo "<a href='/account.php'>Account</a>";
                                echo "</button>";
                            echo "</li>";
                            echo "<li>";
                                echo "<button class='button_custom'>";
                                    echo "<a href='/users/logout.php'>Log Out</a>";
                                echo "</button>";
                            echo "</li>";
                        }
                        else
                        {
                            echo "<li>";
                                echo "<button class='button_custom'>";
                                    echo "<a href='/users/login.php'>Log In</a>";
                                echo "</button>";
                            echo "</li>";
                            echo "<li>";
                                echo "<button class='button_custom'>";
                                    echo "<a href='/users/register.php'>Register</a>";
                                echo "</button>";
                            echo "</li>";
                        }
                    ?>
                    <li>
                        <button class="button_custom">
                            <a href="/about.php">About</a>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">