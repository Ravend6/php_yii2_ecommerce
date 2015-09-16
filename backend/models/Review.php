<?php

namespace backend\models;

use Yii;
use common\helpers\Mailer;

/**
 * This is the model class for table "review".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $body
 * @property string $status
 */
class Review extends \yii\db\ActiveRecord
{
    use Mailer;
    
    const STATUS_NEW = 'новый';
    const STATUS_DONE = 'готово';
    const STATUS_FAIL = 'отклонен';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'body'], 'required'],
            [['body'], 'string'],
            [['first_name', 'last_name', 'status'], 'string', 'max' => 128],
            ['status', 'in', 'range' => [self::STATUS_NEW, self::STATUS_DONE, self::STATUS_FAIL]],
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
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'body' => 'Отзыв',
            'status' => 'Статус',
        ];
    }

    public static function getReviewStatesGoodly($model)
    {
        $result; 
        switch ($model->status) {
            case self::STATUS_NEW:
                $result = '<span class="label label-danger">новый</span>';
                break;
            case self::STATUS_DONE:
                $result = '<span class="label label-success">готово</span>';
                break;
            case self::STATUS_FAIL:
                $result = '<span class="label label-warning">отклонен</span>';
                break;
        }
        return $result; 
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_NEW => self::STATUS_NEW, 
            self::STATUS_DONE => self::STATUS_DONE,
            self::STATUS_FAIL => self::STATUS_FAIL,
            
        ];
    }
}
