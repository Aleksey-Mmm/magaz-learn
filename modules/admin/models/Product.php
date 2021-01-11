<?php

namespace app\modules\admin\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $content
 * @property float $price
 * @property float $old_price
 * @property string|null $description
 * @property string|null $keywords
 * @property string $img
 * @property int $is_offer
 */
class Product extends \yii\db\ActiveRecord
{

    public $file; //файл картинки для поля img

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'content'], 'required'],
            [['category_id', 'is_offer'], 'integer'],
            [['content'], 'string'],
            [['price', 'old_price'], 'number'],
            [['price', 'old_price'], 'default', 'value' => 0],
            [['img'], 'default', 'value' => 'products/no-image.png'],
            [['title', 'description', 'keywords', 'img'], 'string', 'max' => 255],
            //[['file'], 'image'],
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function beforeSave($insert)
    {
        if ($file = UploadedFile::getInstance($this, 'file')) {
           // var_dump($file); die();
            $dir = 'products/'. date('Y-m-d'). '/';
            if (!is_dir($dir)) {
                mkdir($dir, 755);
            }
            $fileName = uniqid(). '_'. $file->baseName. '.'. $file->extension;
            $this->img = $dir. $fileName;
            $file->saveAs($this->img);
        }

        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'title' => 'Наименование',
            'content' => 'Описание',
            'price' => 'Цена',
            'old_price' => 'Старая цена',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'img' => 'Img',
            'file' => 'Фото',
            'is_offer' => 'Is Offer',
            //'Category ID' => 'Категория',
        ];
    }
}
