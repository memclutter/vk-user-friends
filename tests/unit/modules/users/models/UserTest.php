<?php
namespace modules\users\models;


use app\modules\users\models\User;

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testBeforeValidateCreateAuthKey()
    {
        $user = new User();
        $user->validate();

        $this->assertNotEmpty($user->auth_key);
    }
}