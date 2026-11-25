<?php
declare(strict_types=1);

use App\Models\Product;
use App\Services\PriceFormatter;

// PSR-4: префикс App\ -> папка src/
spl_autoload_register(function (string $class): void {
    $prefix  = 'App\\';
    $baseDir = __DIR__ . '/src/';

    if (str_starts_with($class, $prefix)) {
        $relative = substr($class, strlen($prefix));                    // Models\Product
        $file = $baseDir . str_replace('\\', '/', $relative) . '.php';  // src/Models/Product.php
        if (file_exists($file)) {
            require $file;
        }
    }
});

$product = new Product('Монитор', 1250.5);

echo 'Название: ' . $product->title . PHP_EOL;
echo 'Цена: ' . PriceFormatter::format($product->price) . PHP_EOL;
