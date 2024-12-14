<?php
require 'db.php';
if (isset($_POST['delete']) && isset($_POST['id'])) {

    $tripId = (int) $_POST['id'];
    $stmt = $pdo->prepare("DELETE FROM trips WHERE id = :id");
    $stmt->bindParam(':id', $tripId, PDO::PARAM_INT);
    if ($stmt->execute()) {
        header('Location: trips.php'); 
        exit;
    } else {
        echo "Error deleting trip.";
    }
}
?>
