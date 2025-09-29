<?php


    // Перевіряємо, що запит дійсно POST і параметр firstname переданий
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['firstname'])) {
        $firstname = htmlspecialchars($_POST['firstname']); // захист від XSS
        echo $firstname;
    }
