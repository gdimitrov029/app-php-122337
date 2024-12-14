<?php
require 'db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_POST['id'] ?? null;
    $destination = $_POST['destination'] ?? '';
    $date = $_POST['date'] ?? '';
    $description = $_POST['description'] ?? '';

    
    if ($id && $destination && $date && $description) {
       
        $stmt = $pdo->prepare("UPDATE trips SET destination = ?, date = ?, description = ? WHERE id = ?");
        $updated = $stmt->execute([$destination, $date, $description, $id]);

        if ($updated) {
            
            header('Location: trips.php');
            exit;
        } else {
            echo "<p>Error updating trip. Please try again.</p>";
        }
    } else {
        echo "<p>All fields are required.</p>";
    }
} else {
    echo "<p>Invalid request method.</p>";
}
?>
