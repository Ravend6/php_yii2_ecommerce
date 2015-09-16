<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ip".
 *
 * @property integer $id
 * @property string $name
 * @property integer $product_id
 *
 * @property Product $product
 */
class Ip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['product_id'], 'integer'],
            [['name'], 'string', 'max' => 266]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'product_id' => 'Product ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
