<?php
/* @var $this yii\web\View */

$this->title = 'Важнейшие объекты';
?>
	<div id="content_big">
		<h2><?= $road->name; ?></h2>
		<h2>
			<?php echo "<a href=road/createreport/".$road->id.">Добавить отчет</a>"; ?>
		</h2>

		<?php foreach ($reports as $report) {
			echo "<br><br><a href=road/upload/".$report->id.">".$report->name."</a>";
		}
		?>

	</div>