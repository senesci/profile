<?php
include_once('config.php');

$db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB, MYSQL_PORT);

if(!$db)
    die("DB connection failed: " . mysqli_connect_error());

function get_profile_data() {
    global $db;
    $result = mysqli_query($db, "SELECT * FROM profile");
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function login_user($username, $password) {
    global $db;
    $stmt = mysqli_prepare($db, "SELECT * FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($password, $row['pw_hash'])) {
        return true;
    }

    return false;
}

function update_profile($name, $body) {
    global $db;
    $stmt = mysqli_prepare($db, "UPDATE profile SET name = ?, body = ? WHERE 1");
    mysqli_stmt_bind_param($stmt, "ss", $name, $body);
    mysqli_stmt_execute($stmt);
}