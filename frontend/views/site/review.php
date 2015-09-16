<?php 

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<div class="row">
    <div class="col-sm-4">
        <?php require(Yii::getAlias('@partials') . '/_slider.php'); echo $slider; ?>
    </div>
    <div class="col-sm-8">
        <h1 class="fix-header">Отзывы</h1>
        <?php $form = ActiveForm::begin([
            'action' => ['site/review-create']
        ]) ?>
        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'body')->textArea(['maxlength' => true]) ?>

        <div class="form-group row">
            <div class="col-xs-12">
                <?= Html::submitButton('Оставить отзыв', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>

        <?php ActiveForm::end() ?>
        <?php foreach($reviews as $review): ?>
            <article>
                <h3><?= $review->first_name ?> <?= $review->last_name ?></h3>
                <p><?= $review->body ?></p>
            </article>
        <?php endforeach; ?>
    </div> 
</div>