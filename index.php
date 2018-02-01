    <?php
        include 'dbh.php';
        include 'header.php';
        include 'includes/message.inc.php';
    ?>
    <main>
        <section class="message-wall-wrapper">
            <h2 class="page-main-title">Please share what you have learned during the minor!</h2>
            <?php
                if(isset($_SESSION['id'])) {
                    echo "<div class='message-box-wrapper'>";
                    echo "<form class='comment-box' method='POST' action='".setMessages($conn)."'>
                        <input type='hidden' name='uid' value='".$_SESSION['id']."'>
                        <input class='comment-box-title' type='text' name='title' placeholder='Title for message'><br>
                        <textarea class='comment-box-text' name='message' placeholder='Type the message here'></textarea><br>
                        <button type='submit' name='submitMessage'>Post message</button>
                    </form>";
                    echo "</div>";
                } else {
                    echo "<p class='pls-login-message'>If you want to share what you have learned; please log in to post.</p>";
                }

                // getMessages($conn);
            ?>
            <div class="post-it-container">
                <?php 
                    getMessages($conn);
                ?>
            </div>
        </section>
    </main>
</body>
</html>