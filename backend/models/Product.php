<?php

namespace backend\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use common\models\User;
use backend\models\Category;
use backend\models\Image;
use backend\models\ProductImage;
use yii\helpers\Arrayhelper;
use yii\web\UploadedFile;
use yii\helpers\Html;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $title
 * @property string $brand
 * @property string $description
 * @property string $short_description
 * @property string $image
 * @property string $image_alt
 * @property string $slug
 * @property string $slug_ru
 * @property integer $availability
 * @property string $price
 * @property string $old_price
 * @property string $currency
 * @property string $vendor
 * @property string $rating
 * @property integer $rating_count
 * @property integer $top
 * @property integer $user_id
 * @property integer $category_id
 *
 * @property Order[] $orders
 * @property Category $category
 * @property User $user
 * @property ProductImage[] $productImages
 */
class Product extends \yii\db\ActiveRecord implements \yz\shoppingcart\CartPositionInterface
{
    use \yz\shoppingcart\CartPositionTrait;

    const STATUS_NOT_TOP = 0;
    const STATUS_TOP = 10;

    const AVAILABILITY_NO = 0;
    const AVAILABILITY_YES = 10;

    public $file;
    public $multiFiles;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'slug',
                'immutable' => true,
                'ensureUnique'=>true,
            ],
        ];
    }

    // public function scenarios()
    // {
    //     return [
    //         'create' => ['title', 'description', 'price', 'short_description', 'file'],
    //     ];
    //     // $scenarios = [
    //     //     'create' => ['title', 'description', 'price', 'short_description', 'file'],
    //     // ];
    //     // return array_merge(parent::scenarios(), $scenarios);
    // }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['file'], 'file'],
            // [['file'], 'file', 'skipOnEmpty' => false],
            [['title', 'description', 'price', 'short_description'], 'required'],
            [['description', 'short_description'], 'string'],
            // ['file', 'required', 'isEmpty' => function ($model) {
            //     return UploadedFile::getInstances($model, 'file');
            // }],
            // ['file', 'fileRequired'],
            [['availability', 'top', 'user_id', 'category_id'], 'integer'],
            [['price', 'rating', 'old_price'], 'number'],
            [['title', 'brand', 'image_alt', 'vendor'], 'string', 'max' => 128],
            [['slug', 'slug_ru'], 'string', 'max' => 255],
            [['currency'], 'string', 'max' => 64],
            [['vendor'], 'string', 'max' => 128],
            ['image_alt', 'default', 'value' => function ($model) { 
                return $model->title;
            }],
            ['slug_ru', 'default', 'value' => function ($model) { 
                $replace = ['+', ',', '!', '.', '?'];
                return str_replace('--', '-', str_replace($replace, '', 
                    mb_strtolower(str_replace(' ', '-', $model->title))));
            }],
            ['top', 'in', 'range' => [self::STATUS_NOT_TOP, self::STATUS_TOP]],
            ['availability', 'in', 'range' => [self::AVAILABILITY_YES, self::AVAILABILITY_NO]],
            ['availability', 'default', 'value' => self::AVAILABILITY_YES],
            ['currency', 'default', 'value' => 'грн.'],
            ['top', 'default', 'value' => self::STATUS_NOT_TOP],
            ['rating', 'default', 'value' => 0],
            ['rating_count', 'default', 'value' => 0],
            ['user_id','in', 'range' => array_keys($this->getUserList())],
            ['user_id', 'default', 'value' => 1],
            ['category_id','in', 'range' => array_keys($this->getCategoryList())],
            ['category_id', 'default', 'value' => 1],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'brand' => 'Бренд',
            'description' => 'Полное описание',
            'short_description' => 'Краткое опсиание',
            'file' => 'Картинка',
            'multiFiles' => 'Картинки для галереи',
            'image_alt' => 'Image Alt',
            // 'slug' => 'Slug',
            'slug_ru' => 'Url продукта',
            'availability' => 'Наличие',
            'price' => 'Цена',
            'old_price' => 'Старая цена',
            'currency' => 'Валюта',
            'vendor' => 'Продавец',
            'rating' => 'Рейтинг',
            'rating_count' => 'Рейтинг голоса',
            'top' => 'Топ',
            'user_id' => 'Автор',
            'category_id' => 'Категория',
        ];
    }

    public function fileRequired($attribute) 
    {

        $this->addError($attribute, 'Необходимо добавить картинку.');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'id']);
    }

    public function getImages() {
        return $this->hasMany(Image::className(), ['id' => 'image_id'])
            ->viaTable(ProductImage::tableName(), ['product_id' => 'id']);
    }

    public static function getUserList()
    {
        $droptions = User::find()->asArray()->all();
        return Arrayhelper::map($droptions, 'id' , 'username');
    }

    public static function getCategoryList()
    {
        $droptions = Category::find()->asArray()->all();
        return Arrayhelper::map($droptions, 'id' , 'name');
    }

    public function upload()
    {
        if ($this->validate()) {
            $tokenImage = date("dmYHis") . bin2hex(openssl_random_pseudo_bytes(8));
            if ($this->file = UploadedFile::getInstance($this, 'file')) {
                $imageName = $this->file->baseName . '.' . $this->file->extension;
                $goodImage = $tokenImage . $imageName;
                $this->file->saveAs('images/products/titles/'. $goodImage);
                $this->image = $goodImage;
                $this->save();
            } else {
                $this->addError('file', 'Необходимо добавить картинку.');
                return false;
            }
        
            // multi upload
            if ($this->multiFiles = UploadedFile::getInstances($this, 'multiFiles')) {
                foreach ($this->multiFiles as $file) {
                    $goodImage = $tokenImage . $file->baseName . '.' . $file->extension;
                    $file->saveAs('images/products/galleries/' . $goodImage);
                   
                    $image = new Image();
                    $image->name = $goodImage;
                    $image->alt = $goodImage;
                    $image->save();

                    $pi = new ProductImage();
                    $pi->product_id = $this->id;
                    $pi->image_id = $image->id;
                    $pi->save();


                }
            }

            return true;
        } else {
            return false;
        }
    }

    public function updateUpload()
    {
        $tokenImage = date("dmYHis") . bin2hex(openssl_random_pseudo_bytes(8));
        if ($this->validate() and UploadedFile::getInstance($this, 'file')) {
            unlink('images/products/titles/'. $this->image);
            if ($this->file = UploadedFile::getInstance($this, 'file')) {
                $imageName = $this->file->baseName . '.' . $this->file->extension;
                $goodImage = $tokenImage . $imageName;

                $this->file->saveAs('images/products/titles/'. $goodImage);
                $this->image = $goodImage;
            }
            
        }
        // multiFiles upload
        if ($this->validate() and $this->multiFiles = UploadedFile::getInstances($this, 'multiFiles')) {
            foreach ($this->multiFiles as $file) {
                $goodImage = $tokenImage . $file->baseName . '.' . $file->extension;
                $file->saveAs('images/products/galleries/' . $goodImage);
               
                $image = new Image();
                $image->name = $goodImage;
                $image->alt = $this->title;
                // $image->alt = $goodImage;
                $image->save();

                $pi = new ProductImage();
                $pi->product_id = $this->id;
                $pi->image_id = $image->id;
                $pi->save();

            }
        }
    }

    public static function getPriceOrOldPrice($model)
    {
        if ($model->old_price != '0.00') {
            return '<strike>' . $model->old_price . '</strike> ' . $model->price;
        }
        return $model->price;
    }

    public static function getButtonAvail($product)
    {
        $options = [
            'class' => 'btn btn-success'
        ];
        if ($product->availability === self::AVAILABILITY_YES) {
            return Html::tag('button', 'В наличии', $options);
        }
        $options['class'] = 'btn btn-warning';
        return Html::tag('button', 'Под заказ', $options);
    }

    // Cart metod
    public function getPrice()
    {
        return $this->price;
    }

    // Cart metod
    public function getId()
    {
        return $this->id;
    }
}
