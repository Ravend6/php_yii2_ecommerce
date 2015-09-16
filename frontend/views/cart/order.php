<?php
use \yii\helpers\Html;
use \yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $products common\models\Product[] */
?>
<?php $currency = 'грн.'; ?>
<h1>Ваш заказ</h1>

<div class="container-fluid">
    <div class="row">
         <div class="col-xs-2">
            <h3>Название товара:</h3>
        </div>
        <div class="col-xs-2">
            <h3>Картинка:</h3>
        </div>
        <div class="col-xs-2">
            <h3>Цена:</h3>
        </div>
        <div class="col-xs-2">
            <h3>Количество:</h3>
        </div>
        <div class="col-xs-2">
            <h3>Цена:</h3>
        </div>
    </div>
    <?php foreach ($products as $product):?>
    <div class="row">
        <div class="col-xs-2">
            <h4><?= Html::a(Html::encode($product->title), ['/' . $product->slug_ru]) ?></h4>
        </div>
        <div class="col-xs-2">
            <?= Html::img('/admin/images/products/titles/' . $product->image, [
                'width' => 100,
            ]) ?>
        </div>
        <div class="col-xs-2">
            <b><?= $product->price . ' ' . $product->currency ?></b> 
        </div>
        <div class="col-xs-2">
            <b><?= $quantity = $product->getQuantity()?></b>
        </div>
        <div class="col-xs-2">
            <b><?= $product->getCost() . ' ' . $product->currency?></b>
        </div>
    </div>
    <?php endforeach ?>
    <div class="row">
        <div class="col-xs-8">

        </div>
        <div class="col-xs-2">
            <h4><b>Итого: <?= $total . ' ' . $currency?></b></h4>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?php
            /* @var $form ActiveForm */
            $form = ActiveForm::begin([
                'id' => 'order-form',
            ]) ?>
            <?= $form->field($order, 'first_name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($order, 'last_name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($order, 'phone')->textInput(['maxlength' => true]) ?>
            <?= $form->field($order, 'city')->textInput(['maxlength' => true]) ?>
            <?= $form->field($order, 'department')->textInput(['maxlength' => true]) ?>
            <?= $form->field($order, 'note')->textarea(['maxlength' => true, 'rows' => '6']) ?>


            <div class="form-group row">
                <div class="col-xs-12">
                    <?= Html::submitButton('Заказать', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>

            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>