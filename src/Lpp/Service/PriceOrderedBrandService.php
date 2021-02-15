<?php

namespace Lpp\Service;

class PriceOrderedBrandService extends UnorderedBrandService
{
    /**
     * @param string $collectionName
     * @return array
     */
    public function getItemsWithOrderedPrices(string $collectionName): array
    {
        $items = $this->getItemsForCollection($collectionName);
        foreach ($items as $item) {
            uasort($item->prices, function ($price1, $price2) {
                return $price1->priceInEuro > $price2->priceInEuro;
            });
        }

        return $items;
    }
}