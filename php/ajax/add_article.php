<?php
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
    $text = trim(filter_var($_POST['text'], FILTER_SANITIZE_STRING));

    $error = '';

    if (strlen($title) <= 3)
        $error = 'Введите название статьи';
    else if (strlen($intro) <= 15)
        $error = 'Введите интро для статьи';
    else if (strlen($text) <= 20)
        $error = 'Введите текст статьи';

    if ($error != ''){ 
        echo $error;
        exit();
    }

    // Подключение к БД
    require_once '../mysql_connect.php';
    
    try {
        // Сначала создаем подключение
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Затем выполняем запрос
        $sql = 'INSERT INTO articles(title, intro, text, date, avtor) VALUES(?,?,?,?,?)';
        $query = $pdo->prepare($sql);
        $query->execute([$title, $intro, $text, time(), $_COOKIE['login']]);
        
        echo 'Готово';
    } catch(PDOException $e) {
        die('Ошибка подключения к БД: ' . $e->getMessage());
    }
?>