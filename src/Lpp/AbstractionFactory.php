<?php

namespace Lpp;

use Lpp\Controller\ControllerFactory;
use Lpp\Data\DataFactory;
use Lpp\Service\ServiceFactory;
use Lpp\Entity\EntityFactory;

class AbstractionFactory implements AbstractionFactoryInterface
{
    /**
     * @return ControllerFactory
     */
    public function createControllerFactory(): ControllerFactory
    {
        return new ControllerFactory();
    }

    /**
     * @return DataFactory
     */
    public function createDataFactory(): DataFactory
    {
        return new DataFactory();
    }

    /**
     * @return EntityFactory
     */
    public function createEntityFactory(): EntityFactory
    {
        return new EntityFactory();
    }

    /**
     * @return ServiceFactory
     */
    public function createServiceFactory(): ServiceFactory
    {
        return new ServiceFactory();
    }
}