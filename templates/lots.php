<li class="lots__item lot">
    <div class="lot__image">
        <img src="<?=$lot['img'] ?>" width="350" height="260" alt="<?=$lot['name'] ?>">
    </div>
    <div class="lot__info">
        <span class="lot__category"><?=$lot['category'] ?></span>
        <h3 class="lot__title"><a class="text-link" href="lot.html"><?=$lot['name'] ?></a></h3>
        <div class="lot__state">
            <div class="lot__rate">
              <span class="lot__amount">Стартовая цена</span>
              <span class="lot__cost">
                <!-- Форматирует начальную цену, добавляет знак рубля -->
                <?=formatPrice($lot['price']) ?>
              </span>
            </div>
        <div class="lot__timer timer">
          <?=timeDiff(null, $lot['date_of_end'])?>
        </div>
      </div>
    </div>
 </li>
 