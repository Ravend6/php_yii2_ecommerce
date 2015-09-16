<?php

namespace frontend\helpers;

use backend\models\Product;
use yii\helpers\Html;

class ProductHelper
{
    public static function getButtons($model)
    {
        $result = '';
        $result .= Html::tag('p', '<b>Цена: ' . Product::getPriceOrOldPrice($model) . ' ' .
            $model->currency . ' ' . self::getAvail($model) . '</b>');
        $result .= Html::tag('p', Html::a('<button class="btn btn-danger">Купить</button>', 
            ['/cart/add', 'id' => $model->id]));

        return $result;

    }

    public static function getAvail($model)
    {
        return $model->availability ? 'Под заказ'  : 'В наличии';
    }
}