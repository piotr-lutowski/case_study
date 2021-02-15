<?php

use Lpp\Entity\Brand;

class BrandTest extends PHPUnit\Framework\TestCase
{
    public function testBrandClassExist(): void
    {
        $this->assertFileExists('src/Lpp/Entity/Brand.php');
        $this->assertInstanceOf(Brand::class, new Brand());
    }

    public function testIfClassHasAttributes(): void
    {
        $this->assertClassHasAttribute('id', Brand::class);
        $this->assertClassHasAttribute('brand', Brand::class);
        $this->assertClassHasAttribute('description', Brand::class);
        $this->assertClassHasAttribute('items', Brand::class);
    }
}