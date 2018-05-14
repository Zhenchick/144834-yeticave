<?php

require "functions.php";

require "data.php";

//HTML код главной страницы
$page_content = renderTemplate('templates/index.php', [
    'categories' => $categories,
    'lots_list' => $lots_list,
    'now' => $now,
    'tomorrow' => $tomorrow
]);

//Окончательный HTML код 
$layout_content = renderTemplate('templates/layout.php',[
    'categories' => $categories,
    'content' => $page_content,
    'title' => 'Главная',
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'is_auth' => $is_auth
    ]
);
//Выводит главную страницу
print($layout_content);
?>

