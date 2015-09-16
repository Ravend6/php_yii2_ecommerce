<?php

namespace backend\helpers;

use backend\models\Order;
use backend\models\Call;
use backend\models\Review;
use yii\helpers\Html;

class AdminMenuStatus
{
    public static function badges($modelName)
    {
        $count = 0;
        switch ($modelName) {
            case 'Order':
                $count = Order::find()->where([
                    'status' => Order::STATUS_NEW
                ])->count();
                break;

            case 'Call':
                $count = Call::find()->where([
                    'status' => Call::STATUS_NEW
                ])->count();
                break;

            case 'Review':
                $count = Review::find()->where([
                    'status' => Review::STATUS_NEW
                ])->count();
                break;
            
            default:
                $count = 0;
                break;
        }

        $options = ['class' => 'label-danger label-as-badge'];
        if ($count) {
            return Html::tag('span', $count, $options);
        } 
        $options = ['class' => 'label-info label-as-badge'];
        return Html::tag('span', $count, $options);
    }
}