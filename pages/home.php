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
    <h1>Головна сторінка (файл /pages/home.php)</h1>

    <?php
        // Опрацьовуємо нашу форму
        $firstname = '';
        $lastname  = '';
        // Перевіряємо, що запит дійсно POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Отримуємо значення змінних
            $firstname = trim($_POST['firstname'] ?? '');
            $lastname  = trim($_POST['lastname'] ?? '');
    
            if ($firstname !== '' && $lastname !== '') {
                echo '<p>Привіт, <strong>' 
                   . htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8') . ' '
                   . htmlspecialchars($lastname,  ENT_QUOTES, 'UTF-8') 
                   . '</strong></p>';
            } else {
                echo '<p>Будь ласка, заповніть обидва поля в формі.</p>';
            }
        }
    ?>

    <h2>Нижче у нас форма, яка буде передавати дані на сервер методом POST</h2>
    <form method="POST" action="">
        <label for="firstname">
            <input 
                type="text" 
                name="firstname" 
                id="firstname" 
                placeholder="firstname" 
                value="<?= htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8') ?>"
                required
            />
        </label>
        <br><br>
        <label for="lastname">
            <input 
                type="text" 
                name="lastname" 
                id="lastname" 
                placeholder="lastname" 
                value="<?= htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8') ?>"
                required
            />
        </label>
        <br><br>
        <input type="submit" value="Надіслати дані на сервер">
    </form>

</body>
</html>