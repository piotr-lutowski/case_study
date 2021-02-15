<?php

namespace Lpp\Entity;

/**
 * Represents a single collection from a search result.
 */
class Collection
{
    /**
     * Id of the collection
     *
     * @var int
     */
    public int $id;

    /**
     * Name of the collection
     *
     * @var string
     */
    public string $collection;

    /**
     * Unsorted list of brands.
     *
     * @var Brand[]
     */
    public array $brands = [];
}