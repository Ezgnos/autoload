<?php
declare(strict_types=1);

spl_autoload_register(function (string $class): void {
    $path = __DIR__ . '/classes/' . $class . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

$employees = [
    new Manager('Ирина Петрова', 100000),
    new Manager('Пётр Сидоров', 2000),            // 20% = 400 < MIN_BONUS => премия 500
    new Developer('Алексей Смирнов', 80000, 3),
    new Developer('Мария Орлова', 90000, 5),
    new Developer('Олег Иванов', 1000, 0),        // 15% = 150 < MIN_BONUS => премия 500
];

$total = 0.0;
foreach ($employees as $e) {
    echo $e->getInfo() . PHP_EOL;
    $total += $e->getTotalPay();
}

echo PHP_EOL . 'Общая сумма выплат (оклад + премия): ' . number_format($total, 2, '.', ' ') . ' руб.' . PHP_EOL;
echo 'Количество сотрудников: ' . Employee::getEmployeeCount() . PHP_EOL;
echo 'Минимальная премия (константа): ' . Employee::MIN_BONUS . ' руб.' . PHP_EOL;
