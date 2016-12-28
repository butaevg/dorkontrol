<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "weathercurrent".
 *
 * @property integer $id
 * @property integer $putdate
 * @property string $sost
 * @property string $temp
 * @property string $pr_r
 * @property string $pr_m
 * @property string $works
 * @property integer $rayon
 *
 * @property User $rayon0
 */
class WeatherCurrent extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'weathercurrent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['works'], 'string'],
            [['sost', 'pr_r', 'pr_m'], 'string', 'max' => 32],
            [['temp'], 'string', 'max' => 10],
            [['rayon'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['rayon' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'putdate' => 'Updated At',
            'sost' => 'Sost',
            'temp' => 'Temp',
            'pr_r' => 'Pr R',
            'pr_m' => 'Pr M',
            'works' => 'Works',
            'rayon' => 'Rayon',
        ];
    }

    public function behaviors()
    {
        return [
            [
            'class' => TimestampBehavior::className(),
            'value' => function() { return date('Y-m-d H:i:s'); },
            'attributes' => [
                         //ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                         ActiveRecord::EVENT_BEFORE_UPDATE => ['putdate'],
                     ],
            ]
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'rayon']);
    }
}
