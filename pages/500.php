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
    <h1>500 Internal Server Error</h1><p>Файл сторінки не знайдено.</p>
    <a href="/">Повернутись на головну</a>
</body>
</html>