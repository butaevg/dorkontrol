<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "psd".
 *
 * @property integer $id
 * @property string $name
 * @property double $price
 * @property integer $contractor
 * @property double $exe
 * @property integer $exe_perc
 * @property double $getsum
 * @property integer $exe_getsum
 * @property string $updated_at
 */
class Psd extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'psd';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'updated_at'], 'required'],
            [['price', 'exe', 'getsum'], 'number'],
            [['contractor', 'exe_perc', 'exe_getsum'], 'integer'],
            [['updated_at'], 'safe'],
            [['name'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Объект',
            'price' => 'Стоимость',
            'contractor' => 'Проектировщик',
            'exe' => 'Выполнение',
            'exe_perc' => 'Выполнение, %',
            'getsum' => 'Получено',
            'exe_getsum' => 'Получено, %',
            'updated_at' => 'Обновлено',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'contractor']);
    }
}
