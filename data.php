<?php
// Подключение к базе данных
$connect = mysqli_connect('localhost', 'root', '', 'yeticave-144834');
if ($connect == false) {
    print('Ooooops, ошибка подключения к базе данных: ' . mysqli_connect_error());
} else {
    mysqli_set_charset($connect, 'utf8');
    // Формируем SQL запрос на вывод названия категорий
    $categories_sql_query = 'SELECT `title`, `code` FROM `category`';
    $result_categories_sql_query = mysqli_query($connect, $categories_sql_query);
    // Массив категорий
    $categories = mysqli_fetch_all($result_categories_sql_query, MYSQLI_ASSOC);
    // Формируем SQL запрос на вывод данных лотов
    $lots_list_sql_query = 'SELECT `name`, `start_price`, `img`, `category`.`title` FROM `category` JOIN `lots` ON `category`.`id` = `lots`.`category_id`';
    $result_lots_list_sql_query = mysqli_query($connect, $lots_list_sql_query);
    // Массив лотов
    $lots_list = mysqli_fetch_all($result_lots_list_sql_query, MYSQLI_ASSOC);
}

date_default_timezone_set('Europe/Moscow');
$is_auth = (bool) rand(0, 1);
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];
