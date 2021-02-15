<?php

use Lpp\Entity\Price;

class PriceTest extends PHPUnit\Framework\TestCase
{
    public function testPriceClassExist(): void
    {
        $this->assertFileExists('src/Lpp/Entity/Price.php');
        $this->assertInstanceOf(Price::class, new Price());
    }

    public function testIfClassHasAttributes(): void
    {
        $this->assertClassHasAttribute('id', Price::class);
        $this->assertClassHasAttribute('description', Price::class);
        $this->assertClassHasAttribute('priceInEuro', Price::class);
        $this->assertClassHasAttribute('arrivalDate', Price::class);
        $this->assertClassHasAttribute('dueDate', Price::class);
    }
}