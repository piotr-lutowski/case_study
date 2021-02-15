<?php

namespace Lpp;

use Lpp\Controller\ControllerFactory;
use Lpp\Service\ServiceFactory;
use Lpp\Entity\EntityFactory;

interface AbstractionFactoryInterface
{
    /**
     * @return ControllerFactory
     */
    public function createControllerFactory(): ControllerFactory;

    /**
     * @return EntityFactory
     */
    public function createEntityFactory(): EntityFactory;

    /**
     * @return ServiceFactory
     */
    public function createServiceFactory(): ServiceFactory;
}