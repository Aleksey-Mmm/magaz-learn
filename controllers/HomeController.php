<?php

namespace app\controllers;


use yii\web\Controller;

class HomeController extends AppController
{

    public function actionIndex()
    {
        return $this->render('index');
    }
}