<nav>
    <?php foreach ($routes as $path => $data): ?>
        <a href="<?= htmlspecialchars($path) ?>">
            <?= htmlspecialchars($data["title"]) ?>
        </a>
    <?php endforeach; ?>
</nav>