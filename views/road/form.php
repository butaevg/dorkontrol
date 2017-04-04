<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use app\models\User;

$this->title = 'Добавить объект';
?>

    <div id="content_big">

        <?php $form = ActiveForm::begin([
        	'fieldConfig' => [
                'template' => "<h2>{label}</h2> {error}\n{input}",
                'labelOptions' => ['class' => ''],
            ],
        ]); 

        $contractors = User::find()->where(['cat' => 4])->all();   
        $items = ArrayHelper::map($contractors,'id','fullname');
        $params = [
	        'prompt' => 'Подрядчик'
	    ];

        ?>

            <?= $form->field($model, 'name')->textInput([
			        'style'=>'width:800px', 
			    ])->label('Название'); ?>

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
		    ])->label('Справка'); ?>

		    <?= $form->field($model, 'type')->dropDownList([
			        'str' => 'Строительство',
				    'rec' => 'Реконструкция',
				    'rem'=>'Капремонт' 
			    ])->label('Тип'); ?>

			<?= $form->field($model, 'onsite')->checkbox([
			    ])->label('Отображать на сайте'); ?>     

			<?= $form->field($model, 'complete')->checkbox([
			    ])->label('Завершен'); ?> 

			<?= $form->field($model, 'contractor_id')->dropDownList($items)->label('Подрядчик'); ?>


		    <div class="form-group">
		        <?= Html::submitButton('Сохранить', ['class' => '']) ?>
		    </div>

        <?php ActiveForm::end(); ?>  

    </div>