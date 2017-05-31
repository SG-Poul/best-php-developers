<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qoute".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $skype
 * @property string $phone
 * @property string $body
 * @property string $created_at
 */
class Qoute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qoute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['created_at'], 'safe'],
            [['name', 'email', 'skype', 'phone'], 'string', 'max' => 255],
            [['name', 'email', 'skype', 'phone'], 'required'],
            [['email'], 'email'],
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
            'email' => 'Email',
            'skype' => 'Skype',
            'phone' => 'Phone',
            'body' => 'Body',
            'created_at' => 'Created At',
        ];
    }
}
