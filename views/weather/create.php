<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Дорожные и погодные условия';
?>
    <div id="content_big">
        <h2>Сведения о дорожных и погодных условиях и проводимой работе на автодорогах за <?php echo date("d.m.Y");  ?></h2>

        <?php $form = ActiveForm::begin([
        	'fieldConfig' => [
	            'template' => "<h3><strong>{label}</strong>
	                           <span style='color: red;'>{error}</span>
	                           </h3>{input}",
	        ],
        ]); ?>

		    <?= $form->field($model, 'sost')->dropDownList([
			    'ясно' => 'ясно',
			    'пасмурно' => 'пасмурно',
			    'туман'=>'туман', 
			    'дождь'=>'дождь', 
			    'снег'=>'снег'
			], $options = ['style'=>'width:120px'])->label('Состояние') ?>

		    <?= $form->field($model, 'temp')->textInput([
		        'style'=>'width:100px', 
		        'maxlength'=>3, 
		        'value'=>$current->temp
		    ])->label('Температура'); ?>

		    <?= $form->field($model, 'pr_r')->dropDownList([
			    'покрытие дорог сухое' => 'покрытие дорог сухое',
			    'покрытие дорог мокрое' => 'покрытие дорог мокрое',
			    'снег'=>'снег', 
			    'снежный накат'=>'снежный накат', 
			    'снежный накат обраб. ПГМ'=>'снежный накат обраб. ПГМ',
			    'слаб. гололедица'=>'слаб. гололедица',
			    'гололед'=>'гололед',
			    'гололед обраб. ПГМ'=>'гололед обраб. ПГМ',
			    'подсыпаны ПГМ'=>'подсыпаны ПГМ'
			], $options = ['style'=>'width:250px'])->label('Проезжаемость на респ. дорогах'); ?>

		    <?= $form->field($model, 'pr_m')->dropDownList([
			    'покрытие дорог сухое' => 'покрытие дорог сухое',
			    'покрытие дорог мокрое' => 'покрытие дорог мокрое',
			    'снег'=>'снег', 
			    'снежный накат'=>'снежный накат', 
			    'снежный накат обраб. ПГМ'=>'снежный накат обраб. ПГМ',
			    'слаб. гололедица'=>'слаб. гололедица',
			    'гололед'=>'гололед',
			    'гололед обраб. ПГМ'=>'гололед обраб. ПГМ',
			    'подсыпаны ПГМ'=>'подсыпаны ПГМ'
			], $options = ['style'=>'width:250px'])->label('Проезжаемость на местных дорогах'); ?>

		    <?= $form->field($model, 'works')->textarea([
		    	'style'=>'width:500px',
		        'rows'=>8, 
		        'cols'=>60,
		        'value'=>$current->works
		    ])->label('Проводимые работы'); ?>

		    <div class="form-group">
		        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
		    </div>

		<?php ActiveForm::end(); ?>

		<br><br><font size=2 color=red>Все поля обязательны для заполнения<br>В поле 'температура' обязательно указать знак '+' или '-'</font><br><br>

	</div>
