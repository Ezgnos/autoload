<?php
declare(strict_types=1);

spl_autoload_register(function (string $class): void {
    $path = __DIR__ . '/classes/' . $class . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

$shapes = [
    new Circle(5),
    new Rectangle(4, 6),
    new Triangle(3, 4, 5),
];

foreach ($shapes as $shape) {
    echo $shape->describe() . PHP_EOL;
}

/*
 * new Shape() приводит к ошибке, потому что Shape объявлен как abstract:
 * в нём есть методы без реализации (area(), perimeter(), getName()), и непонятно,
 * что должен возвращать такой объект. Абстрактный класс — только заготовка,
 * создавать можно лишь конкретных наследников, реализовавших все абстрактные методы.
 */
try {
    $s = new Shape();
} catch (Error $e) {
    echo PHP_EOL . 'Ошибка: ' . $e->getMessage() . PHP_EOL;
}
