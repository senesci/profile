<?php

session_start();

if (empty($_SESSION['csrf_token']) || time() - $_SESSION['csrf_token_time'] > 900) { // 15 minutes expiry
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    $_SESSION['csrf_token_time'] = time();
}

function validate_csrf_token() {
    if (isset($_POST['csrf_token'], $_SESSION['csrf_token'], $_SESSION['csrf_token_time']) &&
        hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']) &&
        (time() - $_SESSION['csrf_token_time'] <= 900)) {
        return true;
    } else {
        return false;
    }
}