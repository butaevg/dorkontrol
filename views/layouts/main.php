<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <base href="http://dk.ru/"> 
    <link href='http://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700,700italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<div id="container">
    <div id="lenta">
        <div class="ct">
            e-mail: dorkontrol@e-dag.ru | тел./факс: (8722) 51-76-19 
        </div>
        <div class="soc_icons">

        </div>
    </div>

    <div id="header">
        <a href="/"><div id="header_1"></div></a>
        <div id="header_2">
            <img src="css/head2.png" style="margin-top: 5px;">
        </div>
    </div>

    <div id="topbar">
        <div class="sample" style="z-index:8">
            <ul class="menu_hor">
                <li><a href="/">ГЛАВНАЯ</a></li>
                <li><a>УЧРЕЖДЕНИЕ</a>
                    <ul>    
                        <li><a href="page/ob-uchrezhdenii">Об Учреждении</a></li>
                        <li><a href="page/rukovodstvo">Руководство</a></li>
                        <li><a href="page/struktura-uchrezhdeniya">Структура</a></li>
                        <li><a href="page/kontakty">Контакты</a></li>
                    </ul>
                </li>
                <li><a>ДЕЯТЕЛЬНОСТЬ</a>
                    <ul>
                        <li><a href="road/">Важнейшие объекты</a></li>
                        <li><a href="road/progress/124">Ход работ на важнейших объектах</a></li>
                    </ul>
                </li>
                <li><a href="docs/">ДОКУМЕНТЫ</a></li>
                <li><a>ДОРОЖНОЕ ХОЗЯЙСТВО</a>
                    <ul>
                        <li><a href="page/set-avtomobilnyh-dorog-rd">Сеть автомобильных дорог РД</a></li>
                        <li><a href="page/struktura-obsluzhivaemoj-seti-dorog">Структура обслуживаемой сети дорог</a></li>                     
                        <li><a href="map/">Информационные карты районов</a></li>
                        <li><a href="page/svedeniya-po-bdd">Безопасность дорожного движения</a></li>
                        <li><a href="page/dep">Дорожно-эксплуатационные предприятия</a></li>
                        <li><a href="page/contractors">Внешние подрядчики</a></li>
                    </ul>
                </li>
                <li><a>МОНИТОРИНГ</a>
                    <ul>                        
                        <li><a href="weather/">Дорожные и погодные условия</a></li>
                        <li><a href="camera/ip/">Видеомониторинг</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div id="content">

        <?= $content ?>

    </div>

    <div id="extra"></div>
    
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
