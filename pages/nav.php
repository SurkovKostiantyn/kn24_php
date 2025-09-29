<nav class="nav">
  <?php foreach ($routes as $path => $data): ?>
    <a
      class="nav_link<?= ($currentPath ?? '/') === $path ? ' active' : '' ?>"
      href="<?= htmlspecialchars($path, ENT_QUOTES, 'UTF-8') ?>"
      aria-current="<?= (($currentPath ?? '/') === $path) ? 'page' : 'false' ?>"
    >
      <?= htmlspecialchars($data["title"], ENT_QUOTES, 'UTF-8') ?>
    </a>
  <?php endforeach; ?>
</nav>