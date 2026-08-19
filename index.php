<?php
declare(strict_types = 1);

include ('vendor/autoload.php');
//$link = parse_url($_SERVER('REQUEST_URL'));
$accData = [
    'accName' => '',
    'mail' => 'Doctor_try@mail.ru',
    'password' => '2649741655',
    'dateReg' => '',
    'ip' => '127.0.0.1',
    'access' => 1,
    'isAuth' => 1
    ];
$linkHtml = '';
try{
    $t = new Template();
    $t->addTplFile(Route::getPathCore()."TPL/link.tpl");
    $t->assignArray(['linc' => '/', 'titleLinc' => 'Главная']);
    $linkHtml = $t->render();
}catch(FileException $FEXC) {
    echo $FEXC->getMessage();
}
?>
<!DOCTYPE html >
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="/style/style.css">
        <title>Главная - mainProg</title>
    </head>
<body class="site">
    <div id="layout">
        <div id='grid-container'>
            <div class="card header-card"><?= $linkHtml ?></div>
            <div class="card nav-card">Навигация</div>
            <div class="card sidebar-card">Боковая панель</div>
            <div class="card content-card">
                <div id = "regTable">
                    
                </div>
            <!-- Таблица новостей -->
            <div class="news">
                <h3 class="news-title">Последние новости</h3>
                <table class="newsTable">
            <tbody>
                <tr>
                <th>id</th>
                <th>title</th>
                <th>autor</th>
                </tr>
                <tr class="table-content">
                <td colspan="3">content</td>
                </tr>
                <tr>
                <td>date</td>
                <td></td>
                <td>link</td>
                </tr>
            </tbody>
                </table>
            </div>
            <!-- Таблица новостей ЭНД -->

            </div>
            <div class="card footer-card">Подвал</div>
        </div>
    </div>
</body>
</html>
