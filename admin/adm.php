<?php
declare(strict_types = 1);
include("../vendor/autoload.php");
?>

<!DOCTYPE html >
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="/admin/admStyle.css">
        <meta http-equiv="Cache-Control" content="no-store">
    </head>
<body class="admin">
    <div id="layout">
        <div id="header">
            <p class="logo">Административная панель</p>
        </div>

        <div id="nav">
            <a href="">Главная</a>
            <a href="">Пользователи</a>
            <a href="">Настройки</a>
        </div>

        <div id="aside">
            <nav class="user-menu">
                <h4>Пользователи</h4>
                <ul>
                    <li><a href="">Добавить</a></li>
                    <li><a href="">Удалить</a></li>
                    <li><a href="">Найти</a></li>
                    <li><a href="">Изменить</a></li>
                </ul>

                <h4>Настройки сайта</h4>
                <ul>
                    <li><a href="">База данных</a></li>
                </ul>
            </nav>
        </div>

        <div id="main">
            <h3>Контент</h3>
        </div>

        <div class="footer">
            <p>&copy; vampqwe/inventory</p>
        </div>
    </div>
</body>
</html>
