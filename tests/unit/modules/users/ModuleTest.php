<?php
namespace modules\users;

use app\modules\users\Module;

class ModuleTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    // tests
    public function testRegisterTranslations()
    {
        $module = $this->getMockBuilder(Module::class)
            ->disableOriginalConstructor()
            ->setMethodsExcept(['init'])
            ->getMock();

        $module->expects($this->once())->method('registerTranslations');

        $module->init();
    }
}