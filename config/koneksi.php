<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_hotel";

// create conn
$conn = new mysqli($servername, $username, $password, $dbname);

// jaga2 klo error
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

?>