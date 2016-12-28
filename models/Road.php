<?php

namespace app\models;

use Yii;
use app\models\RoadReport;

/**
 * This is the model class for table "road".
 *
 * @property integer $id
 * @property string $name
 * @property string $text
 * @property string $type
 * @property integer $onsite
 * @property integer $report
 * @property integer $complete
 * @property integer $contractor_id
 *
 * @property User $contractor
 */
class Road extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'road';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['text'], 'string'],
            [['onsite', 'report', 'complete', 'contractor_id'], 'integer'],
            [['name'], 'string', 'max' => 512],
            [['type'], 'string', 'max' => 3],
            [['contractor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['contractor_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'text' => 'Справка',
            'type' => 'Тип',
            'onsite' => 'Показывать на сайте',
            'report' => 'Отчет подрядчика',
            'complete' => 'Завершен',
            'contractor_id' => 'Подрядчик',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContractor()
    {
        return $this->hasOne(User::className(), ['id' => 'contractor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadReport()
    {
        return $this->hasMany(RoadReport::className(), ['road_id' => 'id'])->orderBy(['road_report.id'=>SORT_DESC]);
    }
}
