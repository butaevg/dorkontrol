<?php
/* @var $this yii\web\View */

$this->title = $road->name;
?>
	<div id="page">
		<h3><?php echo $road->name; ?></h3>

		<table class=docs_table><tr>
            <td><table class=docs_menu_table>
            <?php foreach ($roads as $row) {
                echo "<tr><td><a href=road/progress/".$row->id.">".$row->name."</a></td></tr>";
            }
		    ?>
        </table></td><td style='padding-left: 20px;'>

            <?php foreach ($road->roadReport as $report) {
                echo "<br><br><p><b>".$report->name."</b></p>";

                foreach ($report->roadReportImg as $img) {
                    echo "<a href=upload/roads/".$img->url." class=fancybox data-fancybox-group=gallery title='".$road->name." : ".$report->name."'>";

                    echo Yii::$app->thumbnail->img("upload/roads/".$img->url, [
                        'thumbnail' => [
                            'width' => 150,
                            'height' => 100,
                        ],
                        'placeholder' => [
                            'width' => 150,
                            'height' => 100
                        ]
                    ], 
                    [ 
                        'vspace' => 3, 
                        'style' => 'padding-right: 20px;'
                    ]);
                    
                    echo "</a>";
                }
            }
            ?>

        </td></tr></table>

	</div>