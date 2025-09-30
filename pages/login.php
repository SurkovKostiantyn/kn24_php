<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Сторінка', ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="./styles/style.css">
    <script src="./scripts/script.js"></script>
</head>
<body>
<?php include_once 'pages/nav.php'?>

<?php
    // Опрацьовуємо нашу форму
    $login = '';
    $password  = '';
    // Перевіряємо, що запит дійсно POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Отримуємо значення змінних
        $login = trim($_POST['login'] ?? '');
        $password  = trim($_POST['lastname'] ?? '');

        var_dump($login);
        var_dump($password);
    }
?>

    <h2>Нижче у нас форма, яка буде передавати дані на сервер методом POST</h2>
    <form method="POST" action="">
        <label for="login">
            <input 
                type="login" 
                name="login" 
                id="login" 
                placeholder="login" 
                required
            />
        </label>
        <label for="password">
            <input 
                type="password" 
                name="password" 
                id="password" 
                placeholder="password" 
                required
            />
        </label>
        <input type="submit" value="Авторизуватись">
    </form>
</body>
</html>