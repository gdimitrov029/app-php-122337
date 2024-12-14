
<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO trips (user_id, destination, date, description) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $destination, $date, $description]);
    
    echo json_encode(['success' => true, 'message' => 'Trip added successfully']);
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('form').on('submit', function(e) {
        e.preventDefault(); // Спира стандартното действие на формуляра
        $.ajax({
            url: 'add_trip.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert('Пътуването е добавено успешно!');
                
            },
            error: function(xhr) {
                alert('An error occurred: ' + xhr.statusText);
            }
        });
    });
});
</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Trip</title>
    <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-image: url('images/trip.jpg'); 
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
}

footer {
    background-color: #58a5e9; 
    color: white;
    padding: 10px 20px;
    text-align: center;
}

footer {
    margin-top: auto;
}

main {
    margin: 20px;
    padding: 20px;
}

.form-container {
    max-width: 700px;
    width: 100%;
    padding: 40px;
    background-color: rgba(255, 255, 255, 0.8); 
    border: 2px solid #ccc;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    margin: 20px auto; 
}

h1 {
    color: #333; 
    font-size: 2em;
    text-align: center;
    margin-bottom: 20px;
}

input, textarea {
    width: 100%;
    padding: 15px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 10px;
    font-size: 16px;
}

textarea {
    resize: vertical;
    min-height: 100px;
}

button {
    width: 100%;
    padding: 15px;
    background-color: white; 
    border: 1px solid #58a5e9;
    color: #58a5e9; 
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #58a5e9;
    color: white; 
}

footer p {
    font-size: 14px;
}

@media (max-width: 768px) {
    .navbar {
        flex-direction: column;
        align-items: flex-start;
    }

    .navbar a {
        margin: 10px 0;
    }

    .form-container {
        width: 90%;
        padding: 15px;
    }
} 

        </style>
</head>
<body>
<?php require_once 'navbar.php'; ?>
    <main>
    <div class="form-container">
        <h1>Добави ново пътуване</h1>

        <form method="post" action="add_trip.php">
            <input type="text" name="destination" placeholder="Destination" required>
            <input type="date" name="date" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <button type="submit">Добави</button>
        </form>
    </div>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Пътувания. Всички права запазени.</p>
    </footer>
</body>
</html>
