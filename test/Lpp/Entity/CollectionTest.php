<?php

use Lpp\Entity\Collection;

class CollectionTest extends PHPUnit\Framework\TestCase
{
    public function testCollectionClassExist(): void
    {
        $this->assertFileExists('src/Lpp/Entity/Collection.php');
        $this->assertInstanceOf(Collection::class, new Collection());
    }

    public function testIfClassHasAttributes(): void
    {
        $this->assertClassHasAttribute('id', Collection::class);
        $this->assertClassHasAttribute('collection', Collection::class);
        $this->assertClassHasAttribute('brands', Collection::class);
    }
}