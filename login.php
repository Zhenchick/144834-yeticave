<?php

require 'functions.php';

require 'data.php';

$page_content = renderTemplate(
    'templates/login.php', 
    [
        'categories' => $categories
    ]
);

//Окончательный HTML код 
$layout_content = renderTemplate(
    'templates/layout.php',
    [
        'categories' => $categories,
        'content' => $page_content,
        'title' => 'Регистрация нового пользователя',
        'user_name' => $user_name,
        'user_avatar' => $user_avatar,
        'is_auth' => $is_auth
    ]
);

//Выводит страницу лотов
print($layout_content);