<?php // Доставка и оплата ?>

<div class="row">
    <div class="col-sm-4">
        <?php require(Yii::getAlias('@partials') . '/_slider.php'); echo $slider; ?>
    </div>
    <div class="col-sm-8">
        <article>
            <h1 class="fix-header"><?= $model->name ?></h1>
            <p><?= nl2br($model->body, false) ?></p>
        </article>
    </div> 
</div>