<?php
include 'db.php'; 
?>
<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пътувания - Начална страница</title>
    <style>
body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
          display: flex;
          flex-direction: column;
          min-height: 100vh;
          background-image: url('images/background.jpg'); 
          background-size: cover;
          background-position: center;
          background-attachment: fixed;
          background-repeat: no-repeat;
      }

      main {
          flex: 1;
          padding: 30px 20px;
      }

      .content-container {
          max-width: 1200px;
          margin: 0 auto;
          background-color: rgba(255, 255, 255, 0.9); 
          padding: 20px;
          border-radius: 8px;
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
    background-color: #58a5e9;
    color: white;
    text-align: center;
    padding: 10px 0;
    margin-top: auto;
}


    </style>
</head>
<body>
<?php require_once 'navbar.php'; ?>
    <main>
        <div class="content-container">
            <section>
                <h2>Как работи?</h2>
                <ul>
                    <li>Регистрирайте се или влезте в своя профил.</li>
                    <li>Добавете пътуване, като посочите дестинация, дати и описание.</li>
                    <li>Преглеждайте и управлявайте списъка с вашите приключения.</li>
                </ul>
            </section>
            <section>
                <h2>Планирайте следващото си приключение</h2>
                <p>Създайте и управлявайте лични маршрути, запазвайте спомени и се подгответе за следващото си пътуване с лекота.</p>
                <p>Нашето приложение ви позволява да добавяте и съхранявате информация за вашите пътувания, да разглеждате минали дестинации и да се вдъхновявате за нови места.</p>
                <p>Ако не сте решили къде искате да отидете на почивка, може да се възползвате от нашите предложения в графа "Дестинации".</p>
            </section>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Пътувания. Всички права запазени.</p>
    </footer>

</body>
</html>
