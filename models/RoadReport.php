<?php

namespace app\models;

use Yii;
use app\models\RoadReportImg;

/**
 * This is the model class for table "road_report".
 *
 * @property integer $id
 * @property string $name
 * @property integer $road_id
 *
 * @property Road $road
 */
class RoadReport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'road_report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['road_id'], 'integer'],
            [['name'], 'string', 'max' => 512],
            [['road_id'], 'exist', 'skipOnError' => true, 'targetClass' => Road::className(), 'targetAttribute' => ['road_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'road_id' => 'Road ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoad()
    {
        return $this->hasOne(Road::className(), ['id' => 'road_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadReportImg()
    {
        return $this->hasMany(RoadReportImg::className(), ['report_id' => 'id']);
    }
}
