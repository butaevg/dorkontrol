<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "map".
 *
 * @property integer $id
 * @property string $rayon
 * @property string $plos
 * @property string $nal_dor_obs
 * @property string $selo
 * @property string $selo_bezd
 * @property string $prot_obs
 * @property string $res_dor
 * @property string $mest_dor
 * @property string $res_dor_asf
 * @property string $mest_dor_asf
 * @property string $map_rayon
 */
class Map extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'map';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rayon', 'plos', 'nal_dor_obs', 'selo', 'selo_bezd', 'prot_obs', 'res_dor', 'mest_dor', 'res_dor_asf', 'mest_dor_asf', 'map_rayon'], 'required'],
            [['rayon', 'plos', 'nal_dor_obs', 'selo', 'selo_bezd', 'prot_obs', 'res_dor', 'mest_dor', 'res_dor_asf', 'mest_dor_asf'], 'string', 'max' => 20],
            [['map_rayon'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rayon' => 'Rayon',
            'plos' => 'Площадь',
            'nal_dor_obs' => 'Nal Dor Obs',
            'selo' => 'Selo',
            'selo_bezd' => 'Selo Bezd',
            'prot_obs' => 'Prot Obs',
            'res_dor' => 'Res Dor',
            'mest_dor' => 'Mest Dor',
            'res_dor_asf' => 'Res Dor Asf',
            'mest_dor_asf' => 'Mest Dor Asf',
            'map_rayon' => 'Map Rayon',
        ];
    }
}
