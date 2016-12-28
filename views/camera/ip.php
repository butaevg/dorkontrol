<?php
/* @var $this yii\web\View */

$this->title = 'IP-камеры';
?>
	<div id="page">
		<h3>IP-камеры</h3>

		<table class="docs_table"><tr>
			<td><table class="docs_menu_table">
			<tr><td><a href="camera/ip/">IP-камеры</a></td></tr>
			<tr><td><a href="camera/3g/">3G-камеры</a></td></tr>
			</table></td><td style='padding-left: 20px;'><table width="500" border="0" align="center" cellspacing="5">

			<?php foreach ($cameras as $camera) {
				echo "<tr><td><a href=camera/".$camera->id."><img src=img/camera/".$camera->img."><br>".$camera->name."</a><br><br></td></tr>";
			}
			?>

			</table><br></td></tr></table>

	</div>