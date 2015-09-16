<?php
namespace frontend\controllers;

use yii\web\Controller;
use backend\models\Page;

class PagesController extends Controller
{
    // public function actionIndex()
    // {
    //     return $this->render('index', compact('model'));
    // }

    public function actionFaq()
    {
        $model = Page::find()->where(['name' => 'FAQ'])->one();
        return $this->render('faq', compact('model'));
    }

    public function actionPayment()
    {
        $model = Page::find()->where(['name' => 'Доставка и оплата'])->one();
        return $this->render('faq', compact('model'));
    }
}