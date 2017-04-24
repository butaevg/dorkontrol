<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "docs".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property string $extension
 * @property string $size
 * @property integer $category_id
 *
 * @property DocsCategory $category
 */
class Docs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'docs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            //[['url'], 'file', 'skipOnEmpty' => false, 
              //'extensions' => 'png, jpg, jpeg, doc, docx, xls, xlsx, rar, zip, pdf'],
            [['category_id'], 'integer'],
            [['name', 'url'], 'string', 'max' => 512],
            [['ext', 'size'], 'string', 'max' => 10],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => DocsCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'putdate' => 'Created At',
            'url' => 'Url',
            'ext' => 'Extension',
            'size' => 'Size',
            'category_id' => 'Category ID',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocsCategory()
    {
        return $this->hasOne(DocsCategory::className(), ['id' => 'category_id']);
    }
}
