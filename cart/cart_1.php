<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [
        'sum' => 0,
        'discount' => 0,
        'count' => 0,
        'items' => []
    ];
}
$products = [
    2 =>  ['name' => 'товар 1', 'price' => 10],
    7 =>  ['name' => 'товар 2', 'price' => 333],
    43 => ['name' => 'товар 3', 'price' => 332],
];

/**
 * 1. добавление товара в корзину (т.е. добавление в массив в ключ items)
 */
function addItem($product)
{
    if (isset($_SESSION['cart']['items'][$product['id']])) {
        $_SESSION['cart']['items'][$product['id']]['quantity'] += $product['quantity'];
    } else {
        $_SESSION['cart']['items'][$product['id']] = $product;
    }
    $_SESSION['cart']['sum'] = sumItems();
    $_SESSION['cart']['count'] = getCount();
}

function sumItems()
{
    $sum = 0;
    foreach ($_SESSION['cart']['items'] as $item) {
        $sum += $item['quantity'] * $item['price'];
    }
    return $sum;
}

function getCount()
{
    $count = 0;
    foreach ($_SESSION['cart']['items'] as $item) {
        $count += $item['quantity'];
    }
    return $count;
}

/**
 * 2. удаление товара из корзины
 */
function deleteItem(int $id)
{
    if (isset($_SESSION['cart']['items'][$id])) {
        unset($_SESSION['cart']['items'][$id]);
    }
    $_SESSION['cart']['sum'] = sumItems();
    $_SESSION['cart']['count'] = getCount();
}

/**
 * 3. изменение количества товара лежащего в корзине.
 * пересчет корзины с учетом скидки(берем любую одну из предыдущей задачи на выбор)
 */
function changeQty($id, $count)
{
    foreach ($_SESSION['cart']['items'] as $item) {
        if ($item['id'] == $id) {
            $_SESSION['cart']['items'][$id]['quantity'] = $count;
        }
    }
    $_SESSION['cart']['sum'] = sumItems();
    $_SESSION['cart']['count'] = getCount();

    calculate();
}

function calculate()
{
    $discount = 0;

    $sale_1 = 10; //скидка от суммы
    $sale_2 = 7; //скидка от  количечтва

    if ($_SESSION['cart']['sum'] > 2000) {
        $discount = $sale_1;
    } else if ($_SESSION['cart']['count'] > 10) {
        $discount = $sale_2;
    }

    $_SESSION['cart']['sum'] = $_SESSION['cart']['sum'] - $_SESSION['cart']['sum'] * $discount / 100;
}
