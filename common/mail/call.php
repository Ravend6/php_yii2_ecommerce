<?php
/* @var $order common\models\Order */
use yii\helpers\Html;
?>

<h1>Новый Заказать Звонок #<?= $call->id ?></h1>

<h2>Контакты</h2>

<ul>
    <li>Имя: <?= Html::encode($call->name) ?></li>
    <li>Телефон: <?= Html::encode($call->phone) ?></li>
</ul>
