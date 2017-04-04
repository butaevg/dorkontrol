<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use app\models\User;

$this->title = 'Добавить отчет';
?>

    <div id="content_big">

        <?php $form = ActiveForm::begin([
        	'fieldConfig' => [
                'template' => "<h2>{label}</h2> {error}\n{input}",
                'labelOptions' => ['class' => ''],
            ],
        ]); 

        ?>

            <?= $form->field($model, 'name')->textInput([
			        'style'=>'width:400px', 
			    ])->label('Название'); ?>

		    <div class="form-group">
		        <?= Html::submitButton('Сохранить', ['class' => '']) ?>
		    </div>

        <?php ActiveForm::end(); ?>  

    </div>