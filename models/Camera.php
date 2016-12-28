<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "camera".
 *
 * @property integer $id
 * @property string $name
 * @property string $folder
 * @property string $html
 * @property string $img
 * @property string $type
 * @property string $ip
 * @property integer $hide
 */
class Camera extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'camera';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['html'], 'string'],
            [['hide'], 'integer'],
            [['name', 'folder', 'img'], 'string', 'max' => 512],
            [['type'], 'string', 'max' => 3],
            [['ip'], 'string', 'max' => 50],
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
            'folder' => 'Folder',
            'html' => 'Html',
            'img' => 'Img',
            'type' => 'Type',
            'ip' => 'Ip',
            'hide' => 'Hide',
        ];
    }
}
