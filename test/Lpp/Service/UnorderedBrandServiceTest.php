<?php

use Lpp\AbstractionFactory;
use Lpp\Entity\Brand;
use Lpp\Entity\Item;
use Lpp\Service\ItemService;
use Lpp\Service\UnorderedBrandService;

class UnorderedBrandServiceTest extends PHPUnit\Framework\TestCase
{
    /** @var UnorderedBrandService */
    protected UnorderedBrandService $unorderedBrandService;

    /** @var string */
    private string $collectionName = 'winter';

    public function testUnorderedBrandServiceClassExist(): void
    {
        $this->assertFileExists('src/Lpp/Service/UnorderedBrandService.php');
        $this->assertInstanceOf(UnorderedBrandService::class, new UnorderedBrandService(new ItemService()));
    }

    public function setUp(): void
    {
        $abstractionFactory = new AbstractionFactory();

        $itemService = new ItemService();
        $itemService->setDataFactory($abstractionFactory->createDataFactory());
        $itemService->setEntityFactory($abstractionFactory->createEntityFactory());

        $this->unorderedBrandService = new UnorderedBrandService($itemService);
    }

    public function tearDown(): void
    {
        unset($this->unorderedBrandService);
    }

    public function testGetBrandsForCollectionReturns(): void
    {
        $result = $this->unorderedBrandService->getBrandsForCollection($this->collectionName);

        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertInstanceOf(Brand::class, $result[1]);
    }

    public function testGetItemsForCollectionReturns(): void
    {
        $result = $this->unorderedBrandService->getItemsForCollection($this->collectionName);

        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertInstanceOf(Item::class, $result[1]);
    }
}