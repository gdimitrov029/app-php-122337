<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "Всички полета са задължителни!";
        exit;
    }

    if ($password !== $confirm_password) {
        echo "Паролите не съвпадат!";
        exit;
    }

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $hashed_password]);
        echo "Регистрацията е успешна!";
    } catch (PDOException $e) {
        if ($e->getCode() === '23000') { 
            echo "Този имейл вече е регистриран.";
        } else {
            echo "Грешка при регистрацията: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="styless/register.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-image: url('images/registration.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
}
        </style>
</head>
<body>
<?php require_once 'navbar.php'; ?>
    <div class="registration-form">
        <h2>Регистрация</h2>
        <form method="post" action="register.php">
            <input type="text" name="username" placeholder="Имена" required>
            <input type="email" name="email" placeholder="Имейл" required>
            <input type="password" name="password" placeholder="Парола" required>
            <input type="password" name="confirm_password" placeholder="Повтори парола" required>
            <button type="submit">Регистрирай се</button>
        </form>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Регистрация. Всички права запазени.</p>
    </footer>
</body>
</html>

