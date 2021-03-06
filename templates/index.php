<section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
             <!-- Выводит верхнее меню -->
            <?php foreach ($categories as $category):  ?>
                <li class="promo__item promo__item--<?=$category['code']; ?>">
                    <a class="promo__link" href="all-lots.html">
                        <?=$category['title']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
            <!-- Выводит лоты аукциона -->
            <?php foreach ($lots_list as $lot):  ?>
                 <li class="lots__item lot">
                    <div class="lot__image">
                        <img src="<?=$lot['img'] ?>" width="350" height="260" alt="<?=$lot['name'] ?>">
                    </div>
                    <div class="lot__info">
                        <span class="lot__category"><?=$lot['title'] ?></span>
                        <h3 class="lot__title">
                            <a class="text-link" href="lot.php?lot_id=<?=$lot['id'] ?>">
                                <?=$lot['name'] ?>                                
                            </a>
                        </h3>
                        <div class="lot__state">
                            <div class="lot__rate">
                              <span class="lot__amount">Стартовая цена</span>
                              <span class="lot__cost">
                                <?=formatPrice($lot['start_price']) ?>
                              </span>
                            </div>
                        <div class="lot__timer timer">
                            <?=timeDiff(null, $lot['date_of_end'])?>
                        </div>
                      </div>
                    </div>
                 </li> 
            <?php endforeach; ?>   
        </ul>
</section>