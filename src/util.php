<?php

include_once('config.php');
include_once('db.php');

function record_pageview($user_agent) {
    global $db;
    $stmt = $db->prepare("INSERT INTO pageviews (user_agent) VALUES (?);");
    $stmt->bind_param("s", $user_agent);
    $stmt->execute();
}