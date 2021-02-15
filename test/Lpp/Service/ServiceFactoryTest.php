<?php

use Lpp\Service\ItemNameOrderedBrandService;
use Lpp\Service\PriceOrderedBrandService;
use Lpp\Service\ServiceFactory;
use Lpp\Service\ItemService;
use Lpp\Service\UnorderedBrandService;

class ServiceFactoryTest extends PHPUnit\Framework\TestCase
{
    public function testServiceFactoryClassExist(): void
    {
        $this->assertFileExists('src/Lpp/Service/ServiceFactory.php');
        $this->assertInstanceOf(ServiceFactory::class, new ServiceFactory());
    }

    public function testFactoryMethodReturnInstances(): void
    {
        $serviceFactory = new ServiceFactory();

        $this->assertInstanceOf(ItemService::class, $serviceFactory->createItemService());
        $this->assertInstanceOf(UnorderedBrandService::class,
            $serviceFactory->createUnorderedBrandService(new ItemService())
        );
        $this->assertInstanceOf(PriceOrderedBrandService::class,
            $serviceFactory->createPriceOrderedBrandService(new ItemService())
        );
        $this->assertInstanceOf(ItemNameOrderedBrandService::class,
            $serviceFactory->createItemNameOrderedBrandService(new ItemService())
        );
    }
}