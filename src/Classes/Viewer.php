<?php

namespace Classes;

use Latte\Engine;

class Viewer {
    public static function show(string $page, array $param = []): void
    {
        $latte = new Engine();
        $latte->setTempDirectory(__DIR__ . '/../../temp');

        $baseDir = __DIR__ . '/../templates';
        $layoutPath = "$baseDir/@layout.latte";
        $pagePath   = "$baseDir/$page.latte";

        if (!file_exists($pagePath)) {
            throw new \RuntimeException("Template not found: $pagePath");
        }

        // щоб Latte знав про layout — передаємо шлях до сторінки як "content"
        $param['contentTemplate'] = $pagePath;

        $latte->render($layoutPath, $param);
    }
}
