<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = 'Заказ № ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
// \yii\web\YiiAsset::register($this);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <!--                <h3 class="card-title">Bordered Table</h3>-->
                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
                <div class="order-view">

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'created_at:datetime',
                            'updated_at',
                            'qty',
                            'total',
                            //'status',
                            [
                                'attribute' => 'status',
                                'value' => $model->status == 0 ? '<span class="text-warning">Новый</span>'  : '<span class="text-success">Оформлен</span>',
                                'format' => 'raw',
                            ],
                            'name',
                            //'email:email',
                            'email',
                            'phone',
                            'address',
                            'note:ntext',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $items = $model->orderProduct;  ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Товары заказа</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 10px">ID</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th style="width: 40px">Кол-во</th>
                        <th style="width: 40px">Сумма</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($items) {
                        foreach ($items as $product) {
                    ?>
                    <tr>
                        <td><?= $product->id ?></td>
                        <td><?= $product->title ?></td>
                        <td><?= $product->price ?></td>
                        <td><?= $product->qty ?></td>
                        <td><?= $product->total ?></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>