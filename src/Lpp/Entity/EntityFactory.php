<?php

namespace Lpp\Entity;

use Lpp\FactoryAbstract;

class EntityFactory extends FactoryAbstract
{
    /**
     * @return Brand
     */
    public function createBrand(): Brand
    {
        return $this->create(Brand::class);
    }

    /**
     * @return Collection
     */
    public function createCollection(): Collection
    {
        return $this->create(Collection::class);
    }

    /**
     * @return EntityList
     */
    public function createEntityList(): EntityList
    {
        return $this->create(EntityList::class);
    }

    /**
     * @return Item
     */
    public function createItem(): Item
    {
        return $this->create(Item::class);
    }

    /**
     * @return Price
     */
    public function createPrice(): Price
    {
        return $this->create(Price::class);
    }
}