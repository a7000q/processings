<?php

namespace app\models;

use app\models\Objects\Terminals;
use yii\base\ErrorException;

class User extends Terminals  implements \yii\web\IdentityInterface
{
    public $authKey;
    public $accessToken;

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $terminal = static::find()->where(['token' => $token])->one();

        if ($terminal)
            return $terminal;

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
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
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function auth($imei, $password)
    {
        $terminal = static::find()->where(['imei' => $imei, 'password' => md5($password)])->one();

        if (!$terminal)
           return ['status' => 1400];

        if ($terminal->token)
            return ['status' => 1403];

        $terminal->token = md5(time()+$terminal->imei);
        $terminal->save();

        return $terminal;
    }

    public function logout()
    {
        $this->token = "";
        $this->save();
    }
}
