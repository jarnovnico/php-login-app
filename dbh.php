<?php 
    // Connection to the database. In this case my own laptop.
    $conn = mysqli_connect("localhost", "root", "", "logintest");

    if(!$conn) {
        // ONLY use this for testing! Remove this line if you go live!
        die("Connection failed: ".mysqli_connect_error());
    }
