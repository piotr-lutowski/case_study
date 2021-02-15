<?php

use Lpp\AbstractionFactory;
use Lpp\Entity\Brand;
use Lpp\Entity\Item;
use Lpp\Entity\Price;
use Lpp\Service\ItemService;

class ItemServiceTest extends PHPUnit\Framework\TestCase
{
    /** @var ItemService  */
    protected ItemService $itemService;

    /** @var int  */
    private int $collectionId = 1315475;

    public function testItemServiceClassExist(): void
    {
        $this->assertFileExists('src/Lpp/Service/ItemService.php');
        $this->assertInstanceOf(ItemService::class, new ItemService());
    }

    public function testIfExternalJsonFileExist(): void
    {
        $this->assertFileExists(__DIR__ . '/../../../data/' . $this->collectionId . '.json');
    }

    /**
     * @throws ReflectionException
     */
    public function testIfJsonDataIsEqualToFileResource(): void
    {
        $itemService = new ItemService();

        $reflector = new ReflectionClass(ItemService::class);
        $method = $reflector->getMethod('getDataByPath');
        $method->setAccessible(true);
        $getDataByPathResult = $method->invokeArgs($itemService, [$this->collectionId]);

        $this->assertIsString($getDataByPathResult);
        $this->assertJsonStringEqualsJsonFile(
            __DIR__ . '/../../../data/' . $this->collectionId . '.json',
            $getDataByPathResult
        );
    }

    public function setUp(): void
    {
        $abstractionFactory = new AbstractionFactory();

        $this->itemService = new ItemService();
        $this->itemService->setDataFactory($abstractionFactory->createDataFactory());
        $this->itemService->setEntityFactory($abstractionFactory->createEntityFactory());
    }

    public function tearDown(): void
    {
        unset($this->itemService);
    }

    /**
     * @throws Exception
     */
    public function testGetResultForCollectionIdReturns(): void
    {
        $result = $this->itemService->getResultForCollectionId($this->collectionId);

        $this->assertIsArray($result);
        $this->assertInstanceOf(Brand::class, $result[1]);
        $this->assertInstanceOf(Item::class, $result[1]->items[1000]);
        $this->assertInstanceOf(Price::class, $result[1]->items[1000]->prices[1001]);
    }

    /**
     * @throws Exception
     */
    public function testGetResultForCollectionIdResultCount(): void
    {
        $this->assertCount(2, $this->itemService->getResultForCollectionId($this->collectionId));
    }
}