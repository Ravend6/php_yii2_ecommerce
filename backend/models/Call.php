<?php

namespace backend\models;

use Yii;
use common\helpers\Mailer;

/**
 * This is the model class for table "call".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $status
 */
class Call extends \yii\db\ActiveRecord
{
    use Mailer;
    
    const STATUS_NEW = 'новый';
    const STATUS_DONE = 'готово';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'call';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['name', 'status'], 'string', 'max' => 128],
            ['phone', 'number'],
            ['status', 'in', 'range' => [self::STATUS_NEW, self::STATUS_DONE]],
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
            'name' => 'Имя',
            'phone' => 'Телефон',
            'status' => 'Статус',
        ];
    }

    public static function getCallStatesGoodly($model)
    {
        $result; 
        switch ($model->status) {
            case self::STATUS_NEW:
                $result = '<span class="label label-danger">новый</span>';
                break;
            case self::STATUS_DONE:
                $result = '<span class="label label-success">готово</span>';
                break;
            
        }
        return $result; 
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_NEW => self::STATUS_NEW, 
            self::STATUS_DONE => self::STATUS_DONE,

        ];
    }

}
