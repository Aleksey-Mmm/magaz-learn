<?php
/**
 * Date: 08.12.2020
 * Time: 11:31
 */

namespace app\models;


use yii\db\ActiveRecord;

/**
 * @property  int order_id
 * @property int product_id
 * @property string title
 * @property  float price
 * @property  int qty
 * @property  float total
 * @property  int id
 */
class OrderProduct extends ActiveRecord
{

    public static function tableName()
    {
        return 'order_product';
    }

    public function rules()
    {
        return [
            [['order_id', 'product_id', 'title', 'price', 'qty', 'total'], 'required'],
            [['order_id', 'product_id', 'qty'], 'integer'],
            [['price', 'total'], 'number'],
            [['title'], 'string', 'max'=>255],
        ];
    }

    public function saveOrderProducts($products, $orderId)
    {
        foreach ($products as $id => $product) {
            //$op = new OrderProduct();
            $this->id = null;           //обнуляем ид записи и
            $this->isNewRecord = true;  //отмечаем ее как новую

            $this->order_id = $orderId;
            $this->product_id = $id;
            $this->title = $product['title'];
            $this->price = $product['price'];
            $this->qty = $product['qty'];
            $this->total = $product['price'] * $product['qty'];
            if (!$this->save()) {
                return false;
            }
        }
        return true;
    }

}