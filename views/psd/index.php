<?php
/* @var $this yii\web\View */

$this->title = 'ПСД';
?>
    <div id="content_big">

        <div class=chart>

        <?php foreach ($contractors as $contractor) {

        	echo "<h2>".$contractor->name."</h2>";

        	echo "<table class=cp_table>";

        	foreach ($contractor->psd as $obj) {
        		echo "<tr>
        		      <td rowspan=2 width=400><strong>".$obj->name."</strong><br>Стоимость: ".$obj->price." тыс. руб.</td>
        		      <td style='border-width: 0'>Выполнение: <strong>".$obj->exe." тыс. руб. (".$obj->exe_perc." %)</strong>&nbsp;&nbsp;&nbsp;&nbsp;</td>
        		      <td style='border-width: 0'>Оплата: <strong>".$obj->getsum." тыс. руб. (".$obj->exe_getsum." %)</strong></td>
        		      </tr>
        		      <tr>
        		      <td colspan=2>
        		      <div class=pipe><div style='width: ".$obj->exe_perc."%'></div></div>
        		      <div class=pipe2><div style='width: ".$obj->exe_getsum."%'></div></div>
        		      </td>
        		      <td><i>Обновлено<br> ".Yii::$app->formatter->asDatetime($obj->updated_at, "php:d.m.Y")."</i></td>
        		      </tr>";
        	}

        	echo "</table><br><br>";

        }
        ?>

        </div>

    </div>
