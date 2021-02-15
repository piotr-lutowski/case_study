<?php

use Lpp\AbstractionFactory;
use Lpp\Entity\Item;
use Lpp\Entity\Price;
use Lpp\Service\ItemService;
use Lpp\Service\PriceOrderedBrandService;

class PriceOrderedBrandServiceTest extends PHPUnit\Framework\TestCase
{
    /** @var PriceOrderedBrandService */
    protected PriceOrderedBrandService $priceOrderedBrandService;

    /** @var string */
    private string $collectionName = 'winter';

    public function testPriceOrderedBrandServiceClassExist(): void
    {
        $this->assertFileExists('src/Lpp/Service/PriceOrderedBrandService.php');
        $this->assertInstanceOf(PriceOrderedBrandService::class, new PriceOrderedBrandService(new ItemService()));
    }

    public function setUp(): void
    {
        $abstractionFactory = new AbstractionFactory();

        $itemService = new ItemService();
        $itemService->setDataFactory($abstractionFactory->createDataFactory());
        $itemService->setEntityFactory($abstractionFactory->createEntityFactory());

        $this->priceOrderedBrandService = new PriceOrderedBrandService($itemService);
    }

    public function tearDown(): void
    {
        unset($this->priceOrderedBrandService);
    }

    public function testGetItemsWithOrderedPricesReturns(): void
    {
        $result = $this->priceOrderedBrandService->getItemsWithOrderedPrices($this->collectionName);

        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertInstanceOf(Item::class, $result[0]);
        $this->assertInstanceOf(Price::class, $result[0]->prices[1001]);
    }

    public function testPricesOrderForSingleItem(): void
    {
        $result = $this->priceOrderedBrandService->getItemsWithOrderedPrices($this->collectionName);

        $firstKey = array_key_first($result[0]->prices);
        $lastKey = array_key_last($result[0]->prices);

        $this->assertGreaterThanOrEqual(
            $result[0]->prices[$firstKey]->priceInEuro,
            $result[0]->prices[$lastKey]->priceInEuro
        );
    }
}