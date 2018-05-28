<?php

require 'functions.php';

require 'data.php';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $is_auth = true;
} else {
    $user = [];
    $is_auth = false;
}
//HTML код главной страницы
$page_content = renderTemplate(
    'templates/index.php', 
    [
        'categories' => $categories,
        'lots_list' => $lots_list
    ]
);

//Окончательный HTML код 
$layout_content = renderTemplate(
    'templates/layout.php',
    [
        'categories' => $categories,
        'content' => $page_content,
        'title' => 'Главная',
        'user_name' => $user['name'] ?? '',
        'user_avatar' => $user['avatar'] ?? '',
        'is_auth' => $is_auth
    ]
);

//Выводит главную страницу
print($layout_content);
