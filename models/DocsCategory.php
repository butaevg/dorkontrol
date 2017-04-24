<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "docs_category".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Docs[] $docs
 */
class DocsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'docs_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocs()
    {
        return $this->hasMany(Docs::className(), ['category_id' => 'id']);
    }
}
