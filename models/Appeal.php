<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appeal".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $rayon
 * @property string $selo
 * @property string $street
 * @property string $orient
 * @property string $text
 * @property string $pic_1
 * @property string $pic_2
 * @property string $pic_3
 * @property string $putdate
 */
class Appeal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'appeal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'rayon', 'selo', 'pic_1'], 'required'],
            [['text'], 'string'],
            [['putdate'], 'safe'],
            [['name', 'orient', 'pic_1', 'pic_2', 'pic_3'], 'string', 'max' => 512],
            [['email', 'rayon', 'selo'], 'string', 'max' => 100],
            [['street'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя, фамилия',
            'email' => 'Адрес электронной почты',
            'rayon' => 'Район, город',
            'selo' => 'Населенный пункт',
            'street' => 'Улица, № дома',
            'orient' => 'Иной ориентир расположения участка дороги',
            'text' => 'Комментарий',
            'pic_1' => 'Изображение',
            'pic_2' => 'Изображение',
            'pic_3' => 'Изображение',
            'putdate' => 'Дата',
        ];
    }
}
