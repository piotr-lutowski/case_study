<?php

use Lpp\AbstractionFactory;
use Lpp\Controller\DataController;

class DataControllerTest extends PHPUnit\Framework\TestCase
{
    /** @var DataController  */
    protected DataController $dataController;

    /** @var int  */
    private int $collectionId = 1315475;

    /** @var string */
    private string $collectionName = 'winter';

    public function testDataControllerClassExist(): void
    {
        $this->assertFileExists('src/Lpp/Controller/DataController.php');
        $this->assertInstanceOf(DataController::class, new DataController());
    }

    public function setUp(): void
    {
        $abstractionFactory = new AbstractionFactory();

        $this->dataController = new DataController();
        $this->dataController->setFactory($abstractionFactory);
    }

    public function tearDown(): void
    {
        unset($this->dataController);
    }

    /**
     * @throws Exception
     */
    public function testListMethod(): void
    {
        $this->assertIsArray($this->dataController->list($this->collectionId));
    }

    /**
     * @throws Exception
     */
    public function testListUnorderedBrandsByNameMethod(): void
    {
        $this->assertIsArray($this->dataController->listUnorderedBrandsByName($this->collectionName));
    }

    /**
     * @throws Exception
     */
    public function testListBrandsItemsForCollectionMethod(): void
    {
        $this->assertIsArray($this->dataController->listBrandsItemsForCollection($this->collectionName));
    }

    public function testListOrderedPricesForCollectionItemsMethod(): void
    {
        $this->assertIsArray($this->dataController->listOrderedPricesForCollectionItems($this->collectionName));
    }

    public function testListOrderedItemNameForCollectionMethod(): void
    {
        $this->assertIsArray($this->dataController->listOrderedItemNameForCollection($this->collectionName));
    }
}