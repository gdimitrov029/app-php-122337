<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $errors = [];
   
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

   
    if (empty($name)) {
        $errors[] = 'Полето Имена е задължително.';
    }
    if (empty($email)) {
        $errors[] = 'Полето Имейл е задължително.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Моля, въведете валиден имейл.';
    }
    if (empty($message)) {
        $errors[] = 'Полето Съобщение е задължително.';
    }
    if (count($errors) === 0) {
        echo '
            <div class="alert alert-success" role="alert">
                Благодарим ви ' . htmlspecialchars($name) . ', че се свързахте с нас.
                Ще се свържем с вас на ' . htmlspecialchars($email) . ' възможно най-скоро.
            </div>
        ';
        
        header("Refresh: 3; URL=" . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo '
            <div class="alert alert-danger" role="alert">
                Възникнаха следните грешки:
                <ul>';
        foreach ($errors as $error) {
            echo '<li>' . htmlspecialchars($error) . '</li>';
        }
        echo '
                </ul>
            </div>
        ';
    }
}
?>
<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пътувания - Контакти</title>
    <link rel="stylesheet" href="styless/contact.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-image: url('images/contactus.jpg'); 
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
}
.contact-form {
    max-width: 700px;
    width: 100%;
    padding: 40px;
    background-color: rgba(255, 255, 255, 0.8); 
    border: 2px solid #ccc;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    margin: 20px auto; 
}

        </style>
</head>
<body>
<?php require_once 'navbar.php'; ?>
    <div class="contact-form">
        <h3>Връзка с нас</h3>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="name" class="form-label">Имена</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Вашето име" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Имейл</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Вашият имейл" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Съобщение</label>
                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Вашето съобщение" required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Изпрати</button>
        </form>
    </div>
    <footer>
        <p>&copy; <?= date("Y"); ?> Пътувания. Всички права запазени.</p>
    </footer>
</body>
</html>

