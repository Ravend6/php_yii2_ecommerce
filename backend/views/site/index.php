<?php

use yii\helpers\Html;
use backend\helpers\AdminMenuCount;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">
        <div class="row">
            <div class="col-sm-12">
                <h2>Добро пожаловать в админку, 
                <span class="glyphicon glyphicon-user"></span> <?= Yii::$app->user->identity->username ?>!</h2>
            </div>
            <div class="col-sm-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Меню</div>
                    <div class="list-group">
                        <?= Html::a('<button type="button" class="list-group-item">Заказы</button>', ['/orders/index']) ?>
                        <?= Html::a('<button type="button" class="list-group-item">Звонки</button>', ['/calls/index']) ?>
                        <?= Html::a('<button type="button" class="list-group-item">Отзывы</button>', ['/reviews/index']) ?>
                        <?= Html::a('<button type="button" class="list-group-item">Продукты</button>', ['/products/index']) ?>
                        <?= Html::a('<button type="button" class="list-group-item">Картинки</button>', ['/images/index']) ?>
                        <?= Html::a('<button type="button" class="list-group-item">Страницы</button>', ['/pages/index']) ?>
                        <?= Html::a('<button type="button" class="list-group-item">Пользователи</button>', ['/users/index']) ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="list-group">
                    <?= Html::a('Заказы ' . AdminMenuCount::badgeAllCount('Order'), ['/orders/index'], ['class' => 'list-group-item active']) ?>
                    <?= Html::a('Новые ' . AdminMenuCount::badgeStatusNew('Order'), ['/orders/index/?OrderSearch%5Bstatus%5D=новый'], ['class' => 'list-group-item']) ?>
                    <?= Html::a('Процессе ' . AdminMenuCount::badgeStatusProgressOrFail('Order'), ['/orders/index?OrderSearch%5Bstatus%5D=процессе'], ['class' => 'list-group-item']) ?>
                    <?= Html::a('Готовые ' . AdminMenuCount::badgeStatusDone('Order'), ['/orders/index?OrderSearch%5Bstatus%5D=готово'], ['class' => 'list-group-item']) ?>
                </div>
                <div class="list-group">
                    <?= Html::a('Отзывы ' . AdminMenuCount::badgeAllCount('Review'), ['/reviews/index'], ['class' => 'list-group-item active']) ?>
                    <?= Html::a('Новые ' . AdminMenuCount::badgeStatusNew('Review'), ['/reviews/index/?ReviewSearch%5Bstatus%5D=новый'], ['class' => 'list-group-item']) ?>
                    <?= Html::a('Отклоненные ' . AdminMenuCount::badgeStatusProgressOrFail('Review'), ['/reviews/index?ReviewSearch%5Bstatus%5D=отклонен'], ['class' => 'list-group-item']) ?>
                    <?= Html::a('Готовые ' . AdminMenuCount::badgeStatusDone('Review'), ['/reviews/index?ReviewSearch%5Bstatus%5D=готово'], ['class' => 'list-group-item']) ?>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="list-group">
                    <?= Html::a('Звонки ' . AdminMenuCount::badgeAllCount('Call'), ['/calls/index'], ['class' => 'list-group-item active']) ?>
                    <?= Html::a('Новые ' . AdminMenuCount::badgeStatusNew('Call'), ['/calls/index/?CallSearch%5Bstatus%5D=новый'], ['class' => 'list-group-item']) ?>
                    <?= Html::a('Готовые ' . AdminMenuCount::badgeStatusDone('Call'), ['/calls/index/?CallSearch%5Bstatus%5D=готово'], ['class' => 'list-group-item']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
