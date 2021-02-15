<?php

use Lpp\AbstractionFactory;
use Lpp\Entity\Item;
use Lpp\Service\ItemNameOrderedBrandService;
use Lpp\Service\ItemService;

class ItemNameOrderedBrandServiceTest extends PHPUnit\Framework\TestCase
{
    /** @var ItemNameOrderedBrandService */
    protected ItemNameOrderedBrandService $itemNameOrderedBrandService;

    /** @var string */
    private string $collectionName = 'winter';

    public function testItemNameOrderedBrandServiceClassExist(): void
    {
        $this->assertFileExists('src/Lpp/Service/ItemNameOrderedBrandService.php');
        $this->assertInstanceOf(ItemNameOrderedBrandService::class, new ItemNameOrderedBrandService(new ItemService()));
    }

    public function setUp(): void
    {
        $abstractionFactory = new AbstractionFactory();

        $itemService = new ItemService();
        $itemService->setDataFactory($abstractionFactory->createDataFactory());
        $itemService->setEntityFactory($abstractionFactory->createEntityFactory());

        $this->itemNameOrderedBrandService = new ItemNameOrderedBrandService($itemService);
    }

    public function tearDown(): void
    {
        unset($this->itemNameOrderedBrandService);
    }

    public function testGetItemsWithOrderedNamesReturns(): void
    {
        $result = $this->itemNameOrderedBrandService->getItemsWithOrderedNames($this->collectionName);

        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertInstanceOf(Item::class, $result[0]);
    }

    public function testGetItemsWithOrderedNamesOrder(): void
    {
        $result = $this->itemNameOrderedBrandService->getItemsWithOrderedNames($this->collectionName);
        $firstKey = array_key_first($result);

        $this->assertEquals('jacket', $result[$firstKey]->name);
    }
}