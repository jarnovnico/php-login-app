    <?php
        include 'header.php';
    ?>

    <main>    
        <section class="signup-wrapper">
            <h2 class="page-main-title">Sign up</h2>
            <?php
                $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                // string position method in php
                if(strpos($url, 'error=empty') !== false) {
                    // set to false instead of true, because you want to check for errors FIRST!
                    echo "<p>Fill out all fields!</p>";
                }

                // show new error for username already exists
                elseif(strpos($url, 'error=username') !== false) {
                    echo "<p>Username already exists!</p>";
                }
                 
                if(isset($_SESSION['id'])) {
                    echo "<p>You are already logged in!</p>";
                } else {
                    // Show the form if you are not logged in
                    echo "<form class='signup-form' action='includes/signup.inc.php' method='POST'>
                        <input type='text' name='first' placeholder='Firstname'>
                        <input type='text' name='last' placeholder='Lastname'>
                        <input type='text' name='uid' placeholder='Username'>
                        <input type='password' name='pwd' placeholder='Password'>
                        <button type='submit'>Sign up</button>
                    </form>";
                }
            ?>
        </section>
    </main>
</body>
</html>