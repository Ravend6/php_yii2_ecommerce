<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReviewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Review', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'last_name',
            'body:ntext',
            [ 
                'attribute' => 'status',
                'format' => 'raw', 
                'value' => function ($model) {
                    return $model::getReviewStatesGoodly($model);
                }, 
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
