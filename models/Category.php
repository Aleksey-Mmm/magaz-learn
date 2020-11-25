<?php
/**
 * Date: 20.11.2020
 * Time: 16:00
 */

namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }

}