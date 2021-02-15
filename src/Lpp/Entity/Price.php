<?php

namespace Lpp\Entity;

use DateTime;

/**
 * Represents a single price from a search result
 * related to a single item.
 */
class Price
{
    /**
     * Id of the price
     *
     * @var int
     */
    public int $id;

    /**
     * Description text for the price
     *
     * @var string
     */
    public string $description;

    /**
     * Price in euro
     *
     * @var int
     */
    public int $priceInEuro;

    /**
     * Warehouse's arrival date (to)
     *
     * @var DateTime
     */
    public DateTime $arrivalDate;

    /**
     * Due to date,
     * defining how long will the item be available for sale (i.e. in a collection)
     *
     * @var DateTime
     */
    public DateTime $dueDate;
}
