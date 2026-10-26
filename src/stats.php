<?php

if(!isset($_SESSION['username']))
    header('Location: /login');

include_once('db.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Stats</title>
        <link rel="stylesheet" href="/style.css">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header style="margin-bottom: 20px;">
            <h1>Your Stats</h1>
            <a href="/admin"">Go Back</a>
        </header>
        <main>
            <div class="box">
                <h3 class="center">Monthly Stats</h3>
                <ul>
                    <li>Total Pageviews: <code>400</code></li>
                    <li>Views From Unique UA: <code>67</code></li>
                </ul>
            </div>

            <div class="box">
                <h3 class="center">All-Time Stats</h3>
                <ul>
                    <li>Total Pageviews: <code>400</code></li>
                    <li>Views From Unique UA: <code>67</code></li>
                </ul>
            </div>
        </main>
    </body>
</html>