<?php
declare(strict_types=1);

class Developer extends Employee
{
    public function __construct(
        string $name,
        float $salary,
        private int $experienceYears,
    ) {
        parent::__construct($name, $salary);
    }

    // 15% оклада + 1000 за каждый год стажа
    public function calculateBonus(): float
    {
        return $this->applyMinBonus($this->salary * 0.15 + 1000 * $this->experienceYears);
    }
}
