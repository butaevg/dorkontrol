<?php
/* @var $this yii\web\View */

$this->title = 'Документы';
?>
    <div id="content">

        <h2><?= $category->name; ?></h2><br><br>
        <a href="docs/upload/<?= $category->id; ?>">Добавить</a><br><br>

        <?php foreach ($docs as $doc) {
				echo "<a href=docs/".$doc->url.">".$doc->name."</a>&nbsp;<a href=docs/delete/".$doc->id."><em>(уд.)</em></a></br>";
				}
	        ?>
     </div>

    <div id="sidebar"><ul><li><h2>Категории</h2><ul>
		<?php foreach ($categories as $cat) {
			echo "<li><a href=docs/manage/".$cat->id.">".$cat->name."</a>&nbsp;&nbsp;<a href=docs/update/".$cat->id."><em>(ред.)</em></a></li>";
		} ?>
		<li>&nbsp;</li>
		<li><a href=docs/create>+ Добавить категорию</a></li>
		</ul></li></ul>
	</div>

	<div style="clear: both;">&nbsp;</div>    