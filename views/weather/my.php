<?php
/* @var $this yii\web\View */
use yii\widgets\LinkPager;

$this->title = 'Дорожные и погодные условия';
?>
    <div id="content_big">
        <h2>Сведения о дорожных и погодных условиях и проводимой работе на автодорогах</h2>
        <h2><a href="weather/create/">Добавить отчет</a></h2><br><br>
            
        <?php
        foreach ($reports as $row) {
			echo "<br><br><fieldset><legend><b>".Yii::$app->formatter->asDatetime($row->putdate, "php:d.m.Y, H:i")."</b></legend>	
			<b>Состояние погоды: </b>".$row->sost."<br>
			<b>Температура: </b>".$row->temp."<br>
			<b>Проезжаемость на дорогах респ. значения: </b>".$row->pr_r."<br>
			<b>Проезжаемость на дорогах мест. значения: </b>".$row->pr_m."<br><br>
			<b>Проводимые работы: </b><br>".$row->works."</p>
			</fieldset><br>";
		}

		echo LinkPager::widget([
		    'pagination' => $pages,
		]); 
		?>


	</div>


