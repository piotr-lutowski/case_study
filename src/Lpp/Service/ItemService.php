<?php

namespace Lpp\Service;

use DateTime;
use Exception;
use Lpp\AppConfig;
use Lpp\Data\ValidateException;
use Lpp\Data\Validator;
use Lpp\Entity\Brand;
use Lpp\Entity\EntityList;
use stdClass;

class ItemService extends ServiceAbstract implements ItemServiceInterface
{
    private EntityList $entityList;
    private Validator $validator;

    /**
     * @param int $collectionId
     * @return Brand[]
     * @throws Exception
     */
    public function getResultForCollectionId(int $collectionId): array
    {
        $data = $this->getDataByPath($collectionId);
        $dataObject = json_decode($data);
        $collections = $this->buildCollection($dataObject)->toArray();
        $collection = $collections['collection'][$collectionId];

        return (array) $collection->brands;
    }

    /**
     * @param stdClass $dataObject
     * @return EntityList
     * @throws ValidateException
     */
    private function buildCollection(stdClass $dataObject): EntityList
    {
        $this->validator = $this->getDataFactory()->createValidator();
        $this->entityList = $this->getEntityFactory()->createEntityList();

        $collection = $this->getEntityFactory()->createCollection();
        $collection->id = $dataObject->id;
        $collection->collection = $dataObject->collection;
        $this->entityList->addCollection($collection);

        $parameters = [
            'collectionId' => $collection->id,
        ];

        foreach ($dataObject->brands as $brandId => $brand) {
            $parameters['brandId'] = $brandId;
            $this->buildBrand($parameters, $brand);
        }

        return $this->entityList;
    }

    /**
     * @param array $parameters
     * @param stdClass $dataObject
     * @throws ValidateException
     */
    private function buildBrand(array $parameters, stdClass $dataObject): void
    {
        $brand = $this->getEntityFactory()->createBrand();
        $brand->id = $parameters['brandId'];
        $brand->brand = $dataObject->name;
        $brand->description = $dataObject->description;

        $this->entityList->addBrand($parameters['collectionId'], $brand);

        foreach ($dataObject->items as $itemId => $item) {
            $parameters['itemId'] = $itemId;
            $this->buildItem($parameters, $item);
        }
    }

    /**
     * @param array $parameters
     * @param stdClass $dataObject
     * @throws ValidateException
     */
    private function buildItem(array $parameters, stdClass $dataObject): void
    {
        $item = $this->getEntityFactory()->createItem();
        $item->id = $parameters['itemId'];
        $item->name = $dataObject->name;
        $item->url = $dataObject->url;

        $this->validator->validateItem($item);
        $this->entityList->addItem($parameters['collectionId'], $parameters['brandId'], $item);

        foreach ($dataObject->prices as $priceId => $price) {
            $parameters['priceId'] = $priceId;
            $this->buildPrices($parameters, $price);
        }
    }

    /**
     * @param array $parameters
     * @param stdClass $dataObject
     */
    private function buildPrices(array $parameters, stdClass $dataObject): void
    {
        $price = $this->getEntityFactory()->createPrice();
        $price->id = $parameters['priceId'];
        $price->description = $dataObject->description;
        $price->priceInEuro = $dataObject->priceInEuro;
        $price->arrivalDate = DateTime::createFromFormat('Y-m-d', $dataObject->arrival);
        $price->dueDate = DateTime::createFromFormat('Y-m-d', $dataObject->due);

        $this->entityList->addPrice($parameters['collectionId'], $parameters['brandId'], $parameters['itemId'], $price);
    }

    /**
     * @param int $collectionId
     * @return string
     * @throws Exception
     */
    private function getDataByPath(int $collectionId): string
    {
        $config = AppConfig::getConfig();
        if (!isset($config['data_sources']['files_path'][$collectionId])) {
            throw new Exception('Undefined file path mapping for collection id: ' . $collectionId);
        }

        $path = $config['data_sources']['files_path'][$collectionId];
        if (file_exists($path) === false) {
            throw new Exception('File doesnt exist in path ' . $path);
        }

        $jsonData = file_get_contents($path);

        return $jsonData;
    }
}