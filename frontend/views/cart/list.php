<?php
use \yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $products backend\models\Product[] */
?>
<?php 
$currency = 'грн.';
?>
<h1>Ваша корзина</h1>

<div class="container-fluid">
    <!-- Start cart-list -->
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
        <div class="col-xs-2">

        </div>
    </div>
    <?php foreach ($products as $product): ?>
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
            <b><?= $product->price . ' ' .$product->currency?></b>
        </div>
        <div class="col-xs-2">
            <b><?= $quantity = $product->getQuantity()?></b>

            <?= Html::a('-', ['cart/update', 'id' => $product->getId(), 'quantity' => $quantity - 1], ['class' => 'btn btn-danger', 'disabled' => ($quantity - 1) < 1])?>
            <?= Html::a('+', ['cart/update', 'id' => $product->getId(), 'quantity' => $quantity + 1], ['class' => 'btn btn-success'])?>
        </div>
        <div class="col-xs-2">
            <b><?= $product->getCost() . ' ' . $product->currency ?></b>
        </div>
        <div class="col-xs-2">
            <?= Html::a('×', ['cart/remove', 'id' => $product->getId()], ['class' => 'btn btn-danger'])?>
        </div>
    </div>
    <hr> 
    <?php endforeach ?>
    <div class="row">
        <div class="col-xs-8">
            <?= Html::a('Продолжить покупку', Yii::$app->request->referrer, ['class' => 'btn btn-info'])?>
        </div>
        <div class="col-xs-2">
            <h4><b>Итого: <?= $total . ' ' . $currency ?></b></h4>
        </div>
        <div class="col-xs-2">
            <?= Html::a('Заказать', ['cart/order'], ['class' => 'btn btn-success'])?>
        </div>
    </div>
    <!-- End cart-list -->
</div>