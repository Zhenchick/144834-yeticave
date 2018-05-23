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
  <section class="lot-item container">
    <h2><?=$lot['name'] ?></h2>
    <div class="lot-item__content">
      <div class="lot-item__left">
        <div class="lot-item__image">
          <img src="<?=$lot['img'] ?>" width="730" height="548" alt="<?=$lot['name'] ?>">
        </div>
        <p class="lot-item__category">Категория: <span><?=$lot['title'] ?></span></p>
        <p class="lot-item__description"><?=$lot['description'] ?></p>
      </div>
      <div class="lot-item__right">
        <div class="lot-item__state">
          <div class="lot-item__timer timer">
            <?=timeDiff(null, $lot['date_of_end'])?>
          </div>
          <div class="lot-item__cost-state">
            <div class="lot-item__rate">
              <span class="lot-item__amount">Текущая цена</span>
              <span class="lot-item__cost"><?=formatPrice(currentPrice($lot, $bets)) ?></span>
            </div>
            <div class="lot-item__min-cost">
              Мин. ставка <span><?=formatPrice(getMinBet($lot, $bets)) ?></span>
            </div>
          </div>
          <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post">
            <p class="lot-item__form-item">
              <label for="cost">Ваша ставка</label>
              <input id="cost" type="number" name="cost" placeholder="<?=getMinBet($lot, $bets) ?>">
            </p>
            <button type="submit" class="button">Сделать ставку</button>
          </form>
        </div>
        <div class="history">
          <h3>История ставок (<span><?=count($bets) ?></span>)</h3>
          <table class="history__list">
            <?php foreach ($bets as $bet):  ?>
            <tr class="history__item">
              <td class="history__name"><?=$bet['name'] ?></td>
              <td class="history__price"><?=formatPrice($bet['price']) ?></td>
              <td class="history__time"><?=$bet['date_of_placement'] ?></td>
            </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </section>
</main>