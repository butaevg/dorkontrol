<?php
/* @var $this yii\web\View */

$this->title = 'Важнейшие объекты';
?>
	<div id="page">
		<h3>Важнейшие объекты</h3>

		<?php foreach ($roads as $road) {
			echo "<fieldset><legend><b>".$road->name."</b></legend>
			      <br>".$road->text."<br></fieldset><br><br>";
		}
		?>

	</div>