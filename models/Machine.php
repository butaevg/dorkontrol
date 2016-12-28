<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "machine".
 *
 * @property integer $id
 * @property string $name
 * @property string $text
 * @property string $year_issue
 * @property string $pic_1
 * @property string $pic_2
 * @property string $pic_3
 * @property string $pic_4
 * @property string $pic_5
 * @property string $putdate
 * @property integer $dep_id
 * @property integer $working
 *
 * @property User $dep
 */
class Machine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'machine';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'year_issue', 'pic_1', 'putdate'], 'required'],
            [['text'], 'string'],
            [['putdate'], 'safe'],
            [['dep_id', 'working'], 'integer'],
            [['name', 'pic_1', 'pic_2', 'pic_3', 'pic_4', 'pic_5'], 'string', 'max' => 512],
            [['year_issue'], 'string', 'max' => 5],
            [['dep_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['dep_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование техники',
            'text' => 'Описание',
            'year_issue' => 'Год выпуска',
            'pic_1' => 'Фото 1',
            'pic_2' => 'Фото 2',
            'pic_3' => 'Фото 3',
            'pic_4' => 'Фото 4',
            'pic_5' => 'Фото 5',
            'putdate' => 'Putdate',
            'dep_id' => 'Dep ID',
            'working' => 'Working',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'dep_id']);
    }
}
