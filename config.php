<?php

$host = "localhost";
$user = "web_user";
$password = "Caraval128";
$database = "user_db";

$conn = new mysqli($host, $user, $password, $databse);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

?>