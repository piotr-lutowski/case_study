<?php

namespace Lpp\Entity;

/**
 * Represents a single brand in the result.
 */
class Brand
{
    /**
     * Id of the brand
     *
     * @var int
     */
    public int $id;

    /**
     * Name of the brand
     *
     * @var string
     */
    public string $brand;

    /**
     * Brand's description
     *
     * @var string
     */
    public string $description;

    /**
     * Unsorted list of items with their corresponding prices.
     *
     * @var Item[]
     */
    public array $items = [];
}
