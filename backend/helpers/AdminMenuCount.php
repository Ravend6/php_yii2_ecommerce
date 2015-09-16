<?php

namespace backend\helpers;

use backend\models\Order;
use backend\models\Call;
use backend\models\Review;
use yii\helpers\Html;

class AdminMenuCount
{
    public static function badgeStatusNew($modelName)
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

        $options = ['class' => 'badge'];
        if ($count) {
            return Html::tag('span', $count, $options);
        } 
        return Html::tag('span', $count, $options);
    }

    public static function badgeStatusDone($modelName)
    {
        $count = 0;
        switch ($modelName) {
            case 'Order':
                $count = Order::find()->where([
                    'status' => Order::STATUS_DONE
                ])->count();
                break;

            case 'Call':
                $count = Call::find()->where([
                    'status' => Call::STATUS_DONE
                ])->count();
                break;

            case 'Review':
                $count = Review::find()->where([
                    'status' => Review::STATUS_DONE
                ])->count();
                break;
            
            default:
                $count = 0;
                break;
        }

        $options = ['class' => 'badge'];
        if ($count) {
            return Html::tag('span', $count, $options);
        } 
        return Html::tag('span', $count, $options);
    }

    public static function badgeStatusProgressOrFail($modelName)
    {
        $count = 0;
        switch ($modelName) {
            case 'Order':
                $count = Order::find()->where([
                    'status' => Order::STATUS_IN_PROGRESS
                ])->count();
                break;

            case 'Review':
                $count = Review::find()->where([
                    'status' => Review::STATUS_FAIL
                ])->count();
                break;
            
            default:
                $count = 0;
                break;
        }

        $options = ['class' => 'badge'];
        if ($count) {
            return Html::tag('span', $count, $options);
        } 
        return Html::tag('span', $count, $options);
    }

    public static function badgeAllCount($modelName)
    {
        $count = 0;
        switch ($modelName) {
            case 'Order':
                $count = Order::find()->count();
                break;

            case 'Call':
                $count = Call::find()->count();
                break;

            case 'Review':
                $count = Review::find()->count();
                break;
            
            default:
                $count = 0;
                break;
        }

        $options = ['class' => 'badge'];
        if ($count) {
            return Html::tag('span', $count, $options);
        } 
        return Html::tag('span', $count, $options);
    }
}