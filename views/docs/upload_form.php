<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Загрузка документа';
?>
    <div id="content_big">
        <h2>Загрузить документ</h2>

            <p>
                <?php $form = ActiveForm::begin([
                	'fieldConfig' => [
                        'template' => "{label} {error}\n{input}",
                        'labelOptions' => ['class' => ''],
                ],
                'options' => [
    		        'enctype' => 'multipart/form-data',
    		    ],
                ]); ?>

                    <?= $form->field($model, 'name')->textInput([
                        'style'=>'width:1000px', 
                    ])->label('Название'); ?>


                    <?= $form->field($model, 'url')->fileInput()->label('Документ'); ?>

    			    <div class="form-group">
    			        <?= Html::submitButton('Загрузить', ['class' => '']) ?>
    			    </div>

                <?php ActiveForm::end(); ?>  
            </p>

    </div>