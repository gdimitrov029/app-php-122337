<?php
include 'db.php';
$stmt = $pdo->query("SELECT * FROM trips ORDER BY date DESC");
while ($trip = $stmt->fetch()) {
    echo "<div>";
    echo "<h3>" . htmlspecialchars($trip['destination']) . "</h3>";
    echo "<p>Date: " . htmlspecialchars($trip['date']) . "</p>";
    echo "<p>" . htmlspecialchars($trip['description']) . "</p>";
    echo "</div>";
}
?>
