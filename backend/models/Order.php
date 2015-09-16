<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Arrayhelper;
use backend\models\Product;
use common\helpers\Mailer;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $city
 * @property string $phone
 * @property string $department
 * @property string $note
 * @property integer $status
 * @property string $total_price
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $created_at_date
 * @property string $updated_at_date
 *
 * @property OrderItem[] $orderItems
 */
class Order extends \yii\db\ActiveRecord
{
    use Mailer;
    
    const STATUS_NEW = 0;
    const STATUS_DONE = 10;
    const STATUS_IN_PROGRESS = 20;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at_date',
                'updatedAtAttribute' => 'updated_at_date',
                'value' => function () { 
                    return date('Y-m-d');
                }
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['first_name', 'last_name', 'city', 'phone', 'created_at', 'updated_at', 'created_at_date', 'updated_at_date'], 'required'],
            [['first_name', 'last_name', 'city', 'phone'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['total_price'], 'number'],
            [['created_at_date', 'updated_at_date'], 'safe'],
            [['first_name', 'last_name', 'city', 'phone', 'department'], 'string', 'max' => 128],
            [['note'], 'string', 'max' => 255],
            ['status', 'in', 'range' => [self::STATUS_NEW, self::STATUS_DONE, self::STATUS_IN_PROGRESS]],
            ['status', 'default', 'value' => self::STATUS_NEW],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Фамилия',
            'last_name' => 'Имя',
            'city' => 'Город',
            'phone' => 'Телефон',
            'department' => 'Отделение новой почты',
            'note' => 'Примечание',
            'status' => 'Статус',
            'total_price' => 'Итоговая цена',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_at_date' => 'Created At Date',
            'updated_at_date' => 'Updated At Date',
        ];
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_NEW => 'Новый',
            self::STATUS_DONE => 'Готово',
            self::STATUS_IN_PROGRESS => 'Процессе',
        ];
    }

    public function getOrderProducts($model)
    {
        $order = Order::findOne($model->id);
        $result = '<ul>';
        foreach ($order->orderItems as $item) {
            if ($item->product) {
                $result .= '<li><a href="/'. $item->product->slug_ru  .'">' . 
                $item->title . '. ' . $item->price . ' ' . 
                $item->product->currency . ' ('. $item->quantity .' шт.)' . '</a></li>';
            } else {
                $result = '<li>Товар был удален.</li>';
            }
        }
        $result .= '</ul>';
        return $result;
    }

    public static function getOrderStatesGoodly($model)
    {
        $result; 
        switch (self::getStatuses()[$model->status]) {
            case 'Новый':
                $result = '<span class="label label-danger">Новый</span>';
                break;
            case 'Процессе':
                $result = '<span class="label label-info">Процессе</span>';
                break;
            case 'Готово':
                $result = '<span class="label label-success">Готово</span>';
                break;
        }
        return $result; 
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
    }
}
