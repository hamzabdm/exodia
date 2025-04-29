<?php
require 'config.php';

$stmt = $conn->query("SELECT * FROM announcements ORDER BY posted_at DESC");
$news = $stmt->fetchAll();

foreach ($news as $post) {
    echo "<h2>" . htmlspecialchars($post['title']) . "</h2>";
    echo "<p>" . nl2br(htmlspecialchars($post['content'])) . "</p><hr>";
}
?>
