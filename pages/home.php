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
        // Перевіряємо, що запит дійсно POST і параметр firstname переданий
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['firstname'])) {
            $firstname = htmlspecialchars($_POST['firstname']); // захист від XSS
            echo $firstname;
        }
    ?>

    <form method="POST" action="index.php">
        <input type="text" name="firstname">
        <input type="submit">
    </form>

</body>
</html>