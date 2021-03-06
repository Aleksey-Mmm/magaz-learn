<?php
/**
 * Date: 04.12.2020
 * Time: 11:04
 */

namespace app\models;


use yii\base\Model;

/**
 *  Array(
 *      'cart' => [
 *          '2' => [
 *              'title' => 'title',
 *              'price' => 10,
 *              'qty' => 1
 *              ...
 *          ],
 *      ],
 *      'cart.qty' => 2,
 *      'cart.sum' => 20,
 * )
 *
 * */


class Cart extends Model
{

    /**
     * @param $product Product
     * @param int $qty
     */
    public function addToCart($product, $qty=1)
    {
        $qty = ($qty == '-1') ? -1 : 1;
        if (isset($_SESSION['cart'][$product->id])) {
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$product->id] = [
                'title' => $product->title,
                'price' => $product->price,
                'qty' => $qty,
                'img' => $product->img,
            ];
        }

        $_SESSION['cart.qty'] = (isset($_SESSION['cart.qty'])) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = (isset($_SESSION['cart.sum'])) ? $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;
        if ($_SESSION['cart'][$product->id]['qty'] == 0) {
            unset($_SESSION['cart'][$product->id]);
        }
    }

    public function recalc($id)
    {
        if (!isset($_SESSION['cart'][$id])) {
            return false;
        }

        $product = $_SESSION['cart'][$id];
        $_SESSION['cart.qty'] -= $product['qty'];
        $_SESSION['cart.sum'] -=  $product['qty'] * $product['price'];

        unset($_SESSION['cart'][$id]);

        return true;

    }

}