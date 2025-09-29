<nav>
    <?php foreach ($routes as $path => $data): ?>
        <a href="<?= $path ?>">
            <?= $data["title"] ?>
        </a>
    <?php endforeach; ?>
</nav>