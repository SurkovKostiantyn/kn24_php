<?php

namespace Classes;

use Latte\Engine;

class Viewer {

    public static function show(string $page, array $param = []): void {
        $latte = new Engine();

        // Папка для кеша Latte
        $latte->setTempDirectory(__DIR__ . '/../../temp');

        // Абсолютный путь к шаблону
        $templatePath = __DIR__ . '/../templates/' . $page . '.latte';

        if (!file_exists($templatePath)) {
            throw new \RuntimeException("Template not found: $templatePath");
        }

        $latte->render($templatePath, $param);
    }
}
