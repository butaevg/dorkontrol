<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "org".
 *
 * @property integer $id
 * @property string $text
 * @property integer $dep_id
 * @property integer $cat
 *
 * @property User $dep
 */
class Org extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'org';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['dep_id', 'cat'], 'integer'],
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
            'text' => 'Сведения',
            'dep_id' => 'ДЭП',
            'cat' => 'Раздел',
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
