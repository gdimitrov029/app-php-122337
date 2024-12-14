<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-image: url('images/profile.jpg'); 
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


  .welcome-message {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
  }

  .links {
    margin-top: 20px;
  }

  .links a {
    display: block;
    margin-bottom: 10px;
    padding: 10px;
    background-color: #58a5e9;
    color: #fff;
    text-decoration: none;
    text-align: center;
    border-radius: 5px;
    transition: background-color 0.3s ease;
  }

  .links a:hover {
    background-color: #1d78c1;
  }

  .login-link {
    text-align: center;
  }

  .login-link a {
    color: white;
    text-decoration: none;
    font-weight: bold;
  }

  .login-link a:hover {
    text-decoration: underline;
  }

  .registration-form {
    max-width: 700px;
    margin: 50px auto;
    padding: 40px;
    background-color: #f2f2f2;
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

<div class="container">
  <?php if (!isset($_SESSION['user_id'])): ?>
    <h2>Моля, влезте, за да достъпите тази страница.</h2>
      <h2>Благодарим Ви!</h2>
      <h3>Лек и хубав ден!</h3>
  <?php else: ?>
    <div class="welcome-message">
      Добре дошли, <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?>
    </div>
    <div class="links">
      <a href="add_trip.php">Добави ново пътуване</a>
      <a href="trips.php">Виж пътуванията</a>
    </div>
  <?php endif; ?>
</div>
<footer>
        <p>&copy; <?php echo date("Y"); ?> Пътувания. Всички права запазени.</p>
    </footer>
