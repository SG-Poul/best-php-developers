<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property integer $id
 * @property string $page
 * @property string $category
 * @property string $body
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['page', 'category'], 'string', 'max' => 255],
            [['page', 'category', 'body'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page' => 'Page',
            'category' => 'Category',
            'body' => 'Body',
        ];
    }
}
