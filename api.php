<?php
$pdo = new PDO('mysql:host=localhost;dbname=exodia_clan', 'your_username', 'your_password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$action = $_GET['action'] ?? '';

if ($action === 'getGallery') {
    $stmt = $pdo->query("SELECT * FROM gallery ORDER BY uploaded_at DESC");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}
elseif ($action === 'uploadImage' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = $_POST['url'] ?? '';
    if ($url) {
        $stmt = $pdo->prepare("INSERT INTO gallery (image_url) VALUES (?)");
        $stmt->execute([$url]);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid URL']);
    }
}
elseif ($action === 'deleteImage' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $stmt = $pdo->prepare("DELETE FROM gallery WHERE id = ?");
    $stmt->execute([$id]);
    echo json_encode(['success' => true]);
}
?>