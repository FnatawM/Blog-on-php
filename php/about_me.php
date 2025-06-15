<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
    $website_title = 'Обо мне';
    require 'blocks/head.php';
    ?>
</head>

<body>
    <?php require 'blocks/header.php'; ?>
    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
                <h2>Выполнил: Шуваев Михаил. ЮФУ Прикладная информатика </h2>
                <h3>Блог был сделан по курсу itproger</h3>
                <p>В блог внес свои доработки:</p>
                
            </div>
            <?php require 'blocks/aside.php'; ?>
        </div>
    </main>
    <?php require 'blocks/footer.php'; ?>
</body>

</html>