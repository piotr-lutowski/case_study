<?php

namespace Lpp;

abstract class FactoryAbstract
{
    /**
     * @param string $class
     * @return object
     */
    protected function create(string $class): object
    {
        return new $class();
    }
}