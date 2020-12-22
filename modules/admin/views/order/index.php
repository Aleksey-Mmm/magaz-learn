<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список заказов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
<!--                <h3 class="card-title">Bordered Table</h3>-->
                <p>
                    <?= Html::a('Добавить заказ', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="order-index">

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            //'created_at',
                            [
                                'attribute' => 'created_at',
                                'format' => ['datetime', 'php:d M Y H:i'],
                            ],
                            //'updated_at',
                            [
                                'attribute' => 'updated_at',
                                'format' => 'date',
                            ],
                            'qty',
                            'total',
                            'status',
                            //'name',
                            //'email:email',
                            //'phone',
                            //'address',
                            //'note:ntext',

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

                <!--                <table class="table table-bordered">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th style="width: 10px">#</th>-->
<!--                        <th>Task</th>-->
<!--                        <th>Progress</th>-->
<!--                        <th style="width: 40px">Label</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                    <tr>-->
<!--                        <td>1.</td>-->
<!--                        <td>Update software</td>-->
<!--                        <td>-->
<!--                            <div class="progress progress-xs">-->
<!--                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>-->
<!--                            </div>-->
<!--                        </td>-->
<!--                        <td><span class="badge bg-danger">55%</span></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>2.</td>-->
<!--                        <td>Clean database</td>-->
<!--                        <td>-->
<!--                            <div class="progress progress-xs">-->
<!--                                <div class="progress-bar bg-warning" style="width: 70%"></div>-->
<!--                            </div>-->
<!--                        </td>-->
<!--                        <td><span class="badge bg-warning">70%</span></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>3.</td>-->
<!--                        <td>Cron job running</td>-->
<!--                        <td>-->
<!--                            <div class="progress progress-xs progress-striped active">-->
<!--                                <div class="progress-bar bg-primary" style="width: 30%"></div>-->
<!--                            </div>-->
<!--                        </td>-->
<!--                        <td><span class="badge bg-primary">30%</span></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>4.</td>-->
<!--                        <td>Fix and squish bugs</td>-->
<!--                        <td>-->
<!--                            <div class="progress progress-xs progress-striped active">-->
<!--                                <div class="progress-bar bg-success" style="width: 90%"></div>-->
<!--                            </div>-->
<!--                        </td>-->
<!--                        <td><span class="badge bg-success">90%</span></td>-->
<!--                    </tr>-->
<!--                    </tbody>-->
<!--                </table>-->
            </div>
            <!-- /.card-body -->
<!--            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div>-->
        </div>
    </div>
</div>

