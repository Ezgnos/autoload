<?php
declare(strict_types=1);

namespace App;

class Electronics extends Product
{
    public function __construct(
        string $title,
        float $price,
        private float $warrantyPercent,   // наценка за гарантию, % от базовой цены
    ) {
        parent::__construct($title, $price);
    }

    // базовая цена + налог + наценка за гарантию
    public function getFinalPrice(): float
    {
        return $this->price
            + $this->price * self::TAX
            + $this->price * $this->warrantyPercent / 100;
    }
}
