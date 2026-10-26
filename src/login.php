<?php

include_once('db.php');

if(isset($_SESSION['username']))
    header('Location: /admin');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(validate_csrf_token()) {
        if(isset($_POST['username']) && isset($_POST['password'])) {
            if(login_user($_POST['username'], $_POST['password'])) {
                $_SESSION['username'] = $_POST['username'];
                header('Location: /admin');
            } else {
                $ERROR = "Invalid credentials.";
            }
        } else {
            $ERROR = "You must enter a username and password.";
        }
    } else {
        $ERROR = "Invalid CSRF token.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign In</title>
        <link rel="stylesheet" href="/style.css">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="login-box">
            <form method="POST" action="/login">
                <h3 class="center">Sign In</h3>
                <?php
                if(isset($ERROR))
                    echo "<div class='alert'>$ERROR</div>";
                ?>
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" required autofocus>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <button type="submit">Continue</button>
            </form>
        </div>
    </body>
</html>