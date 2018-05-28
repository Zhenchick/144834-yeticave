<main>
  <nav class="nav">
    <ul class="nav__list container">
      <li class="nav__item">
        <a href="all-lots.html">Доски и лыжи</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Крепления</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Ботинки</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Одежда</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Инструменты</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Разное</a>
      </li>
    </ul>
  </nav>
  <form class="form container <?= empty($errors) ? '' : 'form--invalid'; ?>" action="sign-up.php" enctype="multipart/form-data" method="post"> <!-- form--invalid -->
    <h2>Регистрация нового аккаунта</h2>
    <div class="form__item <?= isset($errors['email']) ? 'form__item--invalid' : ''; ?>"> <!-- form__item--invalid -->
      <label for="email">E-mail*</label>
      <input id="email" type="text" name="user[email]" value="<?= $user['email'] ?? ''; ?>" placeholder="Введите e-mail"  >
      <?php if (isset($errors['email'])): ?>
      <span class="form__error"><?=$errors['email'] ?></span>
      <?php endif; ?>
    </div>
    <div class="form__item <?= isset($errors['password']) ? 'form__item--invalid' : ''; ?>">
      <label for="password">Пароль*</label>
      <input id="password" type="password" name="user[password]" placeholder="Введите пароль" >
      <?php if (isset($errors['password'])): ?>
      <span class="form__error"><?=$errors['password'] ?></span>
      <?php endif; ?>
    </div>
    <div class="form__item <?= isset($errors['name']) ? 'form__item--invalid' : ''; ?>">
      <label for="name">Имя*</label>
      <input id="name" type="text" name="user[name]" value="<?= $user['name'] ?? ''; ?>" placeholder="Введите имя" >
      <?php if (isset($errors['name'])): ?>
      <span class="form__error"><?=$errors['name'] ?></span>
      <?php endif; ?>
    </div>
    <div class="form__item <?= isset($errors['contacts']) ? 'form__item--invalid' : ''; ?>">
      <label for="message">Контактные данные*</label>
      <textarea id="message" name="user[contacts]" placeholder="Напишите как с вами связаться" ><?= $user['contacts'] ?? ''; ?></textarea>
      <?php if (isset($errors['contacts'])): ?>
      <span class="form__error"><?=$errors['contacts'] ?></span>
      <?php endif; ?>
    </div>
    <div class="form__item form__item--file form__item--last">
      <label>Аватар</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="img/avatar.jpg" width="113" height="113" alt="Ваш аватар">
        </div>
      </div>
      <div class="form__input-file">
        <input class="visually-hidden" type="file" name="avatar" id="photo2" value="">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
    </div>
    <?php if (isset($errors)): ?>
    <span class="form__error form__error--bottom"><?=$errors['email'] ?></span>
    <?php endif; ?>
    <button type="submit" class="button">Зарегистрироваться</button>
    <a class="text-link" href="login.php">Уже есть аккаунт</a>
  </form>
</main>