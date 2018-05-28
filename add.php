<?php
require 'functions.php';

require 'data.php';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $is_auth = true;
} else {
    header("HTTP/1.1 403 Forbidden");
    exit();
    //http_response_code(403);
}

$errors = [];

$lot = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST['lot'];

    $required = [
        'name', 
        'description', 
        'start_price', 
        'date_of_end', 
        'step_of_bet', 
        'category_id'
    ];

    foreach ($required as $key) {
        if (empty($lot[$key])) {
            $errors[$key] = 'Это поле надо заполнить';
        }
    }

    if (isset($_FILES['img']['name'])) {
        $tmp_name = $_FILES['img']['tmp_name'];
        $path = 'img/' . $_FILES['img']['name'];

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $tmp_name);
        if (strripos($file_type, 'image') !== 0) {
            $errors['img'] = 'Загрузите картинку в формате JPG';
        } else {
            move_uploaded_file($tmp_name, $path);
            $lot['img'] = $path;
        }
    } else {
        $errors['img'] = 'Вы не загрузили файл';
    }

    $add_lot_query = "
        INSERT INTO 
            `lots` (
                `date_of_create`, 
                `name`, 
                `description`, 
                `start_price`, 
                `date_of_end`, 
                `step_of_bet`, 
                `user_id`, 
                `category_id`, 
                `img`
            ) 
        VALUES (NOW(), ?, ?, ?, ?, ?, 1, ?, ?)
    ";

    $stmt = db_get_prepare_stmt(
        $connect, 
        $add_lot_query, 
        [
            $lot['name'], 
            $lot['description'], 
            $lot['start_price'], 
            $lot['date_of_end'], 
            $lot['step_of_bet'], 
            $lot['category_id'], 
            $lot['img']
        ]
    );
    
    $result_add_lot_query = mysqli_stmt_execute($stmt); 
    if ($result_add_lot_query) {
        $lot_id = mysqli_insert_id($connect);
        header("Location: lot.php?lot_id=" . $lot_id);
    }
}

//HTML код страницы
$page_content = renderTemplate(
    'templates/add_lot.php', 
    [
        'categories' => $categories,
        'errors' => $errors,
        'lot' => $lot
    ]
);

//Окончательный HTML код 
$layout_content = renderTemplate(
    'templates/layout.php',
    [
        'categories' => $categories,
        'content' => $page_content,
        'title' => 'Добавление лота на аукцион',
        'user_name' => $user['name'] ?? '',
        'user_avatar' => $user['avatar'] ?? '',
        'is_auth' => $is_auth
    ]
);

//Выводит страницу лотов
print($layout_content);