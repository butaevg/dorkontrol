<?php
/* @var $this yii\web\View */

$this->title = 'Сведения о ДЭПах';

switch ($cat) {
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
    <div id="content">

        <h2></h2><br><br>

        <table>
			<tr>
				<td><img src=img/org/org_rr.png></td>
				<td><a href=org/<?= $info->dep_id ?>/6>Резюме руководителя</a></td>
				<td><img src=img/org/org_ks.png></td>
				<td><a href=org/<?= $info->dep_id ?>/1>Кадровый состав</a></td>
				<td><img src=img/org/org_sd.png></td>
				<td><a href=org/<?= $info->dep_id ?>/2>Совет директоров</a></td>
				<td><img src=/img/org/org_ec.png></td>
				<td><a href=org/<?= $info->dep_id ?>/3>Экономические показатели</a></td>
				<td><img src=/img/org/org_tp.png></td>
				<td><a href=org/<?= $info->dep_id ?>/4>Технические показатели</a></td>
				<td><img src=img/org/org_tech.png></td>
				<td><a href=org/<?= $info->dep_id ?>/5>Транспорт и техника</a></td>
			</tr>
		</table><br>

		<p align=center><h2><?= $section ?> <?= $org->fullname ?>
		<?php 
		if (Yii::$app->user->identity->cat == 1) {
			echo "<a href=org/update/".$info->id.">
		          <img src=img/icons/edit.png>
		          </a>";
		}		     
		?>
		    </h2>
		</p>
		<p align=center><?= $info->text ?></p>

    </div>

    <div id="sidebar"><ul><li><h2>ДЭПы</h2><ul>
		<?php foreach ($orgs as $org) {
			echo "<li><a href=org/".$org->id."/".$cat.">".$org->fullname."</a></li>";
		} ?>
		</ul></li></ul>
	</div>

	<div style="clear: both;">&nbsp;</div>

