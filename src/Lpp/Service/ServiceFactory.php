<?php

namespace Lpp\Service;

use Lpp\FactoryAbstract;

class ServiceFactory extends FactoryAbstract
{
    /**
     * @return ItemService
     */
    public function createItemService(): ItemService
    {
        return $this->create(ItemService::class);
    }

    /**
     * @param ItemServiceInterface $itemService
     * @return UnorderedBrandService
     */
    public function createUnorderedBrandService(ItemServiceInterface $itemService): UnorderedBrandService
    {
        return new UnorderedBrandService($itemService);
    }

    /**
     * @param ItemServiceInterface $itemService
     * @return PriceOrderedBrandService
     */
    public function createPriceOrderedBrandService(ItemServiceInterface $itemService): PriceOrderedBrandService
    {
        return new PriceOrderedBrandService($itemService);
    }

    /**
     * @param ItemServiceInterface $itemService
     * @return ItemNameOrderedBrandService
     */
    public function createItemNameOrderedBrandService(ItemServiceInterface $itemService): ItemNameOrderedBrandService
    {
        return new ItemNameOrderedBrandService($itemService);
    }
}