<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'travel_db';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT destination_id, name, country, description, average_cost, best_season, popular_attractions, image_url FROM destinations";
$result = $conn->query($sql);
if ($result === false) {
    die("Error executing query: " . htmlspecialchars($conn->error));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations</title>
    <style>

 body {
    margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('images/travel.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        main {
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); 
            border-radius: 10px;
            margin: 20px auto;
            max-width: 1200px;
        }

        .content-container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        ul {
            list-style-type: disc;
            margin-left: 20px;
        }

        ul li {
            margin-bottom: 8px;
        }

        footer {
            background-color: #58a5e9;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: auto;
        }

        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
        }
        th, td { 
            padding: 10px; 
            border: 1px solid #ddd; 
            text-align: left; 
        }
        th { 
            background-color: #f2f2f2; 
        }
        img { 
            width: 100px; 
            height: auto; 
        }
    </style>
</head>

  
<body>
<?php require_once 'navbar.php'; ?>
<main>
    <h1>Дестинации</h1>
   
    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Снимка</th>
                <th>Име</th>
                <th>Държава</th>
                <th>Описание</th>
                <th>Средна цена</th>
                <th>Най-добър сезон</th>
                <th>Популярни забележителности</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row["destination_id"]) ?></td>
                <td>
                    <?php if (!empty($row["image_url"])): ?>
                        <img src="http://<?= $_SERVER["HTTP_HOST"]. htmlspecialchars($row["image_url"]) ?>" alt="<?= htmlspecialchars($row["name"]) ?>">
                    <?php else: ?>
                        <p>No image available</p>
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($row["name"]) ?></td>
                <td><?= htmlspecialchars($row["country"]) ?></td>
                <td><?= htmlspecialchars($row["description"]) ?></td>
                <td><?= number_format((float)$row["average_cost"], 2) . " лв." ?></td>
                <td><?= htmlspecialchars($row["best_season"]) ?></td>
                <td><?= htmlspecialchars($row["popular_attractions"]) ?></td>
            </tr>
           
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Няма намерени дестинации</p>
    <?php endif; ?>

    <?php
    $conn->close();
    ?>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Пътувания. Всички права запазени.</p>
</footer>
</body>
</html>
