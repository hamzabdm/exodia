<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"));

if (isset($data->url)) {
  $stmt = $conn->prepare("INSERT INTO gallery (image_url) VALUES (?)");
  $stmt->bind_param("s", $data->url);
  if ($stmt->execute()) {
    echo json_encode(["status" => "success"]);
  } else {
    echo json_encode(["status" => "error"]);
  }
}
?>