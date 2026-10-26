<?php

if(!isset($_SESSION['username']))
    header('Location: /login');

include_once('db.php');

if($_SERVER['REQUEST_METHOD'] == 'POST')  {
    if(validate_csrf_token() && isset($_POST['name']) && isset($_POST['body'])) {
        update_profile($_POST['name'], $_POST['body']);
    }
}

$profile = get_profile_data();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="/style.css">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header style="margin-bottom: 20px;">
            <h1>Dashboard</h1>
            <a href="/" style="margin-right: 10px;">View Profile</a>
            <!-- WIP feature, leave disabled right now -->
            <!--<a href="/stats" style="margin-right: 10px;">Stats</a> -->
            <a href="/logout">Log Out</a>
        </header>
        <main>
            <form method="POST" action="/admin">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $profile['name'] ?>">
                <label for="body">Page Content</label>
                <textarea id="body" name="body" placeholder="Page Content"><?php echo $profile['body'];?></textarea>
                <button type="submit">Save</button>
            </form>
        </main>
    </body>
</html>