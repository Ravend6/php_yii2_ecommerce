<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Order;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'last_name',
            'city',
            'phone',
            [ 
                'label' => 'Продукты', 
                // 'attribute'=> 'image',
                'format' => 'raw',
                'value' => function($model) {
                    return Order::getOrderProducts($model);
                }, 
            ],
            // 'department',
            // 'note',
            [ 
                'attribute' => 'status',
                'format' => 'raw', 
                'value' => function ($model) {
                    return Order::getOrderStatesGoodly($model);
                }, 
            ],
            // 'total_price',
             [ 
                'attribute' => 'total_price',
                'format' => 'raw', 
                'value' => function ($model) {
                    return $model->total_price . ' грн.';
                }, 
            ],
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'created_at_date',
            // 'updated_at_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
