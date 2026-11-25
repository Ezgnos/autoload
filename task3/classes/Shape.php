<?php
declare(strict_types=1);

abstract class Shape
{
    abstract public function getName(): string;
    abstract public function area(): float;
    abstract public function perimeter(): float;

    // Общий для всех наследников метод
    public function describe(): string
    {
        return sprintf(
            '%s: площадь = %s, периметр = %s',
            $this->getName(),
            number_format($this->area(), 2, '.', ''),
            number_format($this->perimeter(), 2, '.', '')
        );
    }
}
