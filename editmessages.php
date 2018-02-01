    <?php
        include 'dbh.php';
        include 'header.php';
        include 'includes/message.inc.php';
    ?>
    <main>
        <section>
            <?php
                $cid = $_POST['cid'];
                $uid = $_POST['uid'];
                $title = $_POST['title'];
                $message = $_POST['message'];

                if(isset($_SESSION['id'])) {
                    echo "<h2 class='page-main-title'>What did you want to edit?</h2>
                    <form class='comment-box' method='POST' action='".editMessages($conn)."'>
                        <input type='hidden' name='cid' value='".$cid."'>
                        <input type='hidden' name='uid' value='".$uid."'>
                        <input class='comment-box-title' type='text' name='title' value='".$title."'><br>
                        <textarea class='comment-box-text' name='message'>".$message."</textarea><br>
                        <button type='submit' name='submitMessage'>Save edit</button>
                    </form>";
                } else {
                    echo "Please log in to edit a message.";
                }
            ?>
        </section>
    </main>
</body>
</html>