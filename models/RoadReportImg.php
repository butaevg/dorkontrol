<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "road_report_img".
 *
 * @property integer $id
 * @property string $url
 * @property integer $report_id
 *
 * @property RoadReport $report
 */
class RoadReportImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'road_report_img';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['report_id'], 'integer'],
            [['url'], 'string', 'max' => 255],
            [['report_id'], 'exist', 'skipOnError' => true, 'targetClass' => RoadReport::className(), 'targetAttribute' => ['report_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'report_id' => 'Report ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReport()
    {
        return $this->hasOne(RoadReport::className(), ['id' => 'report_id']);
    }
}
