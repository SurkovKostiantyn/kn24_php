<nav class="nav">
  <?php foreach ($routes as $path => $data): ?>

    <?php
      // ------------------------------------------------------------
      // Умова: якщо користувач авторизований — не показуємо
      // пункти меню "Авторизація" та "Реєстрація"
      // ------------------------------------------------------------
      if ($isAuthenticated && in_array($path, ['/login', '/register'])) {
          continue; // пропускаємо ці лінки
      }

      // Якщо користувач НЕ авторизований — не показуємо "Вийти" (це нижче)
    ?>

    <!-- Стандартні навігаційні лінки -->
    <a
      class="nav_link<?= ($currentPath ?? '/') === $path ? ' active' : '' ?>"
      href="<?= htmlspecialchars($path, ENT_QUOTES, 'UTF-8') ?>"
      aria-current="<?= (($currentPath ?? '/') === $path) ? 'page' : 'false' ?>"
    >
      <?= htmlspecialchars($data["title"], ENT_QUOTES, 'UTF-8') ?>
    </a>

  <?php endforeach; ?>


  <?php if ($isAuthenticated): ?>
    <!-- Якщо користувач авторизований — показуємо кнопку "Вийти" -->
    <a
      class="nav_link logout"
      href="?logout=1"
      style="color: red; margin-left: 20px;"
    >
      Вийти
    </a>
  <?php endif; ?>
</nav>
