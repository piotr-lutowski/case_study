<?php

namespace Lpp\Service;

use Lpp\Entity\Brand;
use Lpp\Entity\Item;

interface BrandServiceInterface
{
    /**
     * @param string $collectionName Name of a collection to search for
     *
     * @return Item[]
     */
    public function getItemsForCollection(string $collectionName): array;

    /**
     * @param string $collectionName
     *
     * @return Brand[]
     */
    public function getBrandsForCollection(string $collectionName): array;

    /**
     * This is supposed to be used for testing purposes.
     * You should avoid replacing the item service at runtime.
     *
     * @param ItemServiceInterface $itemService
     *
     * @return void
     */
    public function setItemService(ItemServiceInterface $itemService): void;
}
