<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $full_name
 * @property string|null $position
 * @property int|null $passport
 * @property string $username
 * @property string $auth_key
 * @property string $password
 * @property int $role_id
 *
 * @property LendingOutBooks[] $LendingOutBooks
 * @property ReturnBooks[] $ReturnBooks
 * @property Role $role
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'username', 'auth_key', 'password', 'role_id'], 'required'],
            [['passport', 'role_id'], 'default', 'value' => null],
            [['passport', 'role_id'], 'integer'],
            [['full_name', 'position', 'username', 'password'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'position' => 'Position',
            'passport' => 'Passport',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password' => 'Password',
            'role_id' => 'Role ID',
        ];
    }


    /**
     * Gets query for [[ReturnBook]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientReturnBooks(): \yii\db\ActiveQuery
    {
        return $this->hasMany(ReturnBook::class, ['id' => 'client_id'])->via('ClientReturnBooks');
    }

    /**
     * Gets query for [[LendingOutBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientLendingOutBooks(): \yii\db\ActiveQuery
    {
        return $this->hasMany(LendingOutBook::class, ['client_id' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Role::class, ['id' => 'role_id'])->via('role');
    }

    /**
     * @throws \yii\base\Exception
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * @throws \yii\base\Exception
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * @param $id
     * @return static|null
     */
    public static function findIdentity($id): ?User
    {
        $user = User::findOne($id);
        return isset($user) ? new static($user) : null;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword(string $password): bool
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * @param $token
     * @param $type
     * @return mixed
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * @param $username
     * @return User|null
     */
    public static function findByUsername($username): ?User
    {
        return static::findOne(['username' => $username]);
    }
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey(): ?string
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey): ?bool
    {
        return $this->auth_key === $authKey;
    }
}
