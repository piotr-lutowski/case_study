<?php

use Lpp\AbstractionFactory;
use Lpp\Controller\ControllerFactory;
use Lpp\Data\DataFactory;
use Lpp\Entity\EntityFactory;
use Lpp\Service\ServiceFactory;

class AbstractionFactoryTest extends PHPUnit\Framework\TestCase
{
    public function testServiceFactoryClassExist(): void
    {
        $this->assertFileExists('src/Lpp/AbstractionFactory.php');
        $this->assertInstanceOf(AbstractionFactory::class, new AbstractionFactory());
    }

    public function testFactoryMethodReturnInstances(): void
    {
        $abstractionFactory = new AbstractionFactory();

        $this->assertInstanceOf(ControllerFactory::class, $abstractionFactory->createControllerFactory());
        $this->assertInstanceOf(DataFactory::class, $abstractionFactory->createDataFactory());
        $this->assertInstanceOf(EntityFactory::class, $abstractionFactory->createEntityFactory());
        $this->assertInstanceOf(ServiceFactory::class, $abstractionFactory->createServiceFactory());
    }
}