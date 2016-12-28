<?php
/* @var $this yii\web\View */

$this->title = 'Работающая техника';
?>
	<div id="content_big">
		<h2>
        <?php
        if ($working == 1) {
            echo "Работающая техника";
        } else {
            echo "Техника на списание";
        }
        ?>
        </h2>
        <?php 
        if (Yii::$app->user->identity->cat == 3) {
            echo "<h2><a href=machine/create/".$working.">Добавить технику</a></h2><br><br>";
        }
        ?>

        <table class="tablesorter" id="machine_table">
            <thead><tr>
                <th width="10%" style="display: none">Дата</th>
                <th width="10%">Дата</th>
                <th>Техника</th>
                <th width="8%">Год</th>
                <th width="15%">Фото</th>
                <th width="25%">ДЭП</th></tr>
            </thead>

        <?php foreach ($machines as $machine) {
            echo "<tr>
                  <td>".Yii::$app->formatter->asDatetime($machine->putdate, "php:d.m.Y")."</td>
                  <td style='display:none'>".$machine->putdate."</td>
                  <td>".$machine->name;
            if ($machine->dep_id == Yii::$app->user->identity->id) {
                echo "&nbsp;&nbsp;&nbsp;<a href=machine/delete/".$machine->id."><img src=img/icons/delete.png width=18 title=Удалить></a>";
            }

            echo "<br><i>".$machine->text."</i><br>
                  </td>
                  <td>".$machine->year_issue."</td>
                  <td>
                  <a class=fancybox data-fancybox-group=tech".$machine->id." href=upload/machines/".$machine->pic_1." title='".$machine->name."'>";

            echo Yii::$app->thumbnail->img("machines/".$machine->pic_1, [
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
                    'style' => 'margin: 7px 5px 7px 15px;'
                ]);

            echo "</a>";

            if ($machine->pic_2 !== '') {
                echo "<a class=fancybox data-fancybox-group=tech".$machine->id." href=upload/machines/".$machine->pic_2." title='".$machine->name."'>";

                echo Yii::$app->thumbnail->img("machines/".$machine->pic_2, [
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
                        'style' => 'display: none;'
                    ]);

                echo "</a>";
            }

            if ($machine->pic_3 !== '') {
                echo "<a class=fancybox data-fancybox-group=tech".$machine->id." href=upload/machines/".$machine->pic_3." title='".$machine->name."'>";

                echo Yii::$app->thumbnail->img("machines/".$machine->pic_3, [
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
                        'style' => 'display: none;'
                    ]);

                echo "</a>";
            }

            if ($machine->pic_4 !== '') {
                echo "<a class=fancybox data-fancybox-group=tech".$machine->id." href=upload/machines/".$machine->pic_4." title='".$machine->name."'>";

                echo Yii::$app->thumbnail->img("machines/".$machine->pic_4, [
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
                        'style' => 'display: none;'
                    ]);

                echo "</a>";
            }

            if ($machine->pic_5 !== '') {
                echo "<a class=fancybox data-fancybox-group=tech".$machine->id." href=upload/machines/".$machine->pic_5." title='".$machine->name."'>";

                echo Yii::$app->thumbnail->img("machines/".$machine->pic_5, [
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
                        'style' => 'display: none;'
                    ]);

                echo "</a>";
            }

            echo "</td>
                  <td>".$machine->user->name."</td>
                  </tr>";
        }
        ?>

        </table><br><br>

	</div>