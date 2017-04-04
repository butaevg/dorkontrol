<?php
/* @var $this yii\web\View */

$this->title = 'Важнейшие объекты';
?>
	<div id="content_big">
		<h2>Важнейшие объекты</h2>
		<h2><a href=road/create>Добавить</a></h2>

		<table class=cp_table>
			<thead>
		      <th>Объект</th>
		      <th>Редакт.</th>
		      <th>На сайте</th>
		      <th>Заверш.</th>
		      <th>Подрядчик</th>
			</thead>

		<?php foreach ($roads as $road) {
			echo "<tr>
			      <td><a href=road/reportlist/".$road->id.">".$road->name."</a></td>
			      <td><a href=road/update/".$road->id."><img src=img/icons/edit.png></a></td>
			      <td>".$road->onsite."</td>
			      <td>".$road->complete."</td>
			      <td>".$road->contractor->fullname."</td>
			      </tr>";
		}
		?>

		</table>

	</div>