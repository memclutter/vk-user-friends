<?php

namespace app\modules\users\models;

use Yii;
use app\modules\users\Module;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property integer $social_id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $auth_key
 * @property string $email
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
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
    public function rules()
    {
        return [
            ['social_id', 'required'],
            ['social_id', 'integer'],
            ['social_id', 'unique'],

            ['username', 'required'],
            ['username', 'string'],

            [['first_name', 'last_name'], 'string'],

            ['auth_key', 'required'],
            ['auth_key', 'string'],
            ['auth_key', 'unique'],

            ['email', 'email'],
        ];
    }

    public function beforeValidate()
    {
        if (!parent::beforeValidate()) {
            return false;
        }

        $this->auth_key = Yii::$app->security->generateRandomString(64);

        return true;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('models', 'user.id'),
            'social_id' => Module::t('models', 'user.social_id'),
            'username' => Module::t('models', 'user.username'),
            'first_name' => Module::t('models', 'user.first_name'),
            'last_name' => Module::t('models', 'user.last_name'),
            'auth_key' => Module::t('models', 'user.auth_key'),
            'email' => Module::t('models', 'user.email'),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
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
}
