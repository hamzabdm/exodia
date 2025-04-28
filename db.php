<?php
$servername = "localhost";
$username = "exodiaroot";
$password = "exodia150root";
$dbname = "exodia_clan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
