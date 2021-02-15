<?php

namespace Lpp\Data;

use Lpp\FactoryAbstract;

class DataFactory extends FactoryAbstract
{
    /**
     * @return Validator
     */
    public function createValidator(): Validator
    {
        return $this->create(Validator::class);
    }
}