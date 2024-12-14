<?php
include 'db.php'; 

$loginError = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);
    $remember = isset($_POST['remember']);

    if (empty($email) || empty($password)) {
        $loginError = "Email and password are required.";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $loginError = "Invalid email format.";
        } else {
            try {
                $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
                $stmt->execute([$email]);
                $user = $stmt->fetch();

                if ($user && password_verify($password, $user['password'])) {
                    // Regenerate session to prevent session fixation attacks
                    session_start();
                    session_regenerate_id(true); // Regenerate session ID

                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];

                    if ($remember) {
                        // Set cookie for 30 days with secure flags for added security
                        setcookie('user_email', $email, time() + (86400 * 30), "/", "", isset($_SERVER["HTTPS"]), true); 
                    } else {
                        setcookie('user_email', '', time() - 3600, "/", "", isset($_SERVER["HTTPS"]), true);
                    }

                    header("Location: profile.php");
                    exit();
                } else {
                    $loginError = "Invalid email or password.";
                }
            } catch (PDOException $e) {
                // Provide a generic error message for security
                $loginError = "An error occurred while processing your request. Please try again later.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-image: url('images/login.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
        .registration-form {
    max-width: 700px; 
    margin: 50px auto;
    padding: 40px;
    background-color: white;
    border: 2px solid #ccc; 
    border-radius: 15px; 
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); 
}
        .registration-form h2 {
            text-align: center;
            font-size: 2em; 
            margin-bottom: 30px; 
            color: #333; 
        }

        .registration-form form {
            display: flex;
            flex-direction: column;
        }

        .registration-form input {
            margin-bottom: 20px; 
            padding: 15px; 
            font-size: 16px; 
            border: 1px solid #ccc;
            border-radius: 10px; 
        }

        .registration-form button {
            align-self: flex-start;
            background-color: #58a5e9;
            color: white;
            border: none;
            padding: 15px 30px; 
            font-size: 18px; 
            cursor: pointer;
            border-radius: 10px; 
            transition: background-color 0.3s ease; 
        }

        .registration-form button:hover {
            background-color: #0e0e0e; 
        }
        label {
    display: inline-block;
    margin-bottom: .5rem;
    color: white;
}
.text-center {
    text-align: center !important;
    color: white;
}

        footer {
            text-align: center;
            background-color: #58a5e9;
            color: white;
            padding: 10px 0;
            margin-top: auto;
        }
    </style>
</head>
<body>
<?php require_once 'navbar.php'; ?>
<div class="container">
    <form class="border rounded p-4 w-50 mx-auto mt-5" method="POST" action="login.php">
        <h3 class="text-center">Вход в системата</h3>
        <?php if (!empty($loginError)): ?>
            <div class="alert alert-danger text-center"><?php echo htmlspecialchars($loginError); ?></div>
        <?php endif; ?>
      
        <div class="mb-3">
            <label for="email" class="form-label">Имейл</label>
            <input type="email" class="form-control" id="email" name="email" 
                   value="<?php echo htmlspecialchars($_COOKIE['user_email'] ?? ''); ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Парола</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="remember" name="remember">
            <label class="form-check-label" for="remember">
                Запомни ме
            </label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Вход</button>
    </form>
</div>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Вход. Всички права запазени.</p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
