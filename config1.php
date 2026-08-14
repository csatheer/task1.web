<?php
// Replace these four values with the MySQL details from your InfinityFree account.

$db_host = "YOUR_MYSQL_HOST";
$db_name = "YOUR_DATABASE_NAME";
$db_user = "YOUR_DATABASE_USERNAME";
$db_pass = "YOUR_DATABASE_PASSWORD";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Database connection failed.");
}

$conn->set_charset("utf8mb4");
?>