<?php

namespace app\forms;

use app\models\Role;
use app\models\User;
use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignUpForm extends Model
{
    public $full_name;
    public $username;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['full_name', 'required'],
            ['full_name', 'string', 'min' => 2, 'max' => 255],
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     * @throws \yii\base\Exception
     */
    public function signup()
    {

        if (!$this->validate()) {
            var_dump($this->errors);
            return null;
        }

        $user = new User();
        $user->full_name = $this->full_name;
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->role_id = Role::CLIENT;
        $user->save();
        return $user;
    }

}