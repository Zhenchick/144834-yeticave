<?php

require 'functions.php';

require 'data.php';
if (isset($_GET['lot_id'])) {
    $lot_id = intval($_GET['lot_id']);
} else {
    $lot_id = 0;
}

//HTML код страницы
$lot = getLotById($connect, $lot_id);
if (empty($lot)) {
    http_response_code("404");
    die();
}

$page_content = renderTemplate(
    'templates/lot.php', 
    [
        'categories' => $categories,
        'lot' => $lot,
        'bets' => getBetsByLotId($connect, $lot_id)
    ]
);

//Окончательный HTML код 
$layout_content = renderTemplate(
    'templates/layout.php',
    [
        'categories' => $categories,
        'content' => $page_content,
        'title' => $lot['name'],
        'user_name' => $user_name,
        'user_avatar' => $user_avatar,
        'is_auth' => $is_auth
    ]
);

//Выводит страницу лотов
print($layout_content);