<?php
declare(strict_types=1);

class Product
{
    public string $title;
    public float $price;

    public function __construct(string $title, float $price)
    {
        $this->title = $title;
        $this->price = $price;
    }

    public function getInfo(): string
    {
        return "{$this->title} — " . number_format($this->price, 2, '.', ' ') . ' руб.';
    }
}
