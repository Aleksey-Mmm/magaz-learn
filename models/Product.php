<?php
/**
 * Date: 26.11.2020
 * Time: 11:30
 */

namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{

    public static function tableName()
    {
        return 'product';
    }

}