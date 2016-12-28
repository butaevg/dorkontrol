<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'ПСД';
?>
    <div id="content_big">
        <h2>Ход разработки ПСД</h2>
        <strong><?= $object->name ?></strong><br><br><br>

        <span style="color: red;">Внимание!<br> В качестве десятичного разделителя писать "." (точка)!<br> После точки не более 3-х цифр!</span><br><br>

        <?php $form = ActiveForm::begin([
        	'fieldConfig' => [
	            'template' => "<h3><strong>{label}</strong>
	                           <span style='color: red;'>{error}</span>
	                           </h3>{input}",
	        ],
        ]); ?>

		    <?= $form->field($object, 'price')->textInput([
		        'size'=>'15', 
		    ])->label('Стоимость <i>(исправить при необходимости)</i>'); ?>

		    <?= $form->field($object, 'exe')->textInput([
		        'size'=>'15', 
		    ])->label('Выполнение из '.$object->price); ?>

		    <?= $form->field($object, 'getsum')->textInput([
		        'size'=>'15', 
		    ])->label('Полученно из '.$object->price); ?>

		    <?= $form->field($object, 'updated_at')->hiddenInput([
		    	'value' => date("Y-m-d H:i:s")
		    ])->label('');; ?>


		    <div class="form-group">
		        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
		    </div>

		<?php ActiveForm::end(); ?>

	</div>
