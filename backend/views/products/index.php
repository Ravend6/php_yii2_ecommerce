<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            // 'brand',
            // 'description:ntext',
            'short_description:ntext',
            // [ 
            //     'label' => 'Картинки',
            //     'attribute' => 'multiFiles',
            //     'format' => 'raw', 
            //     'value' => function ($model) { 
            //         foreach ($model->images as $image) {
            //             echo Html::img('@web/images/products/galleries/' . $image->name, 
            //                 ['alt' => $image->alt, 'width' => 15, 'height' => 15]); 
            //         }
            //     }, 
            // ],
            // 'image',
            // 'image_alt',
            // 'slug',
            // 'availability',
            'price',
            'old_price',
            'currency',
            // 'vendor',
            // 'rating',
            // 'top',
            // 'user_id',
            // 'category_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
