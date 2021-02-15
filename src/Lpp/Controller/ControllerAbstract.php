<?php

namespace Lpp\Controller;

use Lpp\AbstractionFactory;

abstract class ControllerAbstract
{
    private AbstractionFactory $factory;

    /**
     * @return AbstractionFactory
     */
    public function getFactory(): AbstractionFactory
    {
        return $this->factory;
    }

    /**
     * @param AbstractionFactory $factory
     */
    public function setFactory(AbstractionFactory $factory): void
    {
        $this->factory = $factory;
    }
}