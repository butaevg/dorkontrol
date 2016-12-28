<?php
/* @var $this yii\web\View */

$this->title = 'ПСД';
?>
    <div id="content_big">

        <h2>Мои проекты</h2><br><br>

        <table class="cp_table"><tr><th width="70%">Проект</th><th width="100">Стоимость, тыс.</th><th width="100">Получено, тыс.</th><th width="100">Выполнение, тыс.</th>
        <th width="100">Дата обновления</th></tr>

        <?php foreach ($objects as $obj) {
            echo "<tr>
                  <td><a href=psd/exec/".$obj->id.">".$obj->name."</a></td> 
                  <td>".$obj->price."</td>
                  <td>".$obj->getsum."</td>
                  <td>".$obj->exe."</td> 
                  <td>".Yii::$app->formatter->asDatetime($obj->updated_at, "php:d.m.Y")."</td>
                  </tr>";
        }
        ?>

        </table><br><br>

    </div>