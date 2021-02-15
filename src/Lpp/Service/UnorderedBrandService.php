<?php

namespace Lpp\Service;

use InvalidArgumentException;
use Lpp\AppConfig;
use Lpp\Entity\Brand;
use Lpp\Entity\Item;

class UnorderedBrandService implements BrandServiceInterface
{
    private ItemServiceInterface $itemService;

    /**
     * @param ItemServiceInterface $itemService
     */
    public function __construct(ItemServiceInterface $itemService)
    {
        $this->itemService = $itemService;
    }

    /**
     * @param string $collectionName Name of the collection to search for.
     * @return Brand[]
     */
    public function getBrandsForCollection(string $collectionName): array
    {
        $config = AppConfig::getConfig();

        $collectionNameToIdMapping = $config['mappers']['collections_name_to_id'];
        if (empty($collectionNameToIdMapping[$collectionName])) {
            throw new InvalidArgumentException(
                sprintf('Provided collection name [%s] is not mapped.', $collectionName)
            );
        }

        $collectionId = $collectionNameToIdMapping[$collectionName];

        return $this->itemService->getResultForCollectionId($collectionId);
    }

    /**
     * @param string $collectionName
     * @return Item[]
     */
    public function getItemsForCollection(string $collectionName): array
    {
        $items = [];
        $brands = $this->getBrandsForCollection($collectionName);
        foreach ($brands as $brand) {
            foreach ($brand->items as $item) {
                $items[] = $item;
            }
        }

        return $items;
    }

    /**
     * This is supposed to be used for testing purposes.
     * You should avoid replacing the item service at runtime.
     *
     * @param ItemServiceInterface $itemService
     *
     * @return void
     */
    public function setItemService(ItemServiceInterface $itemService): void
    {
        $this->itemService = $itemService;
    }
}
