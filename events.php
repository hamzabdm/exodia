<?php
require 'config.php';

$stmt = $conn->query("SELECT * FROM events ORDER BY event_date ASC");
$events = $stmt->fetchAll();

foreach ($events as $event) {
    echo "<h2>" . htmlspecialchars($event['event_name']) . " on " . $event['event_date'] . "</h2>";
    echo "<p>" . nl2br(htmlspecialchars($event['description'])) . "</p><hr>";
}
?>
