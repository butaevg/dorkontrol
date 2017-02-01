<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

$this->title = 'Добавить страницу';
?>

    <div id="content_big">

        <?php $form = ActiveForm::begin([
        	'fieldConfig' => [
                'template' => "<h2>{label}</h2> {error}\n{input}",
                'labelOptions' => ['class' => ''],
            ],
        ]); ?>

            <?= $form->field($model, 'title')->textInput([
			        'style'=>'width:800px', 
			    ])->label('Заголовок'); ?>

		    <?= $form->field($model, 'slug')->textInput([
			        'style'=>'width:800px', 
			    ])->label('URL'); ?>
			    

            <?= $form->field($model, 'text')->widget(TinyMce::className(), [ 
            	'options' => ['rows' => 26],
            	'language' => 'ru',
		        'clientOptions' => [ 
		            'plugins' => [ 
		                "advlist autolink lists link charmap print preview anchor", 
		                "searchreplace visualblocks code fullscreen",
		                "insertdatetime media table contextmenu paste image",
		            ],
		            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fontselect | fontsizeselect", 
		        ] 
		    ])->label('Текст'); ?>

		    <div class="form-group">
		        <?= Html::submitButton('Сохранить', ['class' => '']) ?>
		    </div>

        <?php ActiveForm::end(); ?>  

    </div>