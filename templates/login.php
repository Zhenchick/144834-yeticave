<main>
  <nav class="nav">
    <ul class="nav__list container">
      <!-- Выводит верхнее меню -->
      <?php foreach ($categories as $category):  ?>
                <li class="nav__item">
                    <a href="all-lots.html">
                        <?=$category['title']; ?>
                    </a>
                </li>
      <?php endforeach; ?>
    </ul>
  </nav>
  <form class="form container <?= empty($errors) ? '' : 'form--invalid'; ?>" action="login.php" method="post"> <!-- form--invalid -->
    <h2>Вход</h2>
    <div class="form__item <?= isset($errors['email']) ? 'form__item--invalid' : ''; ?>"> <!-- form__item--invalid -->
      <label for="email">E-mail*</label>
      <input id="email" type="text" name="user[email]" placeholder="Введите e-mail" value="<?= $user['email'] ?? ''; ?>">
      <?php if (isset($errors['email'])): ?>
      <span class="form__error"><?=$errors['email'] ?></span>
      <?php endif; ?>
    </div>
    <div class="form__item form__item--last <?= isset($errors['password']) ? 'form__item--invalid' : ''; ?>">
      <label for="password">Пароль*</label>
      <input id="password" type="password" name="user[password]" placeholder="Введите пароль" >
      <?php if (isset($errors['password'])): ?>
      <span class="form__error"><?=$errors['password'] ?></span>
      <?php endif; ?>
    </div>
    <button type="submit" class="button">Войти</button>
  </form>
</main>