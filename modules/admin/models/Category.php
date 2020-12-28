<?php
/**
 * Date: 18.12.2020
 * Time: 14:46
 */

namespace app\modules\admin\models;


class Category extends \app\models\Category
{

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительская категория',
            'title' => 'Наименование',
            'description' => 'Описание',
            'keywords' => 'Ключевые слова',

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'parent_id'], 'integer'],
            [['title', 'description', 'keywords'], 'string', 'max' => 255],
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'parent_id']);
    }

}