<?php
/* @var $this yii\web\View */

$this->title = $map->rayon;
?>
    <div id="page">
        <h3><?php echo $map->rayon; ?></h3>

        <?php 
        echo "<a href=upload/maps/".$map->map_rayon." class=fancybox title=".$map->rayon."><img src=upload/maps/thumbs/".$map->map_rayon." id=map></a>

        <div id=map_inf>
        Площадь, тыс.км2 ".$map->plos."<br>
        Наличие дорог (км) на 1000 км2 ".$map->nal_dor_obs."<br>
        Наличие сельских населённых пунктов (един.) ".$map->selo."<br>
        &nbsp;&nbsp;в т.ч.бездорожных ".$map->selo_bezd."<br><br>
        Протяжённость дорог республиканского и<br> местного значения (км) ".$map->prot_obs."<br>
        &nbsp;&nbsp;в т. ч. республиканские и межмуниципиальные ".$map->res_dor."<br>
        &nbsp;&nbsp;местные ".$ap->mest_dor."<br><br>
        Из них с асфальтобетонным покрытием (км):<br>
        &nbsp;&nbsp;республиканские и межмуниципиальные ".$map->res_dor_asf."<br>
        &nbsp;&nbsp;местные ".$map->mest_dor_asf."<br><br>
        </div>";
        ?>

    </div>