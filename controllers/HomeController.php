<?php

namespace app\controllers;


use app\models\Product;
use yii\web\Controller;

class HomeController extends AppController
{

    public function actionIndex()
    {
        $prod = Product::find()
            ->where(['is_offer' => 1])
            //->limit(4)
            ->all();

        //$offers = [];
        if (count($prod) > 4) {
            //получить случайные 4 продукта. способ 1
            shuffle($prod);
            $offers = array_slice($prod, 0, 4);
            //способ2
/*            $kArr = array_rand($prod, 4);
            foreach ($kArr as $k) {
                $offers[] = $prod[$k];
            }*/
        } else {
            $offers = $prod;
        }
        //debug($offers);
        return $this->render('index', compact('offers'));
    }
}