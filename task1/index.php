<?php
declare(strict_types=1);

// Единственное, что подключает классы, — автозагрузчик (ни одного require для классов)
spl_autoload_register(function (string $class): void {
    $path = __DIR__ . '/classes/' . $class . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

$user  = new User('Иван', 'ivan@example.com');   // PHP сам подключит classes/User.php
$book  = new Product('Книга', 500);              // classes/Product.php
$pen   = new Product('Ручка', 50);
$order = new Order($user, [$book, $pen]);        // classes/Order.php

echo 'Пользователь: ' . $user->getInfo() . PHP_EOL;
echo 'Товары: ' . $book->getInfo() . '; ' . $pen->getInfo() . PHP_EOL;
echo 'Итого по заказу: ' . number_format($order->getTotal(), 2, '.', ' ') . ' руб.' . PHP_EOL;
