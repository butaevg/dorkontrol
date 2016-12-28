<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Добавить технику';
?>

    <div id="content_big">

        <h2>Добавить технику</h2><br>

        <?php $form = ActiveForm::begin([
        	'fieldConfig' => [
                'template' => "<h3><strong>{label}</strong>
                               <span style='color: red;'>{error}</span></h3>
                               {input}",
                'labelOptions' => ['class' => ''],
        ],
        'options' => [
	        'enctype' => 'multipart/form-data',
	    ],
        ]); ?>

            <?= $form->field($model, 'name')->textInput([
		        'size'=>'61', 
		    ])->label('Наименование техники'); ?>

		    <?= $form->field($model, 'text')->textarea([
		        'rows'=>5, 
		        'cols'=>60,
		    ])->label('Описание'); ?>

		    <?= $form->field($model, 'year_issue')->textInput([
		        'size'=>'11', 
		    ])->label('Год выпуска'); ?>

		    <?= $form->field($model, 'pic_1')->fileInput()->label('Фото 1'); ?>
		    <?= $form->field($model, 'pic_2')->fileInput()->label('Фото 2'); ?>
		    <?= $form->field($model, 'pic_3')->fileInput()->label('Фото 3'); ?>
		    <?= $form->field($model, 'pic_4')->fileInput()->label('Фото 4'); ?>
		    <?= $form->field($model, 'pic_5')->fileInput()->label('Фото 5'); ?>

		    <?= $form->field($model, 'putdate')->hiddenInput([
		    	'value' => date("Y-m-d H:i:s")
		    ])->label('');; ?>

		    <?= $form->field($model, 'dep_id')->hiddenInput([
		    	'value' => Yii::$app->user->identity->id
		    ])->label('');; ?>

		    <div class="form-group">
		        <?= Html::submitButton('Сохранить', ['class' => '']) ?>
		    </div>

        <?php ActiveForm::end(); ?>  

    </div>