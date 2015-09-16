<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CallSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Звонки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="call-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Call', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'phone',
            [ 
                'attribute' => 'status',
                'format' => 'raw', 
                'value' => function ($model) {
                    return $model::getCallStatesGoodly($model);
                }, 
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
