<?php
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

    $error = '';

    if (strlen($username) <= 3)
        $error = 'Введите имя';
    else if (strlen($email) <= 3 || !filter_var($email, FILTER_VALIDATE_EMAIL))
        $error = 'Введите email';
    else if (strlen($login) <= 3)
        $error = 'Введите логин';
    else if (strlen($pass) <= 3)
        $error = 'Введите пароль';

    if ($error != ''){ 
        echo $error;
        exit();
    }
    // Хеширование пароля
    $hash = "qw2ertyuio234lkjhgfds";
    $pass = md5($pass . $hash);

    // Подключение к БД (ИСПРАВЛЕННАЯ СТРОКА)
    require_once '../mysql_connect.php';
    
    try {
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = 'INSERT INTO users(name, email, login, pass) VALUES(?,?,?,?)';
        $query = $pdo->prepare($sql);
        $query->execute([$username, $email, $login, $pass]);
        
    } catch(PDOException $e) {
        die('Ошибка подключения к БД: ' . $e->getMessage());
    }


    echo 'Готово';
?>