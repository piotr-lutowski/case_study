<?php

use Lpp\Entity\Brand;
use Lpp\Entity\Collection;
use Lpp\Entity\EntityFactory;
use Lpp\Entity\EntityList;
use Lpp\Entity\Item;
use Lpp\Entity\Price;

class EntityFactoryTest extends PHPUnit\Framework\TestCase
{
    public function testEntityFactoryClassExist(): void
    {
        $this->assertFileExists('src/Lpp/Entity/EntityFactory.php');
        $this->assertInstanceOf(EntityFactory::class, new EntityFactory());
    }

    public function testFactoryMethodReturnInstances(): void
    {
        $entityFactory = new EntityFactory();

        $this->assertInstanceOf(Brand::class, $entityFactory->createBrand());
        $this->assertInstanceOf(Collection::class, $entityFactory->createCollection());
        $this->assertInstanceOf(EntityList::class, $entityFactory->createEntityList());
        $this->assertInstanceOf(Item::class, $entityFactory->createItem());
        $this->assertInstanceOf(Price::class, $entityFactory->createPrice());
    }
}