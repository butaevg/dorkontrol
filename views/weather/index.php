<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Дорожные и погодные условия';
?>
    <div id="page">
        <h3></h3>

        <p>

        <table border="0" width="1000" align="center">
			<tr>
			<td align=center><b>Сводка о погодных условиях по районам РД и состоянии дорожной сети ГКУ "Дагдорконтроль"</b></td>
			<td align=center rowspan=2><!-- $orders --></td>
			</tr>
			<tr>
			<td align=center><br>
			<?php $form = ActiveForm::begin(); ?>
			    Дата: <input type="text" 
			           name="date" 
			           value="<?php echo date("d.m.Y");  ?>"
			           class="datepicker">
			    <?= Html::submitButton('Показать') ?>
			<?php ActiveForm::end(); 

			if ($today !== '') echo $today;
			?>
			</td>
			</tr>
		</table><br>

		<table id="pogoda_table" align="center" class="tablesorter">
			<thead><tr><th width=16% align=left>Район</th>
				<th width=10% style='display:none'>Дата и время сводки</th>
				<th width=10%>Дата</th>
				<th width=7% style='display:none'>Погода</th>
				<th width=7%>Погода</th>
				<th width=5%>С&deg;</th>
				<th width=6%>Республ. дороги</th>
				<th width=6%>Местные дороги</th>
				<th>Проводимые работы</th>
				<th width=4%>Instagram</th>
			</thead>
						
			<?php
            foreach ($reports as $row) {
            ?>

			<tr>
			<td align=left><?php echo $row->user->name; ?></td>
			<td><?php echo Yii::$app->formatter->asDatetime($row->putdate, "php:d.m.Y, H:i"); ?></td>
			<td style='display:none'><?php echo $row->putdate; ?></td>
			<td>
            <?php
			    if ($row->sost == "ясно") {
                       echo "<img src='http://dk.dagavtodor.ru/static/img/icons/weather/sun.png' title=ясно>";
                    }
                    else {

                        if ($row->sost == "пасмурно") {
                            echo "<img src=http://dk.dagavtodor.ru/static/img/icons/weather/overcast.png title=пасмурно>";
                        }
                        else {
                            if ($row->sost == "туман") {
                               echo "<img src=http://dk.dagavtodor.ru/static/img/icons/weather/foggy.png title=туман>";
                            }
                            else {
                                if ($row->sost == "дождь") {
                                    echo "<img src=http://dk.dagavtodor.ru/static/img/icons/weather/rain.png title=дождь>";
                                }
                                else {
                                    echo "<img src=http://dk.dagavtodor.ru/static/img/icons/weather/snow.png title=снег>";
                                } 
                            }
                        }
                    }
                ?>
			</td>
			<td style='display:none'><?php echo $row->sost; ?></td>
			<td><?php echo $row->temp; ?></td>
			<td><?php echo $row->pr_r; ?></td>
			<td><?php echo $row->pr_m; ?></td>
			<td><?php echo $row->works; ?></td>
			<td><a href=https://instagram.com/<?php echo $row->user->insta; ?>/ target="_blank"><img src="http://dk.dagavtodor.ru/static/img/social/insta.png" width="25"></a></td>
			</tr>
			
			<?php
		 	}
		 	?>

		</table>

        </p>

	</div>
