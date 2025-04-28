<?php
include 'db.php';

$sql = "SELECT * FROM gallery ORDER BY uploaded_at DESC";
$result = $conn->query($sql);

$images = [];
while($row = $result->fetch_assoc()) {
  $images[] = $row;
}

echo json_encode($images);
?>