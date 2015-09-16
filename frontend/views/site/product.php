<?php

use yii\helpers\Html;
use kartik\rating\StarRating;
use yii\widgets\ActiveForm;
use backend\models\Ip;
use backend\models\Product;
use frontend\helpers\ProductHelper;

$this->title = $model->title;
/* @var $this yii\web\View */
?>
<?php
$ip = Yii::$app->request->userIP;
$ipModel = Ip::find()->where([
    'name' => $ip,
    'product_id' => $model->id
])->one();

if ($ipModel) {
    $isRatingDisabled = true;
}
?>

<div class="row">
    <div class="col-sm-4">
        <?php require(Yii::getAlias('@partials') . '/_slider.php'); echo $slider; ?>
    </div>
    <div class="col-sm-8">
        <article>
            <h2 class="product-view"><?= $model->title ?></h2>
            <p><?= Html::a(Html::img('/admin/images/products/titles/' . $model->image, 
            ['alt' => $model->image_alt, 
            'width' => 200, 
            'height' => 200, 
            'class' => 'leftimg img-thumbnail',]),
            ['/admin/images/products/titles/' . $model->image],
            ['data-lightbox' => 'product-gallery', 'id' => 'product-zoom']) ?></p>
            <p><?= nl2br($model->description, false) ?></p>
            <div class="clearfix"></div>
            <p>
                <?php foreach ($model->images as $image): ?>
                    <?= Html::a(Html::img('/admin/images/products/galleries/' . $image->name, 
                    ['alt' => $image->alt, 
                    'width' => 70, 
                    'height' => 70,
                    'class' => 'img-thumbnail']), 
                    ['/admin/images/products/galleries/' . $image->name],
                    ['data-lightbox' => 'product-gallery']) ?> 
                <?php endforeach; ?>
            </p>
            <p><?= StarRating::widget([
                'name' => 'rating',
                'value' => $model->rating,
                'disabled' => $isRatingDisabled,
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
                ],
                'pluginEvents' => [
                    "rating.change" => "function () {
                        console.log($(this).val()); 
                        $.ajax({
                            type: 'POST',
                            url: '/site/product-rating',
                            data: {rating: $(this).val(), id: $model->id},
                            success: function(res) {
                                // if (res === 'forbidden') {
                                //     $('.star-rating').removeClass('rating-active');
                                //     $('.star-rating').addClass('rating-disabled');
                                //     $('#w0').prop('disabled', true);
                                //     return;
                                // }
                                location.reload();
                            }
                        });
                        return false;
                    }",
                ]
            ]) ?></p>
            <?= ProductHelper::getButtons($model) ?>
        </article>

    </div>
</div>







