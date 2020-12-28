<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <p>
                    <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
<div class="category-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            //'parent_id',
            [
                'attribute' => 'parent_id',
                'value' => function($data){
                    return $data->category->title ?? 'Root category';
                },
            ],
            'title',
            'description',
            //'keywords',
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