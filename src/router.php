<?php

$url = $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);

if($_SERVER['REQUEST_METHOD'] == 'GET')
    switch($path) {
        case '/':
            include_once('profile.php');
            include_once('util.php');
            if(!isset($_SESSION['username']))
                record_pageview($_SERVER['HTTP_USER_AGENT']);
            break;
        case '/style.css':
            header('Content-Type: text/css');
            $style = file_get_contents(__DIR__ . '/style.css');
            echo $style;
            break;
        case '/admin':
            include_once('admin.php');
             break;
        case '/stats':
            include_once('stats.php');
            break;
        case '/login':
            include_once('login.php');
            break;
        case '/logout':
            session_destroy();
            header('Location: /login');
        default:
            header('Location: /');
            break;
    }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch($path) {
        case '/login':
            include_once('login.php');
            break;
        case '/admin':
            include_once('admin.php');
            break;
        default:
            header('Location: /');
            break;
    }
}