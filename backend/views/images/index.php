<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ImagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Image', ['create'], ['class' => 'btn btn-success disabled']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [ 
                'attribute' => 'name',
                'format' => 'raw', 
                'value' => function ($model) { 
                    return Html::img('@web/images/products/galleries/' . $model->name, 
                        ['alt' => $model->alt, 'width' => 150, 'height' => 150]);
                }

            ],
            'alt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
