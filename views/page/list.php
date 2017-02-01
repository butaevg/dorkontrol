<?php
/* @var $this yii\web\View */

$this->title = 'Страницы';
?>
    <div id="content_big">

        <h2>Страницы</h2>
        <h2><a href=page/create>Добавить</a></h2>

        <table class=cp_table>

        <?php foreach ($pages as $page) {
        	echo "<tr>
            <td width=80%>".$page->title."</td>
            <td><a href=page/update/".$page->id."><img src=img/icons/edit.png></a></td>
            </tr>";
        }?>

        </table>
        
    </div>
