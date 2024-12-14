<?php
require 'db.php';

try {
    $stmt = $pdo->prepare("SELECT id, destination, date, description FROM trips");
    $stmt->execute();
    $trips = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($trips);
} catch (PDOException $e) {
    http_response_code(500); 
    echo json_encode([
        "error" => "Failed to fetch trips",
        "details" => $e->getMessage()
    ]);
}
?>
