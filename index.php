<?php
declare(strict_types=1);

use App\Book;
use App\Electronics;
use App\Product;

// PSR-4: App\ -> src/
spl_autoload_register(function (string $class): void {
    $prefix  = 'App\\';
    $baseDir = __DIR__ . '/src/';

    if (str_starts_with($class, $prefix)) {
        $relative = substr($class, strlen($prefix));
        $file = $baseDir . str_replace('\\', '/', $relative) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    }
});

$catalog = [
    new Book('Мастер и Маргарита', 500),
    new Book('Война и мир', 1200),
    new Book('Собачье сердце', 350),
    new Electronics('Смартфон', 30000, 10),
    new Electronics('Наушники', 5000, 5),
    new Electronics('Ноутбук', 60000, 15),
];

$sum = 0.0;
foreach ($catalog as $item) {
    echo $item->getInfo() . PHP_EOL;
    $sum += $item->getFinalPrice();
}

echo PHP_EOL . 'Сумма конечных цен по каталогу: ' . number_format($sum, 2, '.', ' ') . ' руб.' . PHP_EOL;
echo 'Создано товаров: ' . Product::getCount() . PHP_EOL;

// readonly: название нельзя изменить после создания
try {
    $catalog[0]->title = 'Другое название';
} catch (Error $e) {
    echo 'Ошибка: ' . $e->getMessage() . PHP_EOL;
}
