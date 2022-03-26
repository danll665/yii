<?php

namespace app\models;

use Yii;
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
 * @property Extraditions[] $extraditions
 * @property Extraditions[] $extraditions0
 * @property ReturnBooks[] $returnBooks
 * @property ReturnBooks[] $returnBooks0
 * @property Roles $role
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
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
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['role_id' => 'id']],
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
     * Gets query for [[Extraditions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtraditions()
    {
        return $this->hasMany(Extraditions::className(), ['employee_id' => 'id']);
    }

    /**
     * Gets query for [[Extraditions0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtraditions0()
    {
        return $this->hasMany(Extraditions::className(), ['client_id' => 'id']);
    }

    /**
     * Gets query for [[ReturnBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReturnBooks()
    {
        return $this->hasMany(ReturnBooks::className(), ['employee_id' => 'id']);
    }

    /**
     * Gets query for [[ReturnBooks0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReturnBooks0()
    {
        return $this->hasMany(ReturnBooks::className(), ['client_id' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Roles::className(), ['id' => 'role_id']);
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

    public static function findIdentity($id)
    {
        $user = Users::find($id);
        return isset($user) ? new static($user) : null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        $users = Users::findAll();
        foreach ($users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
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
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }
}