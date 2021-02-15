<?php

use Lpp\Data\ValidateException;
use Lpp\Data\Validator;
use Lpp\Entity\Item;

class ValidatorTest extends PHPUnit\Framework\TestCase
{
    public function testValidatorClassExist(): void
    {
        $this->assertFileExists('src/Lpp/Data/Validator.php');
        $this->assertInstanceOf(Validator::class, new Validator());
    }

    /**
     * @throws ValidateException
     */
    public function testValidateItemMethod(): void
    {
        $item = new Item();
        $item->id = 1;
        $item->name = 'test';
        $item->url = 'Lorem ipsum...';
        $item->prices = [];

        $this->expectException(ValidateException::class);

        $validator = new Validator();
        $validator->validateItem($item);
    }
}