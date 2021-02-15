<?php

use Lpp\Controller\ControllerFactory;
use Lpp\Controller\DataController;

class ControllerFactoryTest extends PHPUnit\Framework\TestCase
{
    public function testControllerFactoryClassExist(): void
    {
        $this->assertFileExists('src/Lpp/Controller/ControllerFactory.php');
        $this->assertInstanceOf(ControllerFactory::class, new ControllerFactory());
    }

    public function testFactoryMethodReturnInstances(): void
    {
        $controllerFactory = new ControllerFactory();

        $this->assertInstanceOf(DataController::class, $controllerFactory->createDataController());
    }
}