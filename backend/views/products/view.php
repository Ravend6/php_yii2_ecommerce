<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'brand',
            'description:ntext',
            'short_description:ntext',
            [ 
                'label' => 'Картинка',
                'format' => 'raw', 
                'value' => Html::img('@web/images/products/titles/' . $model->image, 
                    ['alt' => $model->image_alt, 'width' => 150, 'height' => 150]), 
            ],
            'image_alt',
            'slug_ru',
            'availability',
            'price',
            'old_price',
            'currency',
            'vendor',
            'rating',
            'rating_count',
            'top',
            [
                'attribute' => 'user_id',
                'value' => $model->user->username
            ],
            [
                'attribute' => 'category_id',
                'value' => $model->category->name
            ],
        ],
    ]) ?>

    <article>
        <h2>Картинки</h2>
        <?php foreach ($model->images as $image): ?>
            <p><?= Html::img('@web/images/products/galleries/' . $image->name, 
                ['alt' => $image->alt, 'width' => 150, 'height' => 150]); ?>
            <?= Html::a('Удалить', ['products/delete-gallery-image'], 
                ['class' => 'btn btn-default',
                'onclick'=>"$(this);//for jui dialog in my page
                $.ajax({
                type     :'POST',
                cache    : false,
                url  : '/admin/products/delete-gallery-image',
                data: {id: $image->id},
                success  : function(response) {
                    if (response) location.reload();
                }
                });return false;",
            ]); ?></p>
        <?php endforeach ?>
    </article>
</div>
    