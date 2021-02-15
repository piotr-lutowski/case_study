<?php

use Lpp\Data\DataFactory;
use Lpp\Data\Validator;

class DataFactoryTest extends PHPUnit\Framework\TestCase
{
    public function testDataFactoryClassExist(): void
    {
        $this->assertFileExists('src/Lpp/Data/DataFactory.php');
        $this->assertInstanceOf(DataFactory::class, new DataFactory());
    }

    public function testFactoryMethodReturnInstances(): void
    {
        $dataFactory = new DataFactory();

        $this->assertInstanceOf(Validator::class, $dataFactory->createValidator());
    }
}