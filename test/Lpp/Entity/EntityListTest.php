<?php

use Lpp\Entity\Brand;
use Lpp\Entity\Collection;
use Lpp\Entity\EntityList;
use Lpp\Entity\Item;
use Lpp\Entity\Price;

class EntityListTest extends PHPUnit\Framework\TestCase
{
    public function testEntityListClassExist(): void
    {
        $this->assertFileExists('src/Lpp/Entity/EntityList.php');
        $this->assertInstanceOf(EntityList::class, new EntityList());
    }

    public function testBuildEntityListStructure(): void
    {
        $datetime = new \DateTime();

        $price = new Price();
        $price->id = 1;
        $price->description = 'lorem ipsum lorem ipsum';
        $price->priceInEuro = 1000;
        $price->arrivalDate = $datetime;
        $price->dueDate = $datetime;

        $item = new Item();
        $item->id = 1;
        $item->name = 'lorem ipsum';
        $item->url = 'http://www.wp.pl/';
        $item->prices[] = $price;

        $brand = new Brand();
        $brand->id = 1;
        $brand->brand = 'lorem ipsum';
        $brand->description = 'lorem ipsum lorem ipsum';
        $brand->items[] = $item;

        $collection = new Collection();
        $collection->id = 1;
        $collection->collection = 'summer';
        $collection->brands[] = $brand;

        $entityList = new EntityList();
        $entityList->addCollection($collection);

        $list = $entityList->toArray();

        $this->assertIsArray($list);
    }
}