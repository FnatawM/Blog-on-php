<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0"> 
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none"> 
                <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg> 
            </a> 
        </div>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/PHP/index.php" class="nav-link px-2 link-secondary">Блог</a></li>
            <li><a href="/PHP/about_me.php" class="nav-link px-2 link-secondary">Обо мне</a></li>
            <?php if(isset($_COOKIE['login']) && $_COOKIE['login'] != ''): ?>
                <li><a href="/PHP/article.php" class="nav-link px-2 link-secondary">Добавить статью</a></li>
            <?php endif; ?>
        </ul>
        <?php if(!isset($_COOKIE['login']) || $_COOKIE['login'] == ''): ?>
            <div>
                <a type="button" class="btn btn-outline-primary me-2 mb-2" href="/PHP/auth.php">Вход</a> 
                <a class="btn btn-primary mb-2" href="/PHP/reg.php">Регистрация</a>
            </div>
        <?php else: ?>
            <div>
                <a type="button" class="btn btn-outline-primary me-2 mb-2" href="/PHP/auth.php">Кабинет пользователя</a>
            </div>
        <?php endif; ?>
    </header>
</div>