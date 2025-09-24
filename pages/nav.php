<nav>
    <?php foreach ($routes as $path => $data): ?>
        <a href="<?= htmlspecialchars($path) ?>"<?php if ($currentUrl === $path) echo ' style="font-weight:bold;"'; ?>>
            <?= htmlspecialchars($data["title"]) ?>
        </a>
    <?php endforeach; ?>
</nav>