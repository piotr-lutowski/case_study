<?php

namespace Lpp\Service;

class ItemNameOrderedBrandService extends UnorderedBrandService
{
    /**
     * @param string $collectionName
     * @return array
     */
    public function getItemsWithOrderedNames(string $collectionName): array
    {
        $items = $this->getItemsForCollection($collectionName);
        uasort($items, function ($item1, $item2) {
            return strcmp($item1->name, $item2->name);
        });

        return $items;
    }
}