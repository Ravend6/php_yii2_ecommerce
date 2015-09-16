<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\rating\StarRating;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropdownList(
        $model::getCategoryList()
    ); ?>

    <?= $form->field($model, 'top')->dropdownList(
        [$model::STATUS_NOT_TOP => 'Не в топ', $model::STATUS_TOP => 'В топ']
    ); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 14]) ?>

    <?= $form->field($model, 'short_description')->textarea(['rows' => 7]) ?>
    
    <?php if ($model->image): ?>
        <div><?= Html::img('@web/images/products/titles/' . $model->image, 
        ['alt' => $model->title, 'width' => 100]) ?></div>
    <?php endif; ?>

    <?= $form->field($model, 'file')->widget(FileInput::classname(), []); ?>

    <?php if ($model->images): ?>
        <div>
            <?php foreach ($model->images as $image): ?>
                <?= Html::img('@web/images/products/galleries/' . $image->name, 
                ['alt' => $image->alt, 'width' => 100]) ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <?= $form->field($model, 'multiFiles[]')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*', 'multiple' => true], 
        'pluginOptions' => ['previewFileType' => 'any']]); ?>

    <?= $form->field($model, 'image_alt')->textInput(['maxlength' => true, 
    'placeholder' => 'По умолчанию берется с названия.']) ?>

    <?= $form->field($model, 'slug_ru')->textInput(['maxlength' => true, 
    'placeholder' => 'По умолчанию автогенерация.']) ?>

    <?= $form->field($model, 'availability')->dropdownList(
        [$model::AVAILABILITY_YES => 'В наличии', $model::AVAILABILITY_NO => 'Под заказ']
    ); ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'old_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'currency')->textInput(['maxlength' => true, 
    'placeholder' => 'По умолчанию грн.']) ?>

    <?= $form->field($model, 'vendor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rating')->widget(StarRating::classname(), [
        'pluginOptions' => ['size'=>'lg']
    ]); ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->dropdownList(
        $model::getUserList()
    ); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', 
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
