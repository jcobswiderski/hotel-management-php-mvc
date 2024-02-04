<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'booking_system');

$host = DB_HOST;
$username = DB_USER;
$password = DB_PASSWORD;
$db_name = DB_NAME;

$db = new mysqli($host, $username, $password, $db_name);

if ($db->connect_error) {
    die("Connection failed: " . $this->conn->connect_error);
}