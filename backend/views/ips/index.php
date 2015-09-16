<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\IpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ip', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'product_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
