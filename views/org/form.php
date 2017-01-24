<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
//use vova07\imperavi\Widget as Redactor;
use dosamigos\tinymce\TinyMce;

$this->title = 'Сведения о ДЭПах';

switch ($model->cat) {
	case 1:
		$section = 'Кадровый состав';
		break;
	case 2:
		$section = 'Совет директоров';
		break;
	case 3:
		$section = 'Экономические показатели';
		break;
	case 4:
		$section = 'Технические показатели';
		break;
	case 5:
		$section = 'Транспорт и техника';
		break;
	case 6:
		$section = 'Резюме руководителя';
		break;
	default:
		# code...
		break;
}
?>

    <div id="content_big">

        <?php $form = ActiveForm::begin([
        	'fieldConfig' => [
                'template' => "<h2>{label}</h2> {error}\n{input}",
                'labelOptions' => ['class' => ''],
            ],
        ]); ?>

            <?= $form->field($model, 'text')->widget(TinyMce::className(), [ 
            	'options' => ['rows' => 26],
            	'language' => 'ru',
		        'clientOptions' => [ 
		            'plugins' => [ 
		                "advlist autolink lists link charmap print preview anchor", 
		                "searchreplace visualblocks code fullscreen",
		                "insertdatetime media table contextmenu paste image",
		                //"responsivefilemanager filemanager",
		            ],
		            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fontselect | fontsizeselect", 
		            //| responsivefilemanager", 
		            //'external_filemanager_path' => '/web/plugins/responsivefilemanager/filemanager/',
		            //'filemanager_title' => 'Responsive Filemanager',
		            'external_plugins' => [
			            // Кнопка загрузки файла в диалоге вставки изображения.
			            //'filemanager' => '/web/plugins/responsivefilemanager/filemanager/plugin.min.js',
			            // Кнопка загрузки файла в тулбаре.
			            //'responsivefilemanager' => '/web/plugins/responsivefilemanager/tinymce/plugins/responsivefilemanager/plugin.min.js',
			        ],
		        ] 
		    ])->label($section." ".$model->user->fullname); ?>

		    <?= $form->field($model, 'dep_id')->hiddenInput()->label(''); ?>

		    <div class="form-group">
		        <?= Html::submitButton('Сохранить', ['class' => '']) ?>
		    </div>

        <?php ActiveForm::end(); ?>  

    </div>