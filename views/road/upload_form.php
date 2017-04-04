<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Фотографии';
?>
    <div id="content_big">
        <h2>Загрузить фото</h2>

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


                    <?= $form->field($model, 'url')->fileInput()->label('Фото'); ?>

    			    <div class="form-group">
    			        <?= Html::submitButton('Загрузить', ['class' => '']) ?>
    			    </div>

                <?php ActiveForm::end(); ?>  
            </p>

            <?php foreach ($images as $img) {
                echo "<a href=upload/roads/".$img->url." class=fancybox data-fancybox-group=gallery>";

                echo Yii::$app->thumbnail->img("upload/roads/".$img->url, [
                        'thumbnail' => [
                            'width' => 150,
                            'height' => 100,
                        ],
                        'placeholder' => [
                            'width' => 150,
                            'height' => 100
                        ]
                    ], 
                    [ 
                        'vspace' => 3, 
                        'style' => 'padding-right: 20px;'
                    ]);
                    
                    echo "</a>";
            }
            ?>

    </div>