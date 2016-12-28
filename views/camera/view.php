<?php
/* @var $this yii\web\View */

$this->title = $cam->name;
?>
	<div id="page">
		<h3><?php echo $cam->name; ?></h3>

		<p style='padding-left: 30px;'>
			<a href="camera/ip/"><<< все ip-камеры</a>
		</p>

		<?php echo $cam->html; ?>

	</div>