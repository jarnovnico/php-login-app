<?php
    session_start();

    include '../dbh.php';

    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    // select mathing username and password
    $sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$pwd'";

    // variable result has php method stored, that queries the connection to the database and the select query
    $result = mysqli_query($conn, $sql);

    // Checks if the username and the password are from the same row in the database, if not show error else show firstname
    if(!$row = mysqli_fetch_assoc($result)) {
        echo "Your username or password is incorrect!";
    } else {
        $_SESSION['id'] = $row['first'];
    }

    header("Location: ../index.php");
    exit();
