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
                 <?=renderTemplate('templates/lots.php', ['lot' => $lots_list]);?> 
            <?php endforeach; ?>   
        </ul>
</section>