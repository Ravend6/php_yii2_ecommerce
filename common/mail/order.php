<?php
/* @var $order common\models\Order */
use yii\helpers\Html;
?>

<h1>Новый заказ #<?= $order->id ?></h1>

<h2>Контакты</h2>

<ul>
    <li>Фамилия: <?= Html::encode($order->first_name) ?></li>
    <li>Имя: <?= Html::encode($order->last_name) ?></li>
    <li>Телефон: <?= Html::encode($order->phone) ?></li>
    <li>Город: <?= Html::encode($order->city) ?></li>
    <li>Отделение новой почты: <?= Html::encode($order->department) ?></li>
    <li>Дата: <?= Html::encode($order->created_at_date) ?></li>
</ul>

<h2>Примечание</h2>

<?= Html::encode($order->note) ?>

<h2>Продукты</h2>

<ul>
<?php
$sum = 0;
foreach ($order->orderItems as $item): ?>
    <?php $sum += $item->quantity * $item->price ?>
    <li><?= Html::encode($item->title . ' x ' . $item->quantity . ' шт. ' . $item->price . ' грн.') ?></li>
<?php endforeach ?>
</ul>

<p><b>Итого: <?php echo $sum?> грн.</b></p>