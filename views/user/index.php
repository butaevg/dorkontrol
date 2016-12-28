<?php
/* @var $this yii\web\View */
$this->title = 'Личный кабинет';
?>
    <div id="content_big">
        <h2><?= Yii::$app->user->identity->name; ?></h2>

        <p>
			Группа: <?= Yii::$app->user->identity->group->name; ?> 
        </p>

	</div>
