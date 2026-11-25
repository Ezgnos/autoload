<?php
declare(strict_types=1);

namespace App;

class Book extends Product
{
    // базовая цена + налог
    public function getFinalPrice(): float
    {
        return $this->price + $this->price * self::TAX;
    }
}
