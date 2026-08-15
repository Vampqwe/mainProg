<?php
declare(strict_types = 1);
include("../vendor/autoload.php");
?>

<!DOCTYPE html >
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="admStyle.css">
        <meta http-equiv="Cache-Control" content="no-store">
    </head>
<body>
<div id = "header">
    <p class = "logo">Административная панель</p>
</div>
    <div class = "content">
    <?php
    $ums = new UMS();
    $ums->update();
    
    var_dump($_SESSION);
    ?>

        <div id='grid-container'>
            <div>
                
            </div>
            <div>
            <nav class="user-menu">
                    <h4>Пользователи</h4>
                    <ul>
                        <li><a href=""></a>Добавить</li>
                        <li><a href=""></a>Удалить</li>
                        <li><a href=""></a>Найти</li>
                        <li><a href=""></a>Изменить</li>
                    </ul>

                    <h4>Настройки сайта</h4>
                    <ul>
                        <li><a href=""></a>База данных</li>
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                    </ul>

                </nav>
            </div>
            <div>3</div>
            <div>4</div>
            <div>5</div>
        </div>
    </div>
<div class = "footer"></div>
</body>
</html>