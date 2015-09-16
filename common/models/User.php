<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use backend\models\Role;
use yii\helpers\Arrayhelper;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_at_date
 * @property integer $updated_at_date
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    const ROLE_ADMIN = 1;
    const ROLE_MEMBER = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
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
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'checkStatus'],
            ['role_id', 'in', 'range' => [self::ROLE_ADMIN, self::ROLE_MEMBER]],
            ['role_id', 'default', 'value' => self::ROLE_MEMBER],
            ['role_id', 'checkRole'],
        ];
    }

    private function isAdminSelfEdit() {
        if (!Yii::$app->user->isGuest) {
            return $this->username === User::findOne(Yii::$app->user->id)->username;
        } 
        return false;
    }

    public function checkRole($attribute)
    {
        if ($this->isAdminSelfEdit()) {
            if ($this->$attribute != 1) {
                $this->addError($attribute, 'Нельзя самому себе изменить роль на member.');
            } 
        }
    }

    public function checkStatus($attribute)
    {
        if ($this->isAdminSelfEdit()) {
            if ($this->$attribute != 10) {
                    $this->addError($attribute, 'Нельзя самому себе изменить статус на удален.');
            }
        }
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

    public static function getRoles()
    {
        return [
            self::ROLE_MEMBER => 'member', 
            self::ROLE_ADMIN => 'admin',

        ];
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_ACTIVE => 'активный',
            self::STATUS_DELETED => 'удален', 

        ];
    }


    public static function getUserStatesGoodly($model)
    {
        $result; 
        switch ($model->status) {
            case 0:
                $result = '<span class="label label-danger">удален</span>';
                break;
            case 10:
                $result = '<span class="label label-info">активный</span>';
                break;
        }
        return $result; 
    }

    public static function getRoleList()
    {
        $droptions = Role::find()->asArray()->all();
        return Arrayhelper::map($droptions, 'id' , 'name');
    }
}
