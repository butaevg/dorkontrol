<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "weather".
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
class Weather extends ActiveRecord
{
    // public $sost;
    // public $temp;
    // public $pr_r;
    // public $pr_m;
    // public $works;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'weather';
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
            [['temp', 'works'], 'required', 'message' => 'Обязательное поле'],
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
            'pudate' => 'Created At',
            'sost' => 'Sost',
            'temp' => 'Temp',
            'pr_r' => 'Pr R',
            'pr_m' => 'Pr M',
            'works' => 'Works',
            'rayon' => 'Rayon',
        ];
    }

    /*
    * Autoupdate created_at and updated_at fields.
    */
    // public function beforeSave($insert)
    // {
    //    if (parent::beforeSave($insert)) {
    //       if($insert)
    //          $this->created_at = date('Y-m-d H:i:s');
    //       $this->updated_at = date('Y-m-d H:i:s');
    //       return true;
    //    } else {
    //       return false;
    //    }
    // }

    public function behaviors()
    {
        return [
            [
            'class' => TimestampBehavior::className(),
            'value' => function() { return date('Y-m-d H:i:s'); },
            'attributes' => [
                         ActiveRecord::EVENT_BEFORE_INSERT => ['putdate'],
                         //ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
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
