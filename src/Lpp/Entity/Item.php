<?php

namespace Lpp\Entity;

/**
 * Represents a single item from a search result.
 */
class Item
{
    /**
     * Id of the item
     *
     * @var int
     */
    public int $id;

    /**
     * Name of the item
     *
     * @var string
     */
    public string $name;

    /**
     * Url of the item's page
     *
     * @var string
     */
    public string $url;

    /**
     * Unsorted list of prices received from the
     * actual search query.
     *
     * @var Price[]
     */
    public array $prices = [];
}
