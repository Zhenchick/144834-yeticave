<?php

require "functions.php";

require "data.php";

//HTML код главной страницы
$page_content = renderTemplate('templates/index.php', [
    'categories' => $categories,
    'lot' => $lots_list
]);

//Окончательный HTML код 
$layout_content = renderTemplate('templates/layout.php',[
    'categories' => $categories,
    'content' => $page_content,
     'title' => 'Главная'
    ]
);

print($layout_content);
?>

