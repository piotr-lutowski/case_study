<?php

namespace Lpp\Entity;

class EntityList
{
    /** @var array  */
    private array $list = [];

    /**
     * @param Collection $collection
     */
    public function addCollection(Collection $collection): void
    {
        if (!isset($this->list['collection'])) {
            $this->list['collection'][$collection->id] = $collection;
        }
    }

    /**
     * @param int $collectionId
     * @param Brand $brand
     */
    public function addBrand(int $collectionId, Brand $brand): void
    {
        $collection = $this->list['collection'][$collectionId];
        $collection->brands[$brand->id] = $brand;
    }

    /**
     * @param int $collectionId
     * @param int $brandId
     * @param Item $item
     */
    public function addItem(int $collectionId, int $brandId, Item $item): void
    {
        $collection = $this->list['collection'][$collectionId];
        $brands = $collection->brands[$brandId];
        $brands->items[$item->id] = $item;
    }

    /**
     * @param int $collectionId
     * @param int $brandId
     * @param int $itemId
     * @param Price $price
     */
    public function addPrice(int $collectionId, int $brandId, int $itemId, Price $price): void
    {
        $collection = $this->list['collection'][$collectionId];
        $brands = $collection->brands[$brandId];
        $items = $brands->items[$itemId];
        $items->prices[$price->id] = $price;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return (array) $this->list;
    }
}