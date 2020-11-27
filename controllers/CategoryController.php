<?php
/**
 * Date: 27.11.2020
 * Time: 14:42
 */

namespace app\controllers;


use app\models\Category;
use app\models\Product;
use yii\web\NotFoundHttpException;

class CategoryController extends AppController
{

    public function actionView($id)
    {
        $category = Category::findOne($id);
        if (empty($category)) {
            throw new NotFoundHttpException('Такой категории нет..');
            //return false;
        }

        $products = Product::find()
            ->where(['category_id' => $id])
            ->all();

        return $this->render('view', compact('products'));
    }

}