<?php

namespace tests\unit;


use app\models\LoginForm;

class LoginFormTest extends \PHPUnit_Framework_TestCase
{
    public function testWrongPassword()
    {
        $model = new LoginForm([
            'username' => 'demo',
            'password' => 'wrong_password'
        ]);

        static::assertFalse($model->login());
        static::assertArrayHasKey('password', $model->errors, 'No password error');
        static::assertTrue(\Yii::$app->user->isGuest);
    }
}
