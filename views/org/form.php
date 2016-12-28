<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget as Redactor;

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

            <?= $form->field($model, 'text')->widget(Redactor::className(), [ 
		        'settings' => [ 
		            'lang' => 'ru', 
		            'minHeight' => 400, 
		            'plugins' => [ 
		                'clips', 
		                'fullscreen',
		                'table',
		                'fontsize'
		            ] 
		        ] 
		    ])->label($section." ".$model->user->fullname); ?>

		    <?= $form->field($model, 'dep_id')->hiddenInput()->label(''); ?>

		    <div class="form-group">
		        <?= Html::submitButton('Сохранить', ['class' => '']) ?>
		    </div>

        <?php ActiveForm::end(); ?>  

    </div>