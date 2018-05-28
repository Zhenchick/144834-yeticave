<?php

require 'functions.php';

require 'data.php';

$errors = [];

$user = [];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['user'];

    $email = mysqli_real_escape_string($connect, $user['email']);

    $exist_email_query = "
        SELECT 
            `id`
        FROM 
            `users`
        WHERE 
            `email` = '$email';
    ";

    $result_exist_email_query = mysqli_query($connect, $exist_email_query);

    if (mysqli_num_rows($result_exist_email_query) > 0) {
        $errors['email'] = 'Пользователь с этим email уже зарегистрирован';
    } else {
        $required = [
            'name', 
            'email', 
            'password',  
            'contacts'
        ];

        foreach ($required as $key) {
            if (empty($user[$key])) {

                   $errors[$key] = 'Это поле надо заполнить';
                
            }
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
            $errors['email'] = 'Введите кооректный e-mail';
        }

        $password = password_hash($user['password'], PASSWORD_DEFAULT);

        $user['avatar'] = null;

        if (!empty($_FILES['avatar']['name'])) {
            $tmp_name = $_FILES['avatar']['tmp_name'];
            $path = 'img/' . $_FILES['avatar']['name'];

            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $file_type = finfo_file($finfo, $tmp_name);
            if (strripos($file_type, 'image') !== 0) {
                $errors['avatar'] = 'Загрузите картинку в формате JPG';
            } else {
                move_uploaded_file($tmp_name, $path);
                $user['avatar'] = $path;
            }
        }

        $add_user_query = "
            INSERT INTO 
                `users` (
                    `name`, 
                    `email`, 
                    `password`, 
                    `date_of_regisration`, 
                    `contacts`, 
                    `avatar`
                ) 
            VALUES (?, ?, ?, NOW(), ?, ?)
        ";

        $stmt = db_get_prepare_stmt(
            $connect, 
            $add_user_query, 
            [
                $user['name'], 
                $user['email'], 
                $password, 
                $user['contacts'],
                $user['avatar']
            ]
        );
        if (!$stmt) {
            var_dump([
                $user['name'], 
                $user['email'], 
                $password, 
                $user['contacts'],
                $user['avatar']
            ]);
        }
        $result_add_user_query = mysqli_stmt_execute($stmt); 

        if ($result_add_user_query && empty($errors)) {
            header("Location: login.php");
            exit();
        }
    }
}

//HTML код страницы
$page_content = renderTemplate(
    'templates/sign-up.php', 
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
        'title' => 'Регистрация нового пользователя',
        'user_name' => $user_name,
        'user_avatar' => $user_avatar,
        'is_auth' => $is_auth
    ]
);

//Выводит страницу лотов
print($layout_content);