<?php
// Подключение к базе данных
$connect = mysqli_connect('localhost', 'root', '', 'yeticave-144834');
// Формируем SQL запрос на вывод названия категорий
$categories_sql_query = 'SELECT `title` FROM `category`';
$result_categories_sql_query = mysqli_query($connect, $categories_sql_query);
// Массив категорий
$categories = mysqli_fetch_all($result_categories_sql_query, MYSQLI_ASSOC);

// Формируем SQL запрос на вывод данных лотов
$lots_list_sql_query = 'SELECT `name`, `start_price`, `img`, `category`.`title` FROM `category` JOIN `lots` ON `category`.`id` = `lots`.`category_id`';
$result_lots_list_sql_query = mysqli_query($connect, $lots_list_sql_query);
// Массив лотов
$lots_list = mysqli_fetch_all($result_lots_list_sql_query, MYSQLI_ASSOC);

date_default_timezone_set('Europe/Moscow');
$is_auth = (bool) rand(0, 1);
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

// Массив лотов
/*$lots_list = [
    'lot_1' => [
        'name' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'price' => '10999',
        'img' => 'img/lot-1.jpg'

    ],
    'lot_2' => [
        'name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'price' => '159999',
        'img' => 'img/lot-2.jpg'

    ],
    'lot_3' => [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'price' => '8000',
        'img' => 'img/lot-3.jpg'

    ],
    'lot_4' => [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'price' => '10999',
        'img' => 'img/lot-4.jpg'

    ],
    'lot_5' => [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'price' => '7500',
        'img' => 'img/lot-5.jpg'

    ],
    'lot_6' => [
        'name' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'price' => '5400',
        'img' => 'img/lot-6.jpg'

    ]

];*/

// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];
