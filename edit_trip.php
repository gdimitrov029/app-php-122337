

<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-image: url('images/edit.jpg'); 
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
}
  .container {
    max-width: 700px;
    width: 100%;
    padding: 40px;
    background-color: rgba(255, 255, 255, 0.8); 
    border: 2px solid #ccc;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    margin: 20px auto; 
  }

  .container h2 {
    font-size: 2em;
    margin-bottom: 20px;
    color: #333;
  }

  .container label {
    font-weight: bold;
    display: block;
    margin: 10px 0 5px;
  }

  .container input, .container textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
  }

  .container button {
    background-color: #58a5e9;
    color: white;
    padding: 15px 30px;
    font-size: 18px;
    cursor: pointer;
    border-radius: 10px;
    border: none;
    transition: background-color 0.3s ease;
  }

  .container button:hover {
    background-color: #0077cc;
  }

  footer {
    text-align: center;
    background-color: #58a5e9;
    color: white;
    padding: 10px 0;
    margin-top: auto;
  }
</style>

<?php require_once 'navbar.php'; ?>

<?php
require 'db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];
    $stmt = $pdo->prepare("SELECT destination, date, description FROM trips WHERE id = ?");
    $stmt->execute([$id]);
    $trip = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($trip) {
        echo "<div class='container'>
                <h2>Редактиране на пътуване</h2>
                <form action='update_trip.php' method='POST'>
                    <input type='hidden' name='id' value='" . htmlspecialchars($id) . "'>
                    <label>Дестинация:</label>
                    <input type='text' name='destination' value='" . htmlspecialchars($trip['destination']) . "'><br>
                    <label>Дата:</label>
                    <input type='date' name='date' value='" . htmlspecialchars($trip['date']) . "'><br>
                    <label>Описание:</label>
                    <textarea name='description'>" . htmlspecialchars($trip['description']) . "</textarea><br>
                    <button type='submit'>Запази</button>
                </form>
              </div>";
    } else {
        echo "<div class='container'><p>Пътуването не е намерено.</p></div>";
    }
} else {
    echo "<div class='container'><p>Невалидна заявка.</p></div>";
}
?>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Пътувания. Всички права запазени.</p>
</footer>


