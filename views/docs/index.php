<?php
/* @var $this yii\web\View */

$this->title = 'Документы';
?>

    <div id="page">
        <h3>Документы</h3>

        <table class=docs_table><tr>
			  <td><table class=docs_menu_table>
			<?php foreach ($categories as $cat) {
				echo "<tr><td><a href=docs/".$cat->id.">".$cat->name."</a></td></tr>";
				}
	        ?>
		</table></td><td style='padding-left: 20px;'>
			<?php foreach ($docs as $doc) {
				echo "<p><a href=upload/docs/".$doc->url.">".$doc->name."</a> <em>(".$doc->ext.", ".$doc->size.")</em></p>";
			    }
	        ?>	
		</td></tr></table>

    </div>