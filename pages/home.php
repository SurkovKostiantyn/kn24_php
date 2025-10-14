<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Сторінка', ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="./styles/style.css">
    <script src="./scripts/script.js"></script>
    <!-- Favicon базовий -->
    <link rel="icon" href="./images/icons/favicon.ico" sizes="any">

    <!-- PNG-іконки для браузерів -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/icons/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/icons/favicon-32x32.png">

    <!-- Apple Touch Icon (для iOS / iPadOS) -->
    <link rel="apple-touch-icon" sizes="180x180" href="./images/icons/apple-touch-icon.png">

    <!-- Android / PWA -->
    <link rel="manifest" href="./images/icons/site.webmanifest">

    <!-- Тема і колір плитки для Windows -->
    <meta name="theme-color" content="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
</head>
<body>
    <h1>Головна сторінка (файл /pages/home.php)</h1>
    <p>
        <?php
            echo "Привіт, " . ($_SESSION['login'] ?? 'КОРИСТУВАЧ НЕ АВТОРИЗОВАНИЙ');
        ?>
    </p>

    <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=https%3A%2F%2Fkn24-php.onrender.com" alt="QR kn24-php">

    <div id="div" style="list-style:none; display:flex; gap:10px; flex-wrap:wrap;">
    </div>
    <button id="btn">Додати картинку</button>

    <script>
        const url = "https://picsum.photos/300/300";
        const div = document.getElementById("div");
        const btn = document.getElementById("btn");
        
        // отримати картинку асинхронно з сайту "https://picsum.photos/300/300"
        const getPicFromAPI = async (obj) => {
            // Цей блок намагається виконати код всередині, або показати помилку
            try { 
                // в змінну response запишеться відповідь віддаленого сервера
                const response = await fetch(url);

                console.log(response); // Подивіться в консоль, що там приходить
                console.log(response.url); // нас цікавить саме url

                if (!response.ok) {
                    // якщо сервер відповів з кодом помилки (наприклад, 404, 500)
                    // пишемо в консоль помилку
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                // встановлюємо отриману картинку
                obj.src = response.url;
            } catch (error) {
                console.error('Помилка при завантаженні зображення:', error);
            }
        };

        // функція що додає картинку
        const addPic = () => {
            let img = document.createElement('img');
            div.appendChild(img);
            img.src = './images/1.jpg';

            // а тепер викликаємо нашу асинхронну функцію
            getPicFromAPI(img);
        }
        
        // обробник подій для кнопки 
        btn.addEventListener( 'click', addPic);

    </script>

</body>
</html>