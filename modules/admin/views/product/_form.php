<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'category_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group field-product-category_id">
        <label class="control-label" for="product-category_id">Категория</label>
        <select id="product-category_id" class="form-control" name="Product[category_id]" aria-invalid="false">
            <?= \app\components\MenuWidget::widget([
                'tpl' => 'select_product',
                'model' => $model,
                'cache_time' => 0,
            ]) ?>
        </select>
        <div class="help-block"></div>
    </div>

    <?//= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?php
    echo $form->field($model, 'content')->widget(CKEditor::class, [
      'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
    ]);

//    echo $form->field($model, 'content')->widget(CKEditor::class,[
//        'editorOptions' => [
//            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
//            'inline' => false, //по умолчанию false
//        ],
//    ]);
    ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'old_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'file')->widget(\kartik\file\FileInput::class, [
       'options'=>['accept' => 'image/*'],
       'pluginOptions'=>[
           'showCaption' => false,
           'showUpload' => false,
       ]
    ]);
    ?>

    <?= $form->field($model, 'is_offer')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
