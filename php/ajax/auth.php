<?php
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

    $error = '';
    if (strlen($login) <= 3)
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
        
        $sql = 'SELECT id FROM users WHERE login = :login AND pass = :pass';
        $query = $pdo->prepare($sql);
        $query->execute(['login' => $login, 'pass' => $pass]);
        
        $user = $query->fetch(PDO::FETCH_OBJ);
        if(!$user){
            echo 'Такого пользователя не существует';
            exit();
        }else{
            setcookie('login', $login, time() + 3600 * 24 * 30, "/");
            echo 'Готово';
        }




    } catch(PDOException $e) {
        die('Ошибка подключения к БД: ' . $e->getMessage());
    }


    
?>