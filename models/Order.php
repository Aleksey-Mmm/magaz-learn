<?php
/**
 * Date: 08.12.2020
 * Time: 11:12
 */

namespace app\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Order extends ActiveRecord
{

    public static function tableName()
    {
        return 'orders';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function rules()
    {
        return [
            [['nname', 'email', 'phone', 'address'], 'required'],
            ['note', 'string'],
            ['email', 'email'],
            [['created_at', 'updated_at'], 'safe'],
            ['qty', 'integer'],
            ['total', 'number'],
            ['status', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
          'name' => 'Имя',
          'email' => 'Е-майл',
          'phone' => 'Телефон',
          'address' => 'Адрес',
          'note' => 'Примечание',
        ];
    }

}