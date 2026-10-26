<?php
include_once('db.php');
include_once('Parsedown.php');
$profile = get_profile_data();

$Parsedown = new Parsedown();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $profile['name'] ?></title>
        <link rel="stylesheet" href="/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <h1 class="center"><?php echo $profile['name'] ?></h1>
        </header>
        <main><?php echo $Parsedown->text($profile['body']) ?></main>
    </body>
</html>