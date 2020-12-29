<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <p>
                    <?= Html::a('Добавить продукт', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
            <div class="product-index">

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        //['class' => 'yii\grid\SerialColumn'],
                        'id',
                        //'category_id',
                        [
                            'attribute' => 'category_id',
                            'value' => function ($data) {
                                return $data->category->title;
                            },
                            //'header' => 'Категория',
                        ],
                        'title',
                        //'content:ntext',
                        'price',
                        //'old_price',
                        //'description',
                        //'keywords',
                        //'img',
                        //'is_offer',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Действия',
                        ],
                    ],
                    'pager' => [
                        'pageCssClass' => 'page-link',
                        'nextPageCssClass' => 'next page-link',
                        'prevPageCssClass' => 'prev page-link',
                        'options' => ['class' => 'pagination pagination-sm m-0 float-right'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
