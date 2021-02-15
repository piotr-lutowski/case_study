<?php

namespace Lpp\Data;

use Lpp\Entity\Item;

class Validator
{
    /**
     * @param Item $item
     * @throws ValidateException
     */
    public function validateItem(Item $item): void
    {
        if ($this->isUrlValid($item->url) === false) {
            throw new ValidateException('Incorrect URL address: ' . $item->url);
        }
    }

    /**
     * @param string $url
     * @return bool
     */
    private function isUrlValid(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
}