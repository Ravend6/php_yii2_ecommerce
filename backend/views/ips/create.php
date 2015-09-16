<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Ip */

$this->title = 'Create Ip';
$this->params['breadcrumbs'][] = ['label' => 'Ips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ip-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
