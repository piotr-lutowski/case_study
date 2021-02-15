<?php

use Lpp\AbstractionFactory;
use Lpp\Data\ValidateException;

require __DIR__.'/vendor/autoload.php';

try {
    $collectionId = 1315475;
    $collectionName = 'winter';

    $abstractionFactory = new AbstractionFactory();
    $dataController = $abstractionFactory->createControllerFactory()->createDataController();
    $dataController->setFactory($abstractionFactory);

    $listResult = $dataController->list($collectionId);
    $unorderedBrandsResult = $dataController->listUnorderedBrandsByName($collectionName);
    $brandsItemsResult = $dataController->listBrandsItemsForCollection($collectionName);
    $pricesOrderedResult = $dataController->listOrderedPricesForCollectionItems($collectionName);
    $itemNamesOrderedResult = $dataController->listOrderedItemNameForCollection($collectionName);

} catch (ValidateException $exception) {
    var_export($exception->getMessage());
} catch (\Throwable $exception) {
    var_export($exception);
}

