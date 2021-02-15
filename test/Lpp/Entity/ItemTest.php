<?php

use Lpp\Entity\Item;

class ItemTest extends PHPUnit\Framework\TestCase
{
    public function testItemClassExist(): void
    {
        $this->assertFileExists('src/Lpp/Entity/Item.php');
        $this->assertInstanceOf(Item::class, new Item());
    }

    public function testIfClassHasAttributes(): void
    {
        $this->assertClassHasAttribute('id', Item::class);
        $this->assertClassHasAttribute('name', Item::class);
        $this->assertClassHasAttribute('url', Item::class);
        $this->assertClassHasAttribute('prices', Item::class);
    }
}