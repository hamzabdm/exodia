<?php
require 'config.php';

$stmt = $conn->query("SELECT * FROM gallery ORDER BY uploaded_at DESC");
$images = $stmt->fetchAll();

foreach ($images as $img) {
    echo "<h2>" . htmlspecialchars($img['title']) . "</h2>";
    echo "<img src='" . htmlspecialchars($img['image_url']) . "' style='width:300px;'><hr>";
}
?>
