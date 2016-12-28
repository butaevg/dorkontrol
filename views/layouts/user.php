<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\components\UsermenuWidget;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <base href="http://dk.ru/">
    <link href="css/user.css" rel="stylesheet" type="text/css"> 
    <script src="js/jquery-1.8.min.js"></script>
    <script type="text/javascript" src="js/fancybox/jquery.fancybox.js?v=2.1.4"></script>
    <link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox.css?v=2.1.4" media="screen" />
    <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
    <script type="text/javascript" src="js/user.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700,700italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<?= $this->render('flashes') ?>  
<div id="wrapper">

	<div id="menu">			
		<span><a href="user/"><img src="img/icons/home.png"></a></span>
		<?= UsermenuWidget::widget() ?>
		<span class="pr"><a href=user/logout>Выход</a></span>
		<span class="pr"><a href=/>На главную</a></span>
	</div>
	
	<div id="page">
		
		<?= $content ?>  

<!-- <div id="sidebar">...</div> -->

		<div style="clear: both;">&nbsp;</div>
	</div>

</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>