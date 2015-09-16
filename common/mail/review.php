<?php
/* @var $order common\models\Order */
use yii\helpers\Html;
?>

<h1>Новый Отзыв #<?= $review->id ?></h1>

<h2>Детали</h2>

<ul>
    <li>Имя: <?= Html::encode($review->first_name) ?></li>
    <li>Фамилия: <?= Html::encode($review->last_name) ?></li>
    <li>Отзыв: <?= Html::encode($review->body) ?></li>
</ul>
