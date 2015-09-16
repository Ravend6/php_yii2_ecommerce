<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать Пользователя', '/signup', ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            'email:email',
            [ 
                'attribute' => 'status',
                'format' => 'raw', 
                'value' => function ($model) {
                    return $model::getUserStatesGoodly($model);
                }, 
            ],
            // 'created_at',
            // 'updated_at',
            // 'created_at_date',
            // 'updated_at_date',
            [ 
                'attribute' => 'role_id',
                'label' => 'Роль',
                'format' => 'raw', 
                'value' => function ($model) {
                    return $model->role->name;
                }, 
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
