<?php

namespace Classes;

class AuthController
{
    public static function logout(): void
    {
        // Перевірка CSRF токена
        $token = $_GET['token'] ?? '';
        if (!hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
            header('Location: /');
            exit;
        }
        
        $_SESSION = [];
        session_destroy();
        header('Location: /');
        exit;
    }
    
    public static function generateCsrfToken(): string
    {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    public static function login(): bool
    {
        // TODO: замість масиву можна перевіряти БД
        $users = [
            'admin' => '123',
            'user'  => 'pass'
        ];

        // Перевірка логіну
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';

        // Перевірка чи існує користувач і чи пароль правильний
        if (isset($users[$login]) && $users[$login] === $password) {
            $_SESSION['login'] = $login;
            header('Location: /');
            exit;
        }

        // У випадку невірного логіну/пароля
        $_SESSION['login_error'] = 'Невірний логін або пароль';
        header('Location: /login');
        exit;
    }

    public static function isLogged(): bool
    {
        return !empty($_SESSION['login']);
    }
}