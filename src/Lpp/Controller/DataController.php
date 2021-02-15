<?php

namespace Lpp\Controller;

use Exception;
use Lpp\Service\ItemService;
use Lpp\Service\ServiceFactory;

class DataController extends ControllerAbstract
{
    /**
     * @param int $collectionId
     * @return array
     * @throws Exception
     */
    public function list(int $collectionId): array
    {
        $itemService = $this->getItemService();

        return $itemService->getResultForCollectionId($collectionId);
    }

    /**
     * @param string $collectionName
     * @return array
     * @throws Exception
     */
    public function listUnorderedBrandsByName(string $collectionName): array
    {
        $itemService = $this->getItemService();
        $unorderedBrandService = $this->getServiceFactory()->createUnorderedBrandService($itemService);

        return $unorderedBrandService->getBrandsForCollection($collectionName);
    }

    /**
     * @param string $collectionName
     * @return array
     * @throws Exception
     */
    public function listBrandsItemsForCollection(string $collectionName): array
    {
        $itemService = $this->getItemService();
        $unorderedBrandService = $this->getServiceFactory()->createUnorderedBrandService($itemService);

        return $unorderedBrandService->getItemsForCollection($collectionName);
    }

    /**
     * @param string $collectionName
     * @return array
     */
    public function listOrderedPricesForCollectionItems(string $collectionName): array
    {
        $itemService = $this->getItemService();
        $priceOrderedBrandService = $this->getServiceFactory()->createPriceOrderedBrandService($itemService);

        return $priceOrderedBrandService->getItemsWithOrderedPrices($collectionName);
    }

    /**
     * @param string $collectionName
     * @return array
     */
    public function listOrderedItemNameForCollection(string $collectionName): array
    {
        $itemService = $this->getItemService();
        $itemNameOrderedBrandService = $this->getServiceFactory()->createItemNameOrderedBrandService($itemService);

        return $itemNameOrderedBrandService->getItemsWithOrderedNames($collectionName);
    }

    /**
     * @return ItemService
     */
    private function getItemService(): ItemService
    {
        $itemService = $this->getServiceFactory()->createItemService();
        $itemService->setEntityFactory($this->getFactory()->createEntityFactory());
        $itemService->setDataFactory($this->getFactory()->createDataFactory());

        return $itemService;
    }

    /**
     * @return ServiceFactory
     */
    private function getServiceFactory(): ServiceFactory
    {
        return $this->getFactory()->createServiceFactory();
    }
}