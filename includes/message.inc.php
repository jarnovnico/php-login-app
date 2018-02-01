<?php
    // Variable $conn is the connection to the database
    function setMessages($conn) {
        if(isset($_POST['submitMessage'])) {
            $uid = $_POST['uid'];
            $title = $_POST['title'];
            $message = $_POST['message'];

            // Insert data types into the table: comments
            $sql = "INSERT INTO comments (uid, title, message) VALUES ('$uid', '$title', '$message')";

            $result = mysqli_query($conn, $sql);
        }
    }

    // Variable $conn is the connection to the database
    function editMessages($conn) {
        if(isset($_POST['submitMessage'])) {
            $cid = $_POST['cid'];
            $uid = $_POST['uid'];
            $title = $_POST['title'];
            $message = $_POST['message'];

            // UPDATE data types from comments of one row
            $sql = "UPDATE comments SET title='$title', message='$message' WHERE cid='$cid'";
            $result = mysqli_query($conn, $sql);
            header("Location: index.php");
        }
    }

    function deleteMessages($conn) {
        if(isset($_POST['messageDelete'])) {
            $cid = $_POST['cid'];

            // DELETE data types from comments table of one row
            $sql = "DELETE FROM comments WHERE cid='$cid' ";
            $result = mysqli_query($conn, $sql);
            header("Location: index.php");
        }
    }

    function getMessages($conn) {
        // select the comments table from the database
        $sql = "SELECT * FROM comments";
        $result = mysqli_query($conn, $sql);

        // Everytime we have a result from the database; we need to spit it out. Loop trough all the results
        while($row = mysqli_fetch_assoc($result)) {
            // Post all the messages in the row
            echo "<div class='message-wrapper'><div>";
            echo "<h3>".$row['uid']." says</h3>";
            echo "<h4>".$row['title']."</h4>";

            // convert New Line tags into breaks
            echo nl2br("<p>".$row['message']."</p>");
            echo "</div>";
            if (isset($_SESSION['id'])) {
                if ($_SESSION['id'] == $row['uid']) {
                    echo "<form class='delete-form' method='POST' action='".deleteMessages($conn)."'>
                        <input type='hidden' name='cid' value='".$row['cid']."'>
                        <button type='submit' name='messageDelete'>Delete</button>
                    </form>
                    <form class='edit-form' method='POST' action='editmessages.php'>
                        <input type='hidden' name='cid' value='".$row['cid']."'>
                        <input type='hidden' name='uid' value='".$row['uid']."'>
                        <input type='hidden' name='title' value='".$row['title']."'>
                        <input type='hidden' name='message' value='".$row['message']."'>
                        <button>Edit</button>
                    </form>";
                }
            }
            echo "</div>";
        }
    }