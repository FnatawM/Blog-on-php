<?php 
    $user = 'root';
    $password = 'root';
    $db = 'testing';
    $host = 'localhost';
    $dsn = 'mysql:host='.$host.';port=3307;dbname='.$db;
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>