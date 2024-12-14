<style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-image: url('images/trip1.jpg'); 
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

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  table, th, td {
    border: 1px solid #ddd;
  }

  th, td {
    padding: 12px;
    text-align: left;
  }

  th {
    background-color: #58a5e9;
    color: white;
  }

  td {
    background-color: #f9f9f9;
  }

  .actions button {
    background-color: #58a5e9;
    color: white;
    border: none;
    padding: 6px 12px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
  }

  .actions button:hover {
    background-color: #0077cc;
  }
</style>
<?php require_once 'navbar.php'; ?>
<main class="container">
  <h2>Редактиране на пътувания</h2>

  <?php
  require 'db.php';

  
  $stmt = $pdo->query("SELECT id, destination, date, description FROM trips");
  $trips = $stmt->fetchAll(PDO::FETCH_ASSOC);

  
  if (count($trips) > 0) {
      echo "<table>
              <thead>
                  <tr>
                      <th>Дестинация</th>
                      <th>Дата</th>
                      <th>Описание</th>
                      <th>Действия</th>
                  </tr>
              </thead>
              <tbody>";
      foreach ($trips as $trip) {
          echo "<tr>
                  <td>" . htmlspecialchars($trip['destination']) . "</td>
                  <td>" . htmlspecialchars($trip['date']) . "</td>
                  <td>" . htmlspecialchars($trip['description']) . "</td>
                  <td class='actions'>
                      <a href='edit_trip.php?id=" . htmlspecialchars($trip['id']) . "'><button type='button'>Редактирай</button></a>
                      <form action='delete_trip.php' method='POST' style='display:inline;'>
                          <input type='hidden' name='id' value='" . htmlspecialchars($trip['id']) . "'>
                          <button type='submit' name='delete' value='1'>Изтрий</button>
                      </form>
                  </td>
              </tr>";
      }
      echo "</tbody>
          </table>";
  } else {
      echo "<p>Няма намерени пътувания.</p>";
  }
  ?>
</main>


<footer>
  <p>&copy; <?php echo date("Y"); ?> Пътувания. Всички права запазени.</p>
</footer>

</body>
</html>
