<?php

namespace app\controllers;


use app\models\User;

class TerminalsController extends CController
{
    public $modelClass = 'app\models\Objects\Terminals';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['except'] = ['auth'];

        return $behaviors;

    }

    public function actionAuth($imei, $password)
    {
        return User::auth($imei, $password);
    }

    public function actionLogout()
    {
        $terminal = \Yii::$app->user->identity;
        $terminal->logout();
        return ['status' => 200];
    }
}