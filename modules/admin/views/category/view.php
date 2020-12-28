<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <p>
                    <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="category-view">

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            //'parent_id',
                            [
                                'attribute' => 'parent_id',
                                'value' => function ($model){
                                    if ($model->category) {
                                        return Html::a($model->category->title,
                                            ['view', 'id'=>$model->category->id]);
                                    }
                                    return 'Root category';
                                },
                                'format'=> 'html',

                            ],
                            'title',
                            'description',
                            'keywords',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>