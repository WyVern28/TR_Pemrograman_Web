<?php
include_once '../config/koneksi.php';
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "username:  " . $row["username"] ." role: " . $row["role"] ." dibuat pada : ". $row["dibuat_pada"] ."<br>";
    }
} else {
    echo "0 results";
}
?>