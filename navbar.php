<style>
    .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #58a5e9;
    padding: 10px 20px;
}

.navbar ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    flex: 1;
}

.navbar ul li {
    margin: 0 15px;
}

.navbar ul li a {
    text-decoration: none;
    color: white;
    font-weight: bold;
}
.navbar .brand {
    color: white;
    font-size: 1.5em;
    font-weight: bold;
    text-decoration: none;
}

.auth-buttons {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

.auth-buttons a, .auth-buttons button {
    background-color: white;
    border: none;
    padding: 8px 15px;
    cursor: pointer;
    font-weight: bold;
    border-radius: 5px;
    text-decoration: none;
}

.auth-buttons button:hover {
    background-color: #e3e3e3;
}

</style>
    <nav class="navbar">
        <img src="images/logo.jpg" alt="Лого на Пътувания" style="width: 40px; height: 40px; margin-right: 10px;">
            <a href="index.php" class="brand">Пътувания</a>
            <ul>
                <li><a href="index.php">Начало</a></li>
                <li><a href="destinations.php">Дестинации</a></li>
                <li><a href="contacts.php">Контакти</a></li>
                <li><a href="profile.php">Профил</a></li>
            </ul>
            <div class="auth-buttons">
            <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="logout.php">Изход</a>
                <?php else: ?>
                    <a href="login.php">Вход</a>
                    <a href="register.php">Регистрация</a>
                <?php endif; ?>
            </div>
    </nav>


       
       