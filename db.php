<?php
$servername = "localhost";
$username = "root";
$password = "zander";
$dbname = "todolist";

// connect to db
$conn = new mysqli($servername, $username, $password, $dbname);

// connection check
if ($conn->connect_error) {
    die('connection failed' . $conn->connect_error);
}

// setting charset
$conn->set_charset('utf8');