<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use backend\models\Call;

AppAsset::register($this);
?>

<?php 
$call = new Call();


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Главная', 'url' => ['/']],
        ['label' => 'Аксессуары', 'url' => ['/accessories']],
        ['label' => 'Доставка и оплата', 'url' => ['/pages/payment']],
        ['label' => 'FAQ', 'url' => ['/pages/faq']],
        ['label' => 'Отзывы', 'url' => ['/review']],
        
        // ['label' => 'About', 'url' => ['/site/about']],
        // ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    $cartCount = Yii::$app->cart->getCount();
    if ($cartCount) {
        $menuItems[] = [
            'label' => '<span class="glyphicon glyphicon-shopping-cart"></span> В корзине ' .
                 Yii::t('app', 'product {n}', ['n' => $cartCount]), 
            'url' => ['/cart/list']
        ];
    } else {
        $menuItems[] = [
            'label' => '<span class="glyphicon glyphicon-shopping-cart"></span> Корзина пуста', 
            'url' => ['/cart/list']
        ];
    }

    if (Yii::$app->user->isGuest) {
        // $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        // $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Alert::widget() ?>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-8">
                <h4><b>Наши контакты:</b></h4>
                <ul>
                    <li><em>+33434343343443</em></li>
                    <li><em>+45454454525245</em></li>
                    <li><em>+45454454554545</em></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <?php Modal::begin([
                    'size' => 'modal-lg',
                    'header' => '<h2>Заказать звонок</h2>',
                    'toggleButton' => ['label' => 'Заказать звонок', 
                    'class' => 'btn btn-md btn-success pull-right'],
                    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>'
                ]);

                $form = ActiveForm::begin([
                    'action' => ['site/call-create']
                ]) ?>
                <?= $form->field($call, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($call, 'phone')->textInput(['maxlength' => true]) ?>

                <div class="form-group row">
                    <div class="col-xs-12">
                        <?= Html::submitButton('Заказать', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>

                <?php ActiveForm::end() ?>

                <?php Modal::end(); ?>
            </div>
        </div>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
