<?php

require 'functions.php';

require 'data.php';

$errors = [];

$user = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['user'];

    $required = [ 
            'email', 
            'password' 
        ];

    foreach ($required as $key) {
            if (empty($user[$key])) {

                   $errors[$key] = 'Это поле надо заполнить';
                
            }
        }

    if (filter_var($user['email'], FILTER_VALIDATE_EMAIL) === FALSE) {
            $errors['email'] = 'Введите кооректный e-mail';
        }

    $exist_user = getUserByEmail($connect, $user['email']);
    
    $password = $user['password'];
    if (!count($errors) and $exist_user) {
        if (password_verify($password, $exist_user['password'])) {
            $_SESSION['user'] = $exist_user;
        } else {
            $errors['password'] = 'Неверный пароль';
        }
    }   else {
        $errors['email'] = 'Такой пользователь не найден';
    }

    if (empty($errors))  {
        $_SESSION['user'] = $exist_user;
        header("Location: /index.php");
        exit();
    }

}

$page_content = renderTemplate(
    'templates/login.php', 
    [
        'categories' => $categories,
        'errors' => $errors,
        'user' => $user
    ]
);

//Окончательный HTML код 
$layout_content = renderTemplate(
    'templates/layout.php',
    [
        'categories' => $categories,
        'content' => $page_content,
        'title' => 'Вход на сайт',
        'user_name' => $user_name,
        'user_avatar' => $user_avatar,
        'is_auth' => $is_auth
    ]
);

//Выводит страницу лотов
print($layout_content);