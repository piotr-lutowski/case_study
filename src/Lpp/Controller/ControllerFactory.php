<?php

namespace Lpp\Controller;

use Lpp\FactoryAbstract;

class ControllerFactory extends FactoryAbstract
{
    /**
     * @return DataController
     */
    public function createDataController(): DataController
    {
        return $this->create(DataController::class);
    }
}