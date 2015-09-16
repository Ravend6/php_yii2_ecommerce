<?php
use yii\helpers\Html;
use kartik\rating\StarRating;
use backend\models\Product;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use frontend\helpers\ProductHelper;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="row">
        <div class="col-sm-4">
            <?php require(Yii::getAlias('@partials') . '/_slider.php'); echo $slider; ?>
        </div> 
        <div class="col-sm-8">
            <?php foreach($products as $product): ?>
                <article class="product-main">
                    <h2 class="product-list"><?= Html::a($product->title, ['/' . $product->slug_ru]) ?></h2>
                    <p><?= Html::a(Html::img('/admin/images/products/titles/' . $product->image, 
                    ['alt' => $product->image_alt, 'width' => 150, 'height' => 150, 'class' => 'leftimg img-thumbnail']), 
                    ['/' . $product->slug_ru]) ?><?= nl2br($product->short_description, false) ?></p>
                    <p><?= Html::a('Подробнее &raquo;', ['/' . $product->slug_ru], 
                    ['class' => 'btn btn-default']) ?></p>
                    <div class="clearfix"></div>
                    <p><?= StarRating::widget([
                        'name' => 'rating',
                        'value' => $product->rating,
                        'disabled' => true,
                        'pluginOptions' => [
                            'size' => 'sm',
                            'showClear' => false,
                            'showCaption' => false,
                            // 'starCaptions' => [
                            //     0 => 'Еще не оценили',
                            //     0.5 => 'очень плохо',
                            //     1 => 'Плохо',
                            //     1.5 => 'Почти нормально',
                            //     2 => 'Нормально',
                            //     2.5 => 'Почти хорошо',
                            //     3 => 'Хорошо',
                            //     3.5 => 'Почти отлично',
                            //     4 => 'Отлично',
                            //     4.5 => 'Почти идеально',
                            //     5 => 'Идеально',
                            // ]
                        ]
                    ]) ?></p>
                    <?= ProductHelper::getButtons($product) ?>
                </article>
                <hr>
            <?php endforeach; ?>
        </div>

    </div>
</div>
