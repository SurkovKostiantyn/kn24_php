<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="icon" type="image/x-icon" href="skfbskdfbksdfb">
    <script src="./scripts/script.js"></script>
</head>
<body>
    <?php include_once 'pages/nav.php'?>
    <h1>HOME</h1>

    <?php
        // Опрацьовуємо нашу форму
        // Перевіряємо, що запит дійсно POST і параметр firstname переданий
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstname = htmlspecialchars($_POST['firstname'] ?? "Дані не отримано"); // захист від XSS
            $lastname = htmlspecialchars($_POST['lastname'] ?? "Дані не отримано"); // захист від XSS
            // виведемо на сторінку
            echo "<p>Привіт, $firstname $lastname</p>";
        }
    ?>

    <h2>Нижче у нас форма, яка буде передавати дані на сервер методом POST</h2>
    <form method="POST" action="">
        <label for="firstname">
            <input type="text" name="firstname" id="firstname" placeholder="firstname">
        </label>
        <br>
        <label for="lastname">
            <input type="text" name="lastname" id="lastname" placeholder="lastname">
        </label>
        <br>
        <input type="submit" value="Надіслати дані на сервер">
    </form>

</body>
</html>