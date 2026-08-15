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
        <link rel="stylesheet" href="style/style.css">
    </head>
<body>
    <div id="layout">
        <div id='grid-container'>
            <div><?= $linkHtml ?></div>
            <div>2</div>
            <div>3</div>
            <div>
                <div id = "regTable">
                    
                </div>
            <!-- Таблица новостей -->
            <div class="news">
                <table class="newsTable">
	            <tbody>
		        <tr>
			        <td>id</td>
			        <td>title</td>
			        <td>autor</td>
		        </tr>
		        <tr>
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
            <div>5</div>
            <div>6</div>
        </div>
    </div>
</body>
</html>