<?php
/**
 * Date: 14.12.2020
 * Time: 15:32
 */

namespace app\modules\admin\controllers;


class MainController extends AppAdminController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTest()
    {
        return $this->render('test');
    }
}