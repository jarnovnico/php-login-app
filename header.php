<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>This is a login test with php</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Adamina|Merriweather" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Caveat|Delius|Permanent+Marker|Schoolbell" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                    <?php
                        if(isset($_SESSION['id'])) {
                            // if someone is logged in: show logout button
                            echo "<p class='account-message-loggedIn'>Welcome, <strong>".$_SESSION['id']."</strong></p>";
                            echo "<form class='logout-form' action='includes/logout.inc.php'>
                                <button>Log out</button>
                            </form>";
                        } else {
                            // else show the login form to login
                            // echo "<p class='account-message-loggedOut'>You are not logged in.</p>";
                            echo "<form class='login-form' action='includes/login.inc.php' method='POST'>
                                <input type='text' name='uid' placeholder='Username'>
                                <input type='password' name='pwd' placeholder='Password'>
                                <button type='submit'>Login</button>
                            </form>";
                        }
                    ?>
                <li><a href="signup.php">Signup</a></li>
            </ul>
        </nav>
    </header>
    <div class="website-banner">
        <div class="banner-title">
            <span>Design Thinking &amp; Doing | Personal Project</span>
        </div>
        <div class="thumbnail">
           <img src="img/design-thinking-small-EDIT-4.jpg" alt="post-its">
           <!-- <img src="img/Design-Thinking_02.png" alt="post-its"> -->
        </div>
        <div class="overflow-hack"></div>
    </div>