<?php 
echo "<pre>";
var_dump($errors);
echo "</pre>";
?>
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
  <form class="form form--add-lot container <?= empty($errors) ? '' : 'form--invalid'; ?>" action="add.php" enctype="multipart/form-data" method="post"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two"> 
      <div class="form__item  <?= isset($errors['name']) ? 'form__item--invalid' : ''; ?>"> <!-- form__item--invalid -->
        <label for="lot-name">Наименование</label>
        <input id="lot-name" type="text" name="lot[name]" value="<?= $lot['name'] ?? ''; ?>" placeholder="Введите наименование лота" >
        <?php if (isset($errors['name'])): ?>
        <span class="form__error"><?=$errors['name'] ?></span>
        <?php endif; ?>
      </div>
      <div class="form__item">
        <label for="category">Категория</label>
        <select id="category" name="lot[category_id]" >
          <option>Выберите категорию</option>
          <?php foreach ($categories as $category):  ?>
          <option value="<?=$category['id']; ?>" <?= $category['id'] == $lot['category_id'] ? 'selected' : ''; ?>><?=$category['title']; ?></option>
          <?php endforeach; ?>
        </select>
        <?php if (isset($errors['category_id'])): ?>
        <span class="form__error"><?=$errors['category_id'] ?></span>
        <?php endif; ?>
      </div>
    </div>
    <div class="form__item form__item--wide">
      <label for="message">Описание</label>
      <textarea id="message" name="lot[description]" placeholder="Напишите описание лота" ><?= $lot['description'] ?? ''; ?></textarea>
      <?php if (isset($errors['description'])): ?>
      <span class="form__error"><?=$errors['description'] ?></span>
      <?php endif; ?>
    </div>
    <div class="form__item <?= isset($errors['img']) ? 'form__item--uploaded' : ''; ?>"><!-- form__item--uploaded -->
            <label>Изображение</label>
            <div class="form__input-file">
                <input class="" type="file" id="photo2" name="img" value="">
            </div>
     </div>

    <div class="form__container-three">
      <div class="form__item form__item--small">
        <label for="lot-rate">Начальная цена</label>
        <input id="lot-rate" type="number" name="lot[start_price]" placeholder="0" value="<?= $lot['start_price'] ?? ''; ?>">
        <?php if (isset($errors['start_price'])): ?>
        <span class="form__error"><?=$errors['start_price'] ?></span>
        <?php endif; ?>
      </div>
      <div class="form__item form__item--small">
        <label for="lot-step">Шаг ставки</label>
        <input id="lot-step" type="number" name="lot[step_of_bet]" placeholder="0" value="<?= $lot['step_of_bet'] ?? ''; ?>">
        <?php if (isset($errors['step_of_bet'])): ?>
        <span class="form__error"><?=$errors['step_of_bet'] ?></span>
        <?php endif; ?>
      </div>
      <div class="form__item">
        <label for="lot-date">Дата окончания торгов</label>
        <input class="form__input-date" id="lot-date" type="date" name="lot[date_of_end]" value="<?= $lot['date_of_end'] ?? ''; ?>">
        <?php if (isset($errors['date_of_end'])): ?>
        <span class="form__error"><?=$errors['date_of_end'] ?></span>
        <?php endif; ?>
      </div>
    </div>
    <?php if (isset($errors)): ?>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <?php endif; ?>
    <button type="submit" class="button">Добавить лот</button>
  </form>
</main>