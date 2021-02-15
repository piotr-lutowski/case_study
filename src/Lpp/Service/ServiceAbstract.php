<?php

namespace Lpp\Service;

use Lpp\Data\DataFactory;
use Lpp\Entity\EntityFactory;

abstract class ServiceAbstract
{
    private DataFactory $dataFactory;
    private EntityFactory $entityFactory;

    /**
     * @return DataFactory
     */
    public function getDataFactory(): DataFactory
    {
        return $this->dataFactory;
    }

    /**
     * @param DataFactory $dataFactory
     */
    public function setDataFactory(DataFactory $dataFactory): void
    {
        $this->dataFactory = $dataFactory;
    }

    /**
     * @return EntityFactory
     */
    public function getEntityFactory(): EntityFactory
    {
        return $this->entityFactory;
    }

    /**
     * @param EntityFactory $entityFactory
     */
    public function setEntityFactory(EntityFactory $entityFactory): void
    {
        $this->entityFactory = $entityFactory;
    }
}