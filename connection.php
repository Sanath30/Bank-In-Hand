<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$db_name = "bank";

$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Couldn't connect to the database " . $conn->connect_error);
}

?>